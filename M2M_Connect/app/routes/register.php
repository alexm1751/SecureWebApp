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

    var_dump($request->getParsedBody());
    if (false) {
        return $response->withRedirect('/SecureWebApp/M2M_Connect_public/');
    }

    return $this->view->render($response,
        'register.html.twig',
        [
            'css_path' => CSS_PATH,
            'landing_page' => LANDING_PAGE,
            'initial_input_box_value' => null,
            'page_title' => APP_NAME,
            'method' => 'post',
            'action' => 'processsmsconversion',
        ]);
})->setName('register');
