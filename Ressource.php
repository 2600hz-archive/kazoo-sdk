<?php

/**
 * Resource Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'SDK.php';

class Ressource extends SDK {
	
	protected $URI = 'resources';
	protected $SAMPLE = array(
		'name' => NULL,
		'enabled' => NULL,
		'weight_cost' => NULL,
		'rules' => NULL,
		'flags' => NULL,
		'caller_id_options' => NULL,
		'gateways' => array(
			"server" => NULL,
			"realm" => NULL,
			"username" => NULL,
			"password" => NULL,
			"invite_format" => NULL,
			"prefix" => NULL,
			"suffix" => NULL,
			"codecs" => NULL
		)
	);
}

?>
