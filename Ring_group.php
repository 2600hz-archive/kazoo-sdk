<?php

/**
 * Ring group Uri and Sample definition
 * Is a part of the Call flow API
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Ring_group extends CrossbarSession{
	
	protected $URI = '';
	protected $SAMPLE = array(
		'endpoints' => array(
			'id' => NULL,
			'timeout' => NULL,
			'delay' => NULL
		),
		'timeout' => NULL,
		'strategy' => NULL
	);
}

?>
