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

}