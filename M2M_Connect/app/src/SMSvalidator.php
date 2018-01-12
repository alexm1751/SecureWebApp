<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 11/01/2018
 * Time: 14:06
 */

class SMSvalidator
{



    public function __construct()
    {

    }

    public function __destruct() { }



    public function validate_source($value){


    $tainted_Smsisdn = $value;
    $san_Smsisdn = filter_var($tainted_Smsisdn, FILTER_SANITIZE_NUMBER_INT);
    $clean_Smsisdn = filter_var($san_Smsisdn, FILTER_VALIDATE_INT,array("options"=>array("min_range"=>0, "max_range"=>999999999999)));
        //15 digits to meet Telecomunication Standardization Sector requirements for international numbers

        if ($clean_Smsisdn === false) {
            throw new Exception('nope');

        }

		return $clean_Smsisdn;

    }

    public function validate_receiver($value){

        $tainted_Dmsisdn = $value;
        $san_Dmsisdn = filter_var($tainted_Dmsisdn, FILTER_SANITIZE_NUMBER_INT);
        $clean_Dmsisdn = filter_var($san_Dmsisdn, FILTER_VALIDATE_INT, array("options"=>array("min_range"=>0, "max_range"=>999999999999)));
        //15 digits to meet Telecomunication Standardization Sector requirements for international numbers

        if ($clean_Dmsisdn === false) {
            throw new Exception('nope');
        }

		return $clean_Dmsisdn;

    }

    public function validate_time($value){


        $tainted_receivedTime = $value;
        $clean_receivedTime = filter_var($tainted_receivedTime, FILTER_SANITIZE_STRING);

        if ($clean_receivedTime === false) {
            throw new Exception('nope');
        }


        return $clean_receivedTime;

    }

    public function validate_bearer($value){


        $tainted_bearer = $value;
        $clean_bearer = filter_var($tainted_bearer, FILTER_SANITIZE_STRING);


        if ($clean_bearer === false){
            throw new Exception('nope');
        }

        return $clean_bearer;

    }

    public function validate_ref($value){


        $tainted_messageref = $value;
        $san_messageref = filter_var($tainted_messageref, FILTER_SANITIZE_NUMBER_INT);
        $clean_messageref = filter_var($san_messageref, FILTER_VALIDATE_INT);


        if ($clean_messageref === false){
            throw new Exception('nope');
        }

        return $clean_messageref;
    }

    public function validate_message($value){


        $tainted_messageContent = $value;
        $clean_messageContent = filter_var($tainted_messageContent, FILTER_SANITIZE_STRING);

        if ($clean_messageContent === false) {
            throw new Exception('nope');
        }

        return $clean_messageContent;

}

}
