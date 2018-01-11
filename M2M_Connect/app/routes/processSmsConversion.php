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



        $parsed_xml = '';

        foreach ($messages as $message){

            $xml = simplexml_load_string($message);
            if ($xml === false) {
                echo "Failed loading XML: ";
                foreach(libxml_get_errors() as $error) {
                    echo "<br>", $error->message;
                }
            } else {
                $parsed_xml = $xml;
            }

        };


        $validator = $this->get('validator');
        $validator->init($parsed_xml);
        $validated_messages = $validator->validateMessages();
        var_dump($validated_messages);


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
