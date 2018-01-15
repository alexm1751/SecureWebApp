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

    /**Builds an SQL string to get all messages from the message_content table.
     * @return string SQL SELECT statement
     */
    public static function get_stored_messages()
    {

        $m_sql_query_string  = "SELECT number, receiver, time, bearer, ref, message ";
        $m_sql_query_string .= "FROM message_content ";
        return $m_sql_query_string;

    }

    /**Builds an SQL string to post a new message to the message_content table.
     * @param $number Phone number of sender
     * @param $receiver Phone number of receiver
     * @param $time Time of delivery
     * @param $bearer Type of message sent
     * @param $ref Reference for message
     * @param $message The message text content
     * @return string string SQL INSERT statement
     */
    public static function set_messages($number, $receiver, $time, $bearer, $ref, $message){

        $m_sql_query_string  = "INSERT INTO message_content (number, receiver, time, bearer, ref ,message) ";
        $m_sql_query_string .= "VALUES($number ,$receiver,'$time', '$bearer', $ref , '$message' )";
        return $m_sql_query_string;

    }

    /**Builds an SQL string to post user details to the user table
     * @param $username Name of the user
     * @param $password Hashed user password
     * @param $number Users phone number
     * @return string string SQL INSERT statement
     */
    public static function set_userDetails($username, $password, $number)
    {
        $m_sql_query_string  = "INSERT INTO user (username, password, number) ";
        $m_sql_query_string .= "VALUES('$username' ,'$password', $number)";
        return $m_sql_query_string;
    }

    /**Builds an SQL string to get messages from the message_content table for a given phone number
     * @param $current_user Users phone number
     * @return string string SQL SELECT statement
     */
    public static function get_user_messages($current_user)
    {
        $m_sql_query_string  = "SELECT number, receiver, time, bearer, ref, message ";
        $m_sql_query_string .= "FROM message_content ";
        $m_sql_query_string .= "WHERE number =  '$current_user'";
        return $m_sql_query_string;
    }

    /**Builds an SQL string to check if a phone number exists in the user table
     * @param $number Phone number to check
     * @return string string SQL select statement
     */
    public static function check_user_exists($number)
    {
        $m_sql_query_string  = "SELECT number ";
        $m_sql_query_string .= "FROM user ";
        $m_sql_query_string .= "WHERE number =  $number";
        return $m_sql_query_string;

    }

    /**Builds an SQL string to get a password for a given phone number from the user table
     * @param $number Phone number to check
     * @return string string SQL select statement
     */
    public static function check_password($number){
        $m_sql_query_string  = "SELECT password ";
        $m_sql_query_string .= "FROM user ";
        $m_sql_query_string .= "WHERE number =  $number";
        return $m_sql_query_string;
    }

    /**Builds an SQL string to get a users name from the user table with a given phone number
     * @param $number Phone number to check
     * @return string string SQL select statement
     */
    public static function check_user($number){
        $m_sql_query_string  = "SELECT username ";
        $m_sql_query_string .= "FROM user ";
        $m_sql_query_string .= "WHERE number =  $number";
        return $m_sql_query_string;
    }

}