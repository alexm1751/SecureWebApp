<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:31
 */

class SmsConversionModel
{
    private $client;



    public function __construct(){

        $this->client = new SoapClient('https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl');
    }

    public function __destruct(){}

    public function getUnreadMessages()
    {
        return $this->client->peekMessages('17alexmason','Fendervox50', 1000);
    }

    public function getDeliveryReports()
    {
        return $this->client->getDeliveryReports('17alexmason','Fendervox50', 1000);

    }
    public  function readMessages()
    {
        return $this->client->readMessages('17alexmason','Fendervox50', 1000);
    }


    public function getMessagesDB($p_db_handle, $p_sql_queries, $p_wrapper_mysql){
        $arr_messages = [];
        $query_string = $p_sql_queries->get_stored_messages();

        $p_wrapper_mysql->set_db_handle($p_db_handle);
        $p_wrapper_mysql->safe_query($query_string);
        $number_of_messages = $p_wrapper_mysql->count_rows();
        if ($number_of_messages > 0)
        {
            while ($m_row = $p_wrapper_mysql->safe_fetch_array())
            {
                $m_number = $m_row['number'];
                $m_receiver = $m_row['receiver'];
                $m_time = $m_row['time'];
                $m_bearer = $m_row['bearer'];
                $m_ref = $m_row['ref'];
                $m_message = $m_row['message'];

                $m = new messageDisplay();
                $m->init($m_number, $m_receiver, $m_time, $m_bearer, $m_ref, $m_message);
                array_push($arr_messages, $m);
            }
        }
        else
        {
            $arr_messages[0] = 'No Messages found';
        }
        return $arr_messages;

    }

    public function setMessagesDB2($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $arr_clean_messages){
     //   var_dump($arr_clean_messages);
//            foreach ($arr_clean_messages as $message){
//            $number = $message['SOURCEMSISDN'];
//
//            $receiver = $message['DESTINATIONMSISDN'];
//
//            $time = $message['RECEIVEDTIME'];
//
//            $bearer = $message['BEARER'];
//
//            $ref = $message ['MESSAGEREF'];
//
//            $message = $message['MESSAGE'];
//            $query_string = $p_sql_queries->set_messages();
//
//            $p_wrapper_mysql->set_db_handle($p_db_handle);
//            $p_wrapper_mysql->safe_query($query_string($number,$receiver,$time,$bearer,$ref,$message));
//        }

    }
    public function setMessagesDB($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $number,$receiver,$time,$bearer,$ref,$message){
//        var_dump($arr_clean_messages);
//            foreach ($arr_clean_messages as $message){
//            $number = $message['SOURCEMSISDN'];
//
//            $receiver = $message['DESTINATIONMSISDN'];
//
//            $time = $message['RECEIVEDTIME'];
//
//            $bearer = $message['BEARER'];
//
//            $ref = $message ['MESSAGEREF'];
//
//            $message = $message['MESSAGE'];
            $query_string = $p_sql_queries->set_messages($number,$receiver,$time,$bearer,$ref,$message);

            $p_wrapper_mysql->set_db_handle($p_db_handle);
            $p_wrapper_mysql->safe_query($query_string);
//        }

    }

    public function getUserDetails($p_db_handle, $p_sql_queries, $p_wrapper_mysql){

    }

    public function setuserDetails($p_db_handle, $p_sql_queries, $p_wrapper_mysql){

    }

}