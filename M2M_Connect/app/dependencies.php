<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 11:06
 */
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(
        $container['settings']['view']['template_path'],
        $container['settings']['view']['twig'],
        [
            'debug' => true // This line should enable debug mode
        ]
    );

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    // This line should allow the use of {{ dump() }} debugging in Twig
    $view->addExtension(new \Twig_Extension_Debug());

    return $view;
};

$container['validator'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'SMSvalidator.php';
    $validator = new SMSvalidator();
    return $validator;
};

$container['sms_model'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'SmsConversionModel.php';
    $model = new SmsConversionModel();
    return $model;
};

$container['xml_parser'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'SMSxmlParser.php';
    $model = new SMSXmlParser();
    return $model;
};

$container['messageDisplay'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'messageDisplay.php';
    $messageDisplay = new messageDisplay();
    return $messageDisplay;
};


$container['mysql_wrapper'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'MySQLWrapper.php';
    $mysql_wrapper = new MySQLWrapper();
    return $mysql_wrapper;
};

$container['sql_queries'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'SQLQueries.php';
    $sql_queries = new SQLQueries();
    return $sql_queries;
};

$container['bcrypt_wrapper'] = function ($container) {
    $class_path = $container->get('settings')['class_path'];
    require $class_path . 'BcryptWrapper.php';
    $wrapper = new BcryptWrapper();
    return $wrapper;
};

$container['dbase'] = function ($container) {

    $db_conf = $container['settings']['pdo'];
    $host_name = $db_conf['rdbms'] . ':host=' . $db_conf['host'];
    $port_number = ';port=' . '3306';
    $user_database = ';dbname=' . $db_conf['db_name'];
    $host_details = $host_name . $port_number . $user_database;
    $user_name = $db_conf['user_name'];
    $user_password = $db_conf['user_password'];
    $pdo_attributes = $db_conf['options'];
    $obj_pdo = null;
    try
    {
        $obj_pdo = new PDO($host_details, $user_name, $user_password, $pdo_attributes);
    }
    catch (PDOException $exception_object)
    {
        trigger_error('error connecting to  database');
    }
    return $obj_pdo;
};