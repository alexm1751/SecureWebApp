<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:36
 */

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


$app->map(['GET', 'POST'], '/register', function(Request $request, Response $response) use ($app) {

    $c_arr_clean_message = [];

    $xml_parser = $this->get('xml_parser');

    $validator = $this->get('validator');

    $sms_model = $this->get('sms_model');

    $db_handle = $this->get('dbase');

    $sql_queries = $this->get('sql_queries');

    $wrapper_mysql = $this->get('mysql_wrapper');

    $bcrypt_wrapper = $this->get('bcrypt_wrapper');


    $arr_tainted_auth = $request->getParsedBody();




    $arr_cleaned_auth = validation($validator, $arr_tainted_auth);

    $arr_hashed = hash_values($bcrypt_wrapper, $arr_cleaned_auth);


    $username = '';

    if(sizeof($arr_hashed) >2){
        try {
            $register_details= $sms_model->check_db_register($db_handle,$sql_queries,$wrapper_mysql, $arr_hashed);
            $username = $sms_model->getUserName($db_handle,$sql_queries,$wrapper_mysql, $arr_hashed);
        } catch (Exception $e) {
            return $response->withRedirect('/SecureWebApp/M2M_Connect_public/');
        }
    }
    else{
        try {
            $login_details= $sms_model->check_db_login($db_handle,$sql_queries,$wrapper_mysql, $arr_hashed);
            $username = $sms_model->getUserName($db_handle,$sql_queries,$wrapper_mysql, $arr_hashed);

        } catch (Exception $e) {
            return $response->withRedirect('/SecureWebApp/M2M_Connect_public/');
        }


    }


    return $this->view->render($response,
        'register.html.twig',
        [
            'css_path' => CSS_PATH,
            'landing_page' => LANDING_PAGE,
            'initial_input_box_value' => null,
            'page_title' => APP_NAME,
            'username' => $username,
            'method' => 'post',
            'action' => 'processsmsconversion',
        ]);
})->setName('register');



/**validation of parameters given by the current user for login or registration.
 * @param $p_validator instance of SMSvalidator.php
 * @param $p_arr_tainted_params array of parameters containing user details
 * @return array array of validated user details
 */
function validation($p_validator, $p_arr_tainted_params)
{

    $arr_cleaned_params = [];

    if (sizeof($p_arr_tainted_params) > 2 ){
        $tainted_username = $p_arr_tainted_params['reguser'];
        $tainted_number = $p_arr_tainted_params['regnumber'];

        $arr_cleaned_params['password'] = $p_arr_tainted_params['regpass'];
        try {
            $arr_cleaned_params['sanitised_username'] = $p_validator->validateAuthString($tainted_username);
            $arr_cleaned_params['sanitised_number'] = $p_validator->validate_source($tainted_number);
        } catch (Exception $e) {
            echo $e;
        }

        return $arr_cleaned_params;
    }
    else {
        $tainted_number = $p_arr_tainted_params['loguser'];
        try {
            $arr_cleaned_params['password'] = $p_arr_tainted_params['logpass'];
            $arr_cleaned_params['sanitised_number'] = $p_validator->validate_source($tainted_number);
        } catch (Exception $e) {
            echo $e;
        }
        return $arr_cleaned_params;
    }

}


/**Hashes a given password and returns it along with other associated user details.
 * @param $p_bcrypt_wrapper instance of BcryptWrapper.php
 * @param $p_arr_cleaned_params array of validated parameters
 * @return array array of user details with a hashed password.
 */
function hash_values($p_bcrypt_wrapper, $p_arr_cleaned_params)
{
    $arr_encoded = [];

    if (sizeof($p_arr_cleaned_params) > 2){
        $arr_encoded['hashed_password'] = $p_bcrypt_wrapper->create_hashed_password($p_arr_cleaned_params['password']);
        $arr_encoded['username'] = $p_arr_cleaned_params['sanitised_username'];
        $arr_encoded['number'] = $p_arr_cleaned_params['sanitised_number'];
        return $arr_encoded;
    }
    else {
        $arr_encoded['hashed_password'] = $p_arr_cleaned_params['password'];
        $arr_encoded['number'] = $p_arr_cleaned_params['sanitised_number'];
        return $arr_encoded;
    }
}
