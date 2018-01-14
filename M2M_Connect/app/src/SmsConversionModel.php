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

    public function check_db_register($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $arr_hash)
    {
        $user_name= $arr_hash['username'];
        $query_string = $p_sql_queries->check_user_exists($user_name);
        $p_wrapper_mysql->set_db_handle($p_db_handle);
        $p_wrapper_mysql->safe_query($query_string);
        $number_of_users = $p_wrapper_mysql->count_rows();

        if ($number_of_users > 0) {
            echo('User Name already exists!');
            return false;
        } else {
            $username= $arr_hash['username'];
            $password= $arr_hash['hashed_password'];
            $number= $arr_hash['number'];
            $query_string = $p_sql_queries->set_userDetails($username,$password,$number);
            $p_wrapper_mysql->set_db_handle($p_db_handle);
            $p_wrapper_mysql->safe_query($query_string);
            var_dump($query_string);
            return true;
        }
    }

    public function check_db_login($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $user_name, $hashed_pass)
    {

        $query_name = $p_sql_queries->check_password($user_name);

        $p_wrapper_mysql->set_db_handle($p_db_handle);
        $stored_hash = $p_wrapper_mysql->safe_query($query_name);
        var_dump($stored_hash);
        $name_entered = $p_wrapper_mysql->count_rows();
        if ($name_entered <= 0) {
            echo('Issue With UserName or Password');
            return false;
        }
        //array password
        if ($hashed_pass != $stored_hash) {
            echo('Issue with UserName or Password');
            return false;
        } else {
            echo('Welcome');
            return true;
        }


    }



//        $query_string = $p_sql_queries->get_();
//
//        $p_wrapper_mysql->set_db_handle($p_db_handle);
//        $p_wrapper_mysql->safe_query($query_string);
//        $number_of_messages = $p_wrapper_mysql->count_rows();
//        if ($number_of_messages > 0)
//        {
//            while ($m_row = $p_wrapper_mysql->safe_fetch_array())
//            {
//                $m_number = $m_row['number'];
//                $m_receiver = $m_row['receiver'];
//                $m_time = $m_row['time'];
//                $m_bearer = $m_row['bearer'];
//                $m_ref = $m_row['ref'];
//                $m_message = $m_row['message'];
//
//                $m = new messageDisplay();
//                $m->init($m_number, $m_receiver, $m_time, $m_bearer, $m_ref, $m_message);
//                array_push($arr_messages, $m);
//            }
//        }
//        else
//        {
//            $arr_messages[0] = 'No Messages found';
//        }
//        return $arr_messages;
//
//    }

    public function setuserDetails($p_db_handle, $p_sql_queries, $p_wrapper_mysql){

    }




}