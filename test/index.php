<?php

/**
 * This page launch all the tests
 * 
 * @author Francis Genet
 * @version 1.3
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
$auth->setUserAuth();

new GeneralTest($url);
new ActionTest($url);

?>
