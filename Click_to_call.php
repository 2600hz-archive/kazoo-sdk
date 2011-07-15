<?php

/**
 * Click to call Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'SDK.php';

class Click_to_call extends SDK{
	
	protected $URI = 'clicktocall';
	protected $SAMPLE = array(
		'name' => NULL,
		'extension' => NULL,
		'realm' => NULL,
		'auth_required' => NULL,
		'whitelist' => NULL,
		'throttle' => NULL
	);
}

?>
