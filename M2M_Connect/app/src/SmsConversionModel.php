<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:31
 */

class SmsConversionModel
{
    private $client;

    public function __construct(){

        $this->client = new SoapClient('https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl');
    }

    public function __destruct(){}

    public function getUnreadMessages()
    {
        return $this->client->peekMessages('17alexmason','Fendervox50', 10);
    }

    public function getDeliveryReports()
    {
        return $this->client->getDeliveryReports('17alexmason','Fendervox50', 10);
        var_dump($this->__getLastRequest());
    }
    public function create_soap_client()
    {
        $obj_soap_client_handle = false;

        $m_arr_soapclient = ['trace' => true, 'exceptions' => true];
        $m_wsdl = 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl';

        try {
            $obj_soap_client_handle = new SoapClient($m_wsdl, $m_arr_soapclient);
//            var_dump($obj_soap_client_handle->__getFunctions());
//            var_dump($obj_soap_client_handle->__getTypes());
        } catch (SoapFault $m_obj_exception) {
            trigger_error($m_obj_exception);
        }

        return $obj_soap_client_handle;
    }
    public function retrieve_detail($p_obj_soap_client_handle)
    {
        $result = null;
        $details = null;

//        $parameter = [
//            'username' => $this->c_username,
//            'password' => $this->c_password,
//            'number' => $this->c_number,
//            'countrycode' =>$this->c_countrycode];
        $parameter = [
            'username' => '17alexmason',
            'password' => 'Fendervox50',
            'count' => 100,
            'countryCode' =>'44'];

        //$soapfunction = DETAIL_TYPES[$this->c_detail];
        try
        {

            $details = $p_obj_soap_client_handle->__soapCall("readmessages", [$parameter]);
            var_dump($details);
            var_dump($p_obj_soap_client_handle->__getLastRequest());
            if (isset($details->GetMessagesResult))
            {
                $result = $details->GetMessagesResult;
            }
var_dump($details);
      var_dump($p_obj_soap_client_handle->__getLastRequest());
      var_dump($p_obj_soap_client_handle->__getLastResponse());
      var_dump($p_obj_soap_client_handle->__getLastRequestHeaders());
      var_dump($p_obj_soap_client_handle->__getLastResponseHeaders());
        }
        catch (SoapFault $m_obj_exception)
        {
            trigger_error($m_obj_exception);
        }

        return $result;
    }
}