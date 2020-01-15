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

require('../../../../config.php');

require('./archive.php');

global $DB;

if(!is_siteadmin()) {
    print_error('You do not have permission to access this page');
    die();
}

$config = get_config('ojt');
if (!empty($config) && isset($config->pdfdefaultstate) && $config->pdfdefaultstate) {
    $task = new \mod_ojt\task\archive();
    $task->execute();
    echo "PDF was generated, redirecting...";
}
else {
    echo "Nothing was run, redirecting...";
}

header("refresh:5;url=/");