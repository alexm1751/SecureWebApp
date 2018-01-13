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

    public function getdate(){
       return $this->date;

    }

    public function getbearer(){

       return $this->bearer;

    }

    public function getref(){

       return $this->ref;

    }

    public function getmessage(){

       return $this->message;

    }



   public function _toString(){

       return "Sender=$this->sender";
   }

}


