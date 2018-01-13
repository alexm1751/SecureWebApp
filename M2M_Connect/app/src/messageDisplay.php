<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 11/01/2018
 * Time: 23:27
 */

class messageDisplay
{
   private $sender;
   private $receiver;
   private $date ;
   private $bearer;
   private $ref ;
   private $message;


   public function __construct()
   {

   }

   public function init($sender,$receiver,$date,$bearer,$ref, $message)
   {

       $this->sender = $sender;
       $this->receiver = $receiver;
       $this->date = $date;
       $this->bearer = $bearer;
       $this->ref = $ref;
       $this->message = $message;
   }

   public function getSender(){

       return $this->sender;
   }

    public function getReceiver(){

       return $this->receiver;

    }

    public function getDate(){
       return $this->date;

    }

    public function getBearer(){

       return $this->bearer;

    }

    public function getRef(){

       return $this->ref;

    }

    public function getMessage(){

       return $this->message;

    }



   public function _toString(){

       return "Sender=$this->sender";
   }

}


