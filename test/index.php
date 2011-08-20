<?php

/**
 * This page launch all the tests
 * 
 * @author Francis Genet
 * @version 1.1
 * @since July 22, 2011 - 1.1
 */

require_once 'GeneralTest.php';
require_once 'ActionTest.php';
require_once '../Auth.php';

// Set your infos here
$url = 'http://apps002-dev-ord.2600hz.com:8000/v1/';
$username = "frifri3";
$password = "fatboy00";

$auth = new Auth($url, $username, $password);
$authObj = $auth->getUserAuth();

$account_id = $authObj->data->account_id;
$auth_token = $authObj->auth_token;

new GeneralTest($url, $account_id, $auth_token);
new ActionTest($url, $account_id, $auth_token);

?>
