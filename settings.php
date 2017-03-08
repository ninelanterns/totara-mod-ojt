<?php

/**
 * Comment
 *
 * @package
 * @subpackage
 * @copyright  &copy; 2016 CG Kineo {@link http://www.kineo.com}
 * @author     kaushtuv.gurung
 * @version    1.0
 */


defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    $settings->add(new admin_setting_configcheckbox('ojt/hidetopicsfrommanager', get_string('confighidetopicsfrommanager', 'mod_ojt'),
                       get_string('confighidetopicsfrommanagerdesc', 'mod_ojt'), 0));
}