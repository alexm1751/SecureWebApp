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

    public static function set_userDetails($username, $password, $number)
    {
        $m_sql_query_string  = "INSERT INTO user (username, password, number) ";
        $m_sql_query_string .= "VALUES('$username' ,'$password', $number)";
        return $m_sql_query_string;
}
    public static function get_user_messages($current_user)
    {
        $m_sql_query_string  = "SELECT number, receiver, time, bearer, ref, message ";
        $m_sql_query_string .= "FROM message_content ";
        $m_sql_query_string .= "WHERE number =  '$current_user'";
        return $m_sql_query_string;
    }

    public static function check_user_exists($number)
    {
        $m_sql_query_string  = "SELECT number ";
        $m_sql_query_string .= "FROM user ";
        $m_sql_query_string .= "WHERE number =  $number";
        var_dump($m_sql_query_string);
        return $m_sql_query_string;

    }

    public static function check_password($number){
        $m_sql_query_string  = "SELECT password ";
        $m_sql_query_string .= "FROM user ";
        $m_sql_query_string .= "WHERE number =  $number";
        //var_dump($m_sql_query_string);
        return $m_sql_query_string;
    }

}