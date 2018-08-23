<?php

$router->get('clients', 'ClientController@index');
$router->get('clients/{id}', 'ClientController@get');
$router->post('clients', 'ClientController@create');
$router->put('clients/{id}', 'ClientController@update');
