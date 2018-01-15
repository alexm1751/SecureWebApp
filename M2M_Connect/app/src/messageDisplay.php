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

    /**Used to initialise an instance of messageDisplay
     * @param $sender Phone number of sender
     * @param $receiver Phone number of receiver
     * @param $date Date the message was sent
     * @param $bearer Type of message sent
     * @param $ref Reference of message
     * @param $message Text content of message
     */
   public function init($sender,$receiver,$date,$bearer,$ref, $message)
   {

       $this->sender = $sender;
       $this->receiver = $receiver;
       $this->date = $date;
       $this->bearer = $bearer;
       $this->ref = $ref;
       $this->message = $message;
   }

    /**Public function that returns Phone number of sender
     * @return mixed
     */
    public function getSender(){
        return $this->sender;
    }

    /**Public function that returns Phone number of receiver
     * @return mixed
     */
    public function getReceiver(){

       return $this->receiver;

    }

    /**Public function that returns date the message was sent
     * @return mixed
     */
    public function getDate(){
       return $this->date;

    }

    /**Public function that returns type of message sent
     * @return mixed
     */
    public function getBearer(){

       return $this->bearer;

    }

    /**Public function that returns reference for the message
     * @return mixed
     */
    public function getRef(){

       return $this->ref;

    }

    /**Public function that returns Text content of message
     * @return mixed
     */
    public function getMessage(){

       return $this->message;

    }

   public function _toString(){

       return "Sender=$this->sender";
   }

}


