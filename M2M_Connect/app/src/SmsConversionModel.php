<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:31
 */

class SmsConversionModel
{

    public function __construct(){}

    public function __destruct(){}

    public function create_soap_client()
    {
        $obj_soap_client_handle = false;

        $m_arr_soapclient = ['trace' => true, 'exceptions' => true];
        $m_wsdl = 'https://m2mconnect.ee.co.uk/orange-soap/services/MessageServiceByCountry?wsdl';

        try {
            $obj_soap_client_handle = new SoapClient($m_wsdl, $m_arr_soapclient);
            var_dump($obj_soap_client_handle->__getFunctions());
            //var_dump($obj_soap_client_handle->__getTypes());
        } catch (SoapFault $m_obj_exception) {
            trigger_error($m_obj_exception);
        }

        return $obj_soap_client_handle;
    }
}