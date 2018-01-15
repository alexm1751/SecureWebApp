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


    public function setMessagesDB($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $number,$receiver,$time,$bearer,$ref,$message){

            $query_string = $p_sql_queries->set_messages($number,$receiver,$time,$bearer,$ref,$message);

            $p_wrapper_mysql->set_db_handle($p_db_handle);
            $p_wrapper_mysql->safe_query($query_string);
//        }

    }

    public function check_db_register($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $arr_hash)
    {
        $string_number= $arr_hash['number'];

        $query_string = $p_sql_queries->check_user_exists($string_number);
        $p_wrapper_mysql->safe_query($query_string);
        $numbers = $p_wrapper_mysql->count_rows();
        //var_dump($numbers);

        if ($numbers > 0) {
            echo('User Number already exists!');
            return false;
        } else {
            $username= $arr_hash['username'];
            $password= $arr_hash['hashed_password'];
            $number= $arr_hash['number'];
            $query_string = $p_sql_queries->set_userDetails($username,$password,$number);
            $p_wrapper_mysql->set_db_handle($p_db_handle);
            $p_wrapper_mysql->safe_query($query_string);
            echo ('User Registered');
           // var_dump($query_string);
            return true;
        }
    }

    public function check_db_login($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $arr_clean_auth)
    {

        $number = $arr_clean_auth['number'];
        $hashed_pass = $arr_clean_auth['hashed_password'];

        $query_name = $p_sql_queries->check_password($number);

        $p_wrapper_mysql->set_db_handle($p_db_handle);
        $p_wrapper_mysql->safe_query($query_name);
        $stored_hash = $p_wrapper_mysql->safe_fetch_array();
        $password = $stored_hash['password'];
        $name_entered = $p_wrapper_mysql->count_rows();
        if ($name_entered <= 0) {
            echo('Issue With Number or Password');
            return false;
        }
        //var_dump($hashed_pass);
        //var_dump($stored_hash);
        //array password
        if (password_verify($hashed_pass, $password) != true){
            echo('Issue with Number or Password');
            return false;
        }
         else {
            echo('Welcome');
            return true;
        }


    }



    public function getUserName($p_db_handle, $p_sql_queries, $p_wrapper_mysql, $arr_hash){
        $default = 'User!';

        $number = $arr_hash['number'];
        $query_name = $p_sql_queries->check_user($number);
        $p_wrapper_mysql->set_db_handle($p_db_handle);
        $p_wrapper_mysql->safe_query($query_name);
        $query = $p_wrapper_mysql->safe_fetch_array();
        $name = $query['username'];
        if ($name != NULL){
            return $name;
        }
        else{
            return $default ;
        }


    }




}