<?php
/**
 * Created by PhpStorm.
 * User: alexmason
 * Date: 10/01/2018
 * Time: 12:38
 */

$app->post(
    '/processsmsconversion',
    function()
    {
        $soap = new SmsConversionModel();
        $hello = "hello world";

        var_dump($hello);
    });