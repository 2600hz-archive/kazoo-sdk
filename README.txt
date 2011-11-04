-------------------------- WHISTLE SDK --------------------------

Authors: Peter Defebvre & Francis Genet
Contributors: Philippe Sultan
Creation Date: July 14, 2011
Current version : 1.3
Last modification: August 19, 2011

-------------------- What is this SDK for ? ---------------------

Using this SDK will allow you to make queries on a server 
implementing Whistle in order to modify datas in the databases
without using directly the APIs provided by the 2600hz team.

--------------------- How to configure ? ------------------------

In order to use this SDK you'll have to modify the "URL" variable
value as indicate in the comments.

------------------ How to add/update data ? ---------------------

<?php

require_once 'Device.php';
require_once 'Auth.php';

// Set your info here
$url = 'http://your.domain.com:8000/v1/';
$username = "yourusername";
$password = "yourpassword";
$realm = "your.customer.realm.com";

// Auth
$auth = new Auth($url, $realm, $username, $password);
$auth->setUserAuth();

// Creating the general object for a new device
$device = new Devices($url);

// Define info about a new device
$data = array(
	'name' => 'Test phone',
	'sip' => array(
		'realm' => 'some.domain.net',
		'method' => "password",
		'username' => "name",
		'password' => "pass",
		'invite_format' => "username",
		'custom_sip_headers' => array("X-Example" => "my-custom-sip-value")
	),
	'caller_id' => array(
		"external" => array(
			"number" => "5555555555"
		)
	),
	'caller_id_options' => array(
		'reformat' => '0'
	),
	'media' => array(
		'progress_timeout' => 6,
		'ignore_early_media' => false,
		'bypass_media' => false,
		'codecs' => "PCMU"
	),
	'ringtones' => array(
		'internal' => "dpoazkd",
		'external' => "null"
	),
	'owner_id' => "98hiuh897"
);

// Setup the actual phone
$device->add($data);

// Getting the object list
echo "<pre>";
print_r($device->getAll());
echo "</pre>";

?>

------------------------ Any Questions ? ------------------------

 - Visit http://2600hz.org
 - Join us on IRC @freenode.net - #2600hz (freefree | macpie)
 - Copyright 2011 - 2600hz

-----------------------------------------------------------------


