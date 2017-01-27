<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mysqli';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'localhost';
$CFG->dbname    = 'mimooc';
$CFG->dbuser    = 'moodleuser';
$CFG->dbpass    = 'yourpassword';
$CFG->prefix    = 'mdl_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbsocket' => 0,
);

$CFG->wwwroot   = 'yoururl/mimooc';
$CFG->dataroot  = 'yourdataroot';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

$CFG->passwordsaltmain = 'yourpasswordsalt';

require_once(dirname(__FILE__) . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
