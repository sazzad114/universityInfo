<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/*configuring db adapter */
require_once 'Zend/Config/Ini.php';
require_once 'Zend/Db.php';
require_once 'Zend/Db/Table.php';
$config = new Zend_Config_Ini(APPLICATION_PATH .'/config.ini', 'general');
$db = Zend_Db::factory($config->database);
Zend_Db_Table::setDefaultAdapter($db);

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();