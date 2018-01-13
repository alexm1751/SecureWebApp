<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 13/01/2018
 * Time: 01:04
 */

class SQLQueries
{


    public function __construct()
    {
    }

    public function __destruct()
    {
    }

    public static function get_user_details()
    {

    }

    public static function get_stored_messages()
    {

        $m_sql_query_string  = "SELECT number, receiver, time, bearer, ref, message ";
        $m_sql_query_string .= "FROM message_content ";
        return $m_sql_query_string;

    }

    public static function set_messages($number, $receiver, $time, $bearer, $ref, $message){

        $m_sql_query_string  = "INSERT INTO message_content (number, receiver, time, bearer, ref ,message) ";
        $m_sql_query_string .= "VALUES($number ,$receiver,'$time', '$bearer', $ref , '$message' )";
        return $m_sql_query_string;

    }
}