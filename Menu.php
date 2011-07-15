<?php

/**
 * Menu Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'SDK.php';

class Menu extends SDK {
	
	protected $URI = 'menus';
	protected $SAMPLE = array(
		'retries' => NULL,
		'timeout' => NULL,
		'hunt' => NULL,
		'hunt_deny' => NULL,
		'hunt_allow' => NULL,
		'max_extension_length' => NULL,
		'record_pin' => NULL
	);
}

?>
