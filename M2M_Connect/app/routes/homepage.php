<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:36
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function(Request $request, Response $response)
{

    $sms_model = $this->get('sms_model');



    $messages = $sms_model->getUnreadMessages();
    var_dump($messages);
    return $this->view->render($response,
        'homepageform.html.twig',
        [
            'css_path' => CSS_PATH,
            'landing_page' => LANDING_PAGE,
            'method' => 'post',
            'action' => 'index.php/processsmsconversion',
            'initial_input_box_value' => null,
            'page_title' => APP_NAME,
            'page_heading_1' => APP_NAME,
            'page_heading_2' => 'EE SMS Messaging Service',
            'page_text' => 'Select a message',
        ]);
})->setName('homepage');