<?php

/**
 * Comment
 *
 * @package    package
 * @subpackage sub_package
 * @copyright  &copy; 2019 CG Kineo {@link http://www.kineo.com}
 * @author     kaushtuv.gurung
 * @version    1.0
 */

define('NO_MOODLE_COOKIES', true);
define('AJAX_SCRIPT', true);

require_once('../../../config.php');

require_once($CFG->dirroot . '/mod/ojt/lib.php');
require_once($CFG->dirroot . '/mod/ojt/locallib.php');
require_once($CFG->dirroot . '/lib/completionlib.php');
require_once($CFG->dirroot . '/completion/classes/helper.php');

global $DB, $USER;

$ojtid = required_param('ojtid', PARAM_INT);
$userid = required_param('userid', PARAM_INT);
$completionstatus = required_param('completionstatus', PARAM_INT);

// get ojt completion
$ojt_completion = ojt_get_completion_info($userid, $ojtid);

// get module info
$module_info = ojt_get_course_module($ojtid);

if(empty($ojt_completion->id)) {
    // if empty create a new record
    $ojt_completion = new stdClass();
    $ojt_completion->userid = $userid;
    $ojt_completion->type = OJT_CTYPE_OJT; 
    $ojt_completion->ojtid = $ojtid;
    $ojt_completion->topicid = 0; 
    $ojt_completion->topicitemid = 0;
    $ojt_completion->status = $completionstatus; 
    $ojt_completion->comment = null; 
    $ojt_completion->timemodified = time(); 
    $ojt_completion->modifiedby = $USER->id; 
    
    //$DB->insert_record('ojt_completion', $ojt_completion);
} else {
    // if record already exists
    // update the record
    $ojt_completion->status = $completionstatus; 
    $ojt_completion->timemodified = time(); 
    $ojt_completion->modifiedby = $USER->id; 
    $DB->update_record('ojt_completion', $ojt_completion);
}

// update module completion and trigger 
// the module completed event
$module_completion = $DB->get_record('course_modules_completion', array('coursemoduleid' => $module_info->id, 'userid' => $userid));
if(empty($module_completion)) {
    $module_completion = new stdClass();
    $module_completion->coursemoduleid = $module_info->id;
    $module_completion->userid = $userid;
    $module_completion->viewed = 1;
    $module_completion->reaggregate = 0;
}
switch($completionstatus) {
    case OJT_INCOMPLETE:
        $module_completion->completionstate = COMPLETION_INCOMPLETE;
        break;
    case OJT_COMPLETE:
        $module_completion->completionstate = COMPLETION_COMPLETE;
        break;
    case OJT_FAILED:
        $module_completion->completionstate = COMPLETION_COMPLETE_FAIL;
        break;
}
$module_completion->timemodified = time();
$module_completion->timecompleted = time();

if(empty($module_completion->id)) {
    // insert
    $module_completion->id = $DB->insert_record('course_modules_completion', $module_completion);
    \core_completion\helper::log_course_module_completion($module_completion->id, "Created module completion in internal_set_data");
} else {
    // update
    $DB->update_record('course_modules_completion', $module_completion);
    \core_completion\helper::log_course_module_completion($module_completion->id, "Updated module completion in internal_set_data");
}

// trigger event
$cmcontext = context_module::instance($module_completion->coursemoduleid, MUST_EXIST);
$coursecontext = $cmcontext->get_parent_context();

// Trigger an event for course module completion changed.
$event = \core\event\course_module_completion_updated::create(array(
    'objectid' => $module_completion->id,
    'context' => $cmcontext,
    'relateduserid' => $module_completion->userid,
    'other' => array(
        'relateduserid' => $module_completion->userid
    )
));
$event->add_record_snapshot('course_modules_completion', $module_completion);
$event->trigger();

echo json_encode(
    array(
        'msg' => 'success',
        'status' => true
    )
);
exit();