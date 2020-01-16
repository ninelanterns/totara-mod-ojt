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
    $settings->add(
        new admin_setting_configcheckbox(
            'ojt/hidetopicsfrommanager',
            get_string('confighidetopicsfrommanager', 'mod_ojt'),
            get_string('confighidetopicsfrommanagerdesc', 'mod_ojt'),
            0
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            'ojt/hidecommentbox',
            get_string('confighidecommentbox', 'mod_ojt'),
            get_string('confighidecommentboxdesc', 'mod_ojt'),
            0
        )
    );

    $settings->add(
        new admin_setting_configcheckbox(
            'ojt/topicsdefaultstate',
            get_string('configtopicsdefaultstate', 'mod_ojt'),
            get_string('configtopicsdefaultstatedesc', 'mod_ojt'),
            0
        )
    );

    // ALDHAS-207.
    $settings->add(
        new admin_setting_configtext(
            'ojt/rolestoincludeinreport',
            get_string('configrolestoincludeinreport', 'mod_ojt'),
            get_string('configrolestoincludeinreportdesc', 'mod_ojt'),
            '',
            PARAM_TEXT
        )
    );

    // VNTHAS-372.
    $settings->add(
        new admin_setting_configcheckbox(
            'ojt/pdfdefaultstate',
            get_string('configpdfdefaultstate', 'mod_ojt'),
            get_string('configpdfdefaultstatedesc', 'mod_ojt'),
            0
        )
    );
    
    // VTNHAS-375
    $settings->add(
        new admin_setting_configtext(
            'ojt/evidencetypeid',
            get_string('evidencetypeid', 'mod_ojt'),
            get_string('evidencetypeiddesc', 'mod_ojt'),
            '',
            PARAM_TEXT
        )
    );
}