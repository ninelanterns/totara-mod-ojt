<?php
/*
 * Copyright (C) 2015 onwards Catalyst IT
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author  Eugene Venter <eugene@catalyst.net.nz>
 * @package mod_ojt
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


/**
 * English strings for ojt
 */

defined('MOODLE_INTERNAL') || die();

$string['accessdenied'] = 'Access denied';
$string['additem'] = 'Add topic item';
$string['addtopic'] = 'Add topic';
$string['allowcomments'] = 'Allow comments';
$string['allowfileuploads'] = 'Allow \'evaluator\' file uploads';
$string['allowselffileuploads'] = 'Allow \'owner\' file uploads';
$string['edititem'] = 'Edit topic item';
$string['evaluate'] = 'Evaluate';
$string['ojt:addinstance'] = 'Add instance';
$string['ojt:evaluate'] = 'Evaluate';
$string['ojt:evaluateself'] = 'Evaluate self';
$string['ojt:manage'] = 'Manage';
$string['ojt:view'] = 'View';
$string['ojt:signoff'] = 'Sign-off';
$string['ojt:witnessitem'] = 'Witness topic item completion';
$string['ojt:unchecksignoff'] = 'Uncheck the sign-off checkbox after it has already been submitted';
$string['ojtfieldset'] = 'Custom example fieldset';
$string['ojtname'] = 'OJT name';
$string['ojtname_help'] = 'The title of your OJT activity.';
$string['ojt'] = 'OJT';
$string['ojtxforx'] = '{$a->ojt} - {$a->user}';
$string['competencies'] = 'Competencies';
$string['competencies_help'] = 'Here you can select which of the assigned course competencies should be marked as proficient upon completion of this topic.

Multiple competencies can be selected by holding down \<CTRL\> and and selecting the items.';
$string['completionstatus'] = 'Completion status';
$string['completionstatus0'] = 'In progress';
$string['completionstatus1'] = 'Required complete';
$string['completionstatus2'] = 'Complete';
$string['completionstatus4'] = 'Ready for Evaluation';
// HWRHAS-1599
$string['completionstatus3'] = 'Training required';

$string['completiontopics'] = 'All required topics are complete and, if enabled, witnessed.';
$string['completionmanagersignoff'] = 'All required topics are signed off by the manager.';
$string['confirmtopicdelete'] = 'Are you sure you want to delete this topic?';
$string['confirmitemdelete'] = 'Are you sure you want to delete this topic item?';
$string['deleteitem'] = 'Delete topic item';
$string['deletetopic'] = 'Delete topic';
$string['edittopic'] = 'Edit topic';
$string['edittopics'] = 'Edit topics';
$string['error:ojtnotfound'] = 'OJT not found';
$string['evaluatestudents'] = 'Evaluate students';
$string['filesupdated']  = 'Files updated';
$string['itemdeleted'] = 'Topic item deleted';
$string['itemwitness'] = 'Item completion witness';
$string['manage'] = 'Manage';
$string['managersignoff'] = 'Manager sign-off';
$string['managertasktcompletionsubject'] = '{$a->user}  is awaiting your sign off for completion of topic {$a->topic} in {$a->courseshortname}';
$string['managertasktcompletionmsg'] = '{$a->user} has completed topic <a href="{$a->topicurl}">{$a->topic}</a>. This topic is now awaiting your sign-off.';
$string['modulename'] = 'OJT';
$string['modulenameplural'] = 'OJTs';
$string['modulename_help'] = 'The OJT module allows for student evaluation based on pre-configured OJT topics and items.';
$string['name'] = 'Name';
$string['notsignedoff'] = 'Not signed off';
$string['notopics'] = 'No topics';
$string['notwitnessed'] = 'Not witnessed';
$string['nousers'] = 'No users...';
$string['optional'] = 'Optional';
$string['optionalcompletion'] = 'Optional completion';
$string['pluginadministration'] = 'OJT administration';
$string['pluginname'] = 'OJT';
$string['printthisojt'] = 'Print this OJT';
$string['report'] = 'Report';
$string['signedoff'] = 'Signed off';
$string['topicdeleted'] = 'Topic deleted';
$string['topiccomments'] = 'Comments';
$string['topicitemfiles'] = 'Files';
$string['topicitemdeleted'] = 'Topic item deleted';
$string['type0'] = 'OJT';
$string['type1'] = 'Topic';
$string['type2'] = 'Item';
$string['updatefiles'] = 'Update files';
$string['witnessed'] = 'Witnessed';

// LOTHS-200
$string['notreadyforevaluation'] = 'Not ready for Evaluation';
$string['readyforevaluation'] = 'Ready for Evaluation';
$string['newcompletionstatus0'] = 'Not assessed';
$string['newcompletionstatus3'] = 'Not yet competent';
$string['newcompletionstatus2'] = 'Competent';
$string['pendingassessment'] = 'Pending assessment';
// LOTHS-208
$string['confighidetopicsfrommanager'] = 'Hide topics from manager';
$string['confighidetopicsfrommanagerdesc'] = 'When checked, evaluating managers will be redirected to <strong>OJT - Evaluate</strong> page instead of their own OJT topics page';
$string['submit'] = 'Submit';
// LOTHS-211
$string['confighidecommentbox'] = 'Hide comment box';
$string['confighidecommentboxdesc'] = 'When checked hides the comment textarea field on the evaluation page.';
$string['configtopicsdefaultstate'] = 'Collapse topics by default';
$string['configtopicsdefaultstatedesc'] = 'When checked topics are collapsed, by default all topics are expanded';

$string['alertcannotundo'] = 'No capability to undo sign-off. If required, please contact the Administrator';
// ALDHAS-207
$string['configrolestoincludeinreport'] = 'Roles to include in the OJT evaluate report';
$string['configrolestoincludeinreportdesc'] = 'Enter a comma separated list of roles (shortname) to be included in the evaluate report for OJT. If this is left empty, all the enrolled users will be shown (Default behavour).';
// PETHAS-115
$string['submit'] = 'Evaluate other students';
$string['backbutton'] = 'Back to course';

// MPIHAS-384
$string['sorttopicitems'] = 'Save Topic Order';
$string['btn_sorttopicitems'] = 'Save Topic Item Order';
$string['positionupdate_successful'] = 'Position update successfully';
$string['btn_sorttopic'] = 'Save Topic Order';
$string['sorttopic'] = 'Sort Topic';
$string['btn_cancel'] = 'Cancel';
$string['btn_updatetopic_order'] = 'Update topic order';
// MPIHAS-523
$string['allowselfevaluation'] = 'Allow learner self-evaluation';
// HWRHAS-159
$string['completion_status'] = 'Completion status';
$string['achieved'] = 'Achieved';
$string['notachieved'] = 'Not Yet Achieved';
$string['trainingrequired'] = 'Training Required';
$string['achieved_modaltext'] = 'You are about to mark this activity\'s status as <strong>Assessment complete - competent</strong>. This means they will continue on the normal reassessment schedule. Please confirm?';
$string['notachieved_modaltext'] = 'You are about to mark this activity\'s status as <strong>Reassessment required</strong>. This means they will need to be seen by a Driver Trainer sooner than the normal reassessment schedule. Please confirm?';
$string['trainingrequired_modaltext'] = 'You are about to mark this activity\'s status as <strong>Stand down recommended</strong>. This means you are recommending to their manager that they are stood down from further driver duties until additional training and a reassessment is complete. Please confirm?.';
$string['cancel'] = 'Cancel';
$string['confirm'] = 'Confirm';
$string['confirm_modal_title'] = 'Confirm completions status';
$string['confirm_modal_body'] = 'You are about to mark this activity\'s status as <strong id="ojt-modal-completion-status"></strong>. Please confirm?';
$string['current_completion_status'] = 'Current completion status';
$string['topic_item'] = 'Topic item';
$string['ojtarchivedfor'] = 'Archived OJT record for {$a}';
$string['ojtarchivedevidence'] = 'Archived OJT Evidence';
$string['archiveojt'] = 'Archive OJT';
// VNTHAS-372.
$string['configpdfdefaultstate'] = 'Disable pdf by default';
$string['configpdfdefaultstatedesc'] = 'When checked, PDF are generated in other evidence.';
// HWRHAS-162
$string['saveallonsubmit'] = 'Save evaluation data on form submit';
$string['saveallonsubmit_help'] = 'When checked, while evaluating the learner, all form data will be saved on form submit instead of individually.';
$string['submit'] = 'Submit';
// HWRHAS-161
$string['menuoptions'] = 'Menu options';
$string['menuoptions_help'] = 'Enter menu options in a new line.';
$string['textquestion'] = 'Text question';
$string['menuquestion'] = 'Menu question';
// HWRHAS-239
$string['questiontype'] = 'Question type';
// HWRHAS-245
$string['notassessed'] = 'Not yet assessed';
// VTNHAS-375
$string['evidencetypeid'] = 'Evidence Type ID';
$string['evidencetypeiddesc'] = 'This ID will be used to map the evidence type for the OJT archived files';
//VTNHAS-390
$string['completion_date'] = 'Date of completion';
$string['observer'] = 'Observer';
