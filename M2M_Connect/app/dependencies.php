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

//$container['validator'] = function ($container) {
//    $class_path = $container->get('settings')['class_path'];
//    require $class_path . 'validator.php';
//    $validator = new Validator();
//    return $validator;
//};
//
//$container['tempconv_model'] = function ($container) {
//    $class_path = $container->get('settings')['class_path'];
//    require $class_path . 'SmsConversionModel.php';
//    $model = new TemperatureConversionModel();
//    return $model;
//};