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
$url = 'http://yourDomain:8000/v1/';
$username = "username";
$password = "password";
$realm = "your.sip.2600hz.com";

$auth = new Auth($url, $realm, $username, $password);
$auth->setUserAuth();

new GeneralTest($url);
new ActionTest($url);

?>
