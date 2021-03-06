<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 14/01/2018
 * Time: 05:42
 */

class BcryptWrapper
{

    public function __construct(){}

    public function __destruct(){}

    /**Generates and returns a hashed string
     * @param $p_string_to_hash String that needs to be hashed
     * @return bool|string hashed string
     */
    public function create_hashed_password($p_string_to_hash)
    {
        $password_to_hash = $p_string_to_hash;
        $bcrypt_hashed_password = '';
        if (!empty($password_to_hash))
        {
            $arr_options = array('cost' => BCRYPT_COST);
            $bcrypt_hashed_password = password_hash($password_to_hash, BCRYPT_ALGO, $arr_options);
        }
        return $bcrypt_hashed_password;
    }

    /**Verifies a given hashed password against a clean string password to check for equality
     * @param $p_string_to_check clean string password
     * @param $p_stored_user_password_hash hashed password to check against
     * @return bool true if the hashed password and clean string are equal
     */
    public function authenticate_password($p_string_to_check, $p_stored_user_password_hash)
    {
        $user_authenticated = false;
        $current_user_password = $p_string_to_check;
        $stored_user_password_hash = $p_stored_user_password_hash;
        if (!empty($current_user_password) && !empty($stored_user_password_hash))
        {
            if (password_verify($current_user_password, $stored_user_password_hash))
            {
                $user_authenticated = true;
            }
        }
        return $user_authenticated;
    }


}
