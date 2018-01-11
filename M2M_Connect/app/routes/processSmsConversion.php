<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:38
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->post(
    '/processsmsconversion',
    function(Request $request, Response $response) use ($app)  {


        $sms_model = $this->get('sms_model');

        $messages = $sms_model->getUnreadMessages();
        var_dump($messages);
//        foreach ($messages as $message){
//
//            $xmlParser = $this->get('xml_parser');
//
//            $xmlParser = new xmlParser($message);
//            $xmlParser->parse_the_xml_string();
//            $parsedMessage = $xmlParser->get_parsed_data();
//
//            echo $parsedMessage;
//            var_dump($parsedMessage);

        return $this->view->render($response,
            'display_messages.html.twig',
            [
                'css_path' => CSS_PATH,
                'landing_page' => LANDING_PAGE,
                'initial_input_box_value' => null,
                'page_title' => APP_NAME,
                'page_heading_1' => APP_NAME,
                'page_heading_2' => 'Result',

            ]);
    });
