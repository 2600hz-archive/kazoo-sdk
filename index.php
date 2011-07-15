<?php
/**
 * SDK usage example
 * 
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'Device.php';


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


// Creating the general object
$device = new Devices();

// Adding an object
//$device->add($data);

// Getting the object list
$device->getAll();


?>
