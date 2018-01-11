<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 11/01/2018
 * Time: 14:06
 */

class SMSvalidator
{

    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function __destruct() { }

    private function getMessageItem($Field)
    {
        if (!isset($this->message[$Field])) {
            throw new MissingSMSFieldException($Field);
        }
        return $this->message[$Field];
    }

    private function validateSourceMSISDN(){
    $value = 'sourcemsisdn';

    $tainted_Smsisdn = $this->getMessageItem($value);
    $san_Smsisdn = filter_var($tainted_Smsisdn, FILTER_SANITIZE_NUMBER_INT);
    $clean_Smsisdn = filter_var($san_Smsisdn, FILTER_VALIDATE_INT,array("options"=>array("min_range"=>0, "max_range"=>999999999999)));
        //15 digits to meet Telecomunication Standardization Sector requirements for international numbers

        if ($clean_Smsisdn === false) {
            throw new FilterException($value);
        }

		return $clean_Smsisdn;

    }

    private function validateDestinationMSISDN(){
        $value = 'destinationmsisdn';

        $tainted_Dmsisdn = $this->getMessageItem($value);
        $san_Dmsisdn = filter_var($tainted_Dmsisdn, FILTER_SANITIZE_NUMBER_INT);
        $clean_Dmsisdn = filter_var($san_Dmsisdn, FILTER_VALIDATE_INT, array("options"=>array("min_range"=>0, "max_range"=>999999999999)));
        //15 digits to meet Telecomunication Standardization Sector requirements for international numbers

        if ($clean_Dmsisdn === false) {
            throw new FilterException($value);
        }

		return $clean_Dmsisdn;

    }

    private function validateReceivedTime(){

        $value = 'receivedtime';

        $tainted_receivedTime = $this->getMessageItem($value);
        $clean_receivedTime = filter_var($tainted_receivedTime, FILTER_SANITIZE_STRING);

        if ($clean_receivedTime === false) {
            throw new FilterException($value);
        }


        return $clean_receivedTime;

    }

    private function validateBearer(){

        $value = 'bearer';

        $tainted_bearer = $this->getMessageItem($value);
        $clean_bearer = filter_var($tainted_bearer, FILTER_SANITIZE_STRING);


        if ($clean_bearer === false){
            throw new FilterException($value);
        }

        return $clean_bearer;

    }

    private function validateMessageRef(){
        $value = 'messageref';

        $tainted_messageref = $this->getMessageItem($value);
        $san_messageref = filter_var($tainted_messageref, FILTER_SANITIZE_NUMBER_INT);
        $clean_messageref = filter_var($san_messageref, FILTER_VALIDATE_INT);


        if ($clean_messageref === false){
            throw new FilterException($value);
        }

        return $clean_messageref;
    }

    private function validateMessageContent(){

        $value = 'message';

        $tainted_messageContent = $this->getMessageItem($value);
        $clean_messageContent = filter_var($tainted_messageContent, FILTER_SANITIZE_STRING);

        if ($clean_messageContent === false) {
            throw  new FilterException($value);
        }

        return $clean_messageContent;

}

    public function validateMessages()
    {
        $sender = $this->validateSourceMSISDN();
        $receiver = $this->validateDestinationMSISDN();
        $date = $this->validateReceivedTime();
        $brearer = $this->validateBearer();
        $ref = $this->validateMessageRef();
        $message = $this->validateMessageContent();

        $newMessage = new messageDisplay($sender,$receiver,$date,$brearer,$ref,$message);

        return$newMessage;
    }
}