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

$status = optional_param('topicitems_status', null, PARAM_INT);
$witnessed = optional_param('topicitems_witnessed', null, PARAM_INT);
$signoff = optional_param('topicitems_signoff', null, PARAM_INT);
$comments = optional_param('comments', null, PARAM_TEXT);
$signoffenabled = optional_param('signoffenabled', null, PARAM_INT);
$witnessenabled = optional_param('witnessenabled', null, PARAM_INT);
$learnerid = required_param('learnerid', PARAM_INT);
$ojtid = required_param('ojtid', PARAM_INT);
$menuoptions = optional_param('menuoptions', null, PARAM_TEXT);

// date format
$dateformat = get_string('strftimedatetimeshort', 'core_langconfig');

// update ojt_completion
$ojt_topic_items = ojt_get_topic_items_by_ojtid($ojtid);
if(!empty($ojt_topic_items)) {
    foreach ($ojt_topic_items as $item) {
        $item_status = in_array($item->id, $status) ? OJT_COMPLETE : OJT_INCOMPLETE;
        // HWRHAS-161
        $item_status = $status[$item->id];
        if(!empty($menuoptions[$item->id])) {
            $item_status =  OJT_COMPLETE;
        } 
        $completion_record = $DB->get_record('ojt_completion', 
            array(
                'ojtid' => $ojtid,
                'userid' => $learnerid,
                'type' => OJT_CTYPE_TOPICITEM,
                'topicitemid' => $item->id
            )
        );
        if(empty($completion_record)) {
            $completion_record = new stdClass();
            $completion_record->userid = $learnerid;
            $completion_record->type = OJT_CTYPE_TOPICITEM;
            $completion_record->ojtid = $ojtid;
            $completion_record->topicid = $item->topicid;
            $completion_record->topicitemid = $item->id;
        } 
        
        $completion_record->status = $item_status;
        // HWRHAS-161
        if(!empty($menuoptions[$item->id])) {
            $completion_record->comment = $menuoptions[$item->id]; 
        } else {
            $completion_record->comment = !empty($comments[$item->id]) ? 
                $comments[$item->id] . ' - ' . userdate(time(), $dateformat) . '.' : 
                null;
        }
        $completion_record->timemodified = time();
        $completion_record->modifiedby = $USER->id;
        
        if(!empty($completion_record->id)) {
            // get record and update
            // highly unlikely if the OJT has been set up properly
            // with saveallonsubmit checked on mod_form.php
            $DB->update_record('ojt_completion', $completion_record);
        } else {
            $DB->insert_record('ojt_completion', $completion_record);
        }
        
        
        if(!empty($witnessenabled) && in_array($item->id, $witnessed)) {
            $item_witnessed = $DB->get_record('ojt_item_witness', array(
                'userid' => $learnerid,
                'topicitemid' => $item->id
            ));
            if(!empty($item_witnessed)) {
                $item_witnessed->witnessedby = $USER->id;
                $item_witnessed->timewitnessed = time();
                
                $DB->update_record('ojt_item_witness', $item_witnessed);
            } else {
                $item_witnessed = new stdClass();
                $item_witnessed->userid = $learnerid;
                $item_witnessed->topicitemid = $item->id;
                $item_witnessed->witnessedby = $USER->id;
                $item_witnessed->timewitnessed = time();
                
                $DB->insert_record('ojt_item_witness', $item_witnessed);
            }
        }
    }
}
// update ojt_topic_signoff where applicable
if(!empty($signoffenabled)) {
    foreach ($signoff as $sf) {
        $signedoff = $DB->get_record('ojt_topic_signoff', array(
            'userid' => $learnerid,
            'topicid' => $sf
        ));
        
        // if records exists
        // continue
        if(!empty($signedoff)) {
            continue;
        }
        // else add as new record
        $signedoff = new stdClass();
        $signedoff->userid = $learnerid;
        $signedoff->topicid = $sf;
        $signedoff->modifiedby = $USER->id;
        $signedoff->timemodified = time();
        
        $DB->insert_record('ojt_topic_signoff', $signedoff);
    }
}

// update ojt topic completions
$ojt_topics = ojt_get_topics($ojtid);
if(!empty($ojt_topics)) {
    foreach ($ojt_topics as $topic) {
        ojt_update_topic_completion($learnerid, $ojtid, $topic->id);
    }
}

// Mark OJT as complete after the from has been submitted
// VTNHAS-375
$currentcompletion = $DB->get_record('ojt_completion',
        array('userid' => $learnerid, 'ojtid' => $ojtid, 'type' => OJT_CTYPE_OJT));
if (empty($currentcompletion->status) ||  $currentcompletion->status != OJT_COMPLETE) {
    // Update ojt completion
    $completion = empty($currentcompletion) ? new stdClass() : $currentcompletion;
    $completion->status = OJT_COMPLETE;
    $completion->timemodified = time();
    $completion->modifiedby = $USER->id;
    if (empty($currentcompletion)) {
        $completion->userid = $learnerid;
        $completion->type = OJT_CTYPE_OJT;
        $completion->ojtid = $ojtid;
        $completion->id = $DB->insert_record('ojt_completion', $completion);
    } else {
        $DB->update_record('ojt_completion', $completion);
    }
}
$topic_completions = $DB->get_records('ojt_completion',
        array('userid' => $learnerid, 'ojtid' => $ojtid, 'type' => OJT_CTYPE_TOPIC));
if(!empty($topic_completions)) {
    foreach ($topic_completions as $topic_completion) {
        $topic_completion->status = OJT_COMPLETE;
        $DB->update_record('ojt_completion', $topic_completion);
    }
}

ojt_update_activity_completion($ojtid, $learnerid, OJT_COMPLETE, true);

// return a redirect URL
// VTNHAS-375
$course_module = ojt_get_course_module($ojtid);

echo json_encode(
    array(
        'msg' => 'success',
        'status' => true,
        'redirectURL' => $CFG->wwwroot . '/mod/ojt/report.php?cmid='.$course_module->id
    )
);
exit();
