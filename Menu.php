<?php

/**
 * Menu Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Menu extends CrossbarSession {
	
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
