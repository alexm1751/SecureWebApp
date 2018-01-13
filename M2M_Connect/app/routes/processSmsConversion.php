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


        $c_arr_clean_message = [];

        $xml_parser = $this->get('xml_parser');

        $validator = $this->get('validator');

        $sms_model = $this->get('sms_model');

        $db_handle = $this->get('dbase');

        $sql_queries = $this->get('sql_queries');

        $wrapper_mysql = $this->get('mysql_wrapper');

        $message_display = $this->get('messageDisplay');


        /**<messagerx><sourcemsisdn>447817814149</sourcemsisdn><destinationmsisdn>447817814149</destinationmsisdn><receivedtime>12/01/2018 15:24:09</receivedtime><bearer>SMS</bearer><messageref>0</messageref><message>Hello5 </message></messagerx>**/

        $arr_tainted_messages = $sms_model->getUnreadMessages();


        //var_dump($arr_tainted_messages);
        foreach($arr_tainted_messages as $tainted_message){
            //var_dump($tainted_message);

            //Uncomment and use var below this comment to test for passing Null
            //$tainted_message = null;
            try {
                $xml_parser->set_xml_string_to_parse($tainted_message);
            } catch (Exception $e) {
                print("We got nothing I tell you!");
                break;
            }


            $xml_parser->parse_the_xml_string();
            $xml = $xml_parser->get_parsed_data();
            //var_dump($xml);
            //xml wont update

            if ($xml === false) {
                echo "Failed loading XML: ";
                foreach (libxml_get_errors() as $error) {
                    echo "<br>", $error->message;
                }
            }
            else{
                $arr_parsed_xml = $xml;
            }
            $tainted_source = $arr_parsed_xml['SOURCEMSISDN'];
            $clean_source = $validator->validate_source($tainted_source);
            //var_dump($clean_source);
            $tainted_receiver = $arr_parsed_xml['DESTINATIONMSISDN'];
            $clean_receiver = $validator->validate_receiver($tainted_receiver);

            $tainted_time = $arr_parsed_xml['RECEIVEDTIME'];
            $clean_time = $validator->validate_time($tainted_time);

            $tainted_bearer = $arr_parsed_xml['BEARER'];
            $clean_bearer = $validator->validate_bearer($tainted_bearer);

            $tainted_ref = $arr_parsed_xml ['MESSAGEREF'];
            $clean_ref = $validator->validate_ref($tainted_ref);

            $tainted_message = $arr_parsed_xml['MESSAGE'];
            $clean_message = $validator->validate_message($tainted_message);

           // $c_arr_clean_message = $message_display->init($clean_source,$clean_receiver,$clean_time,$clean_bearer,$clean_ref,$clean_message);

            //var_dump($c_arr_clean_message);
            //var_dump($clean_message);

//            $message=(PHP_EOL. 'Source= ' . $clean_source . PHP_EOL
//                . "Receiver= " . $clean_receiver . PHP_EOL
//                . "Time= " . $clean_time . PHP_EOL
//                . "Bearer= " . $clean_bearer . PHP_EOL
//                . "Ref= " . $clean_ref . PHP_EOL
//                . "Message= " . $clean_message);




            //echo $message;

            $xml_parser->clear_data();
            $result = $sms_model->setMessagesDB($db_handle, $sql_queries, $wrapper_mysql, $clean_source, $clean_receiver, $clean_time, $clean_bearer, $clean_ref, $clean_message);
            //var_dump($result);
        }

        //$result = $sms_model->setMessagesDB($db_handle, $sql_queries, $wrapper_mysql, $c_arr_clean_message);

        //var_dump($result);

        $list_messages = $sms_model->getMessagesDB($db_handle,$sql_queries,$wrapper_mysql);
        print_r($list_messages);
      // var_dump($list_messages);



//      I Just need a way of printing it all out now

//        $sms_model = $this->get('sms_model');
//
//        $messages = $sms_model->getUnreadMessages();
//
//
//
//        $parsed_xml = '';
//
//        foreach ($messages as $message){
//
//            $xml = simplexml_load_string($message);
//            if ($xml === false) {
//                echo "Failed loading XML: ";
//                foreach(libxml_get_errors() as $error) {
//                    echo "<br>", $error->message;
//                }
//            } else {
//                $parsed_xml = $xml;
//            }
//
//        };
//
//
//        $validator = $this->get('validator');
        //$validator->init($details);
        //$validated_messages = $validator->validateMessages();
        //var_dump($validated_messages);

        //var_dump($details);




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
