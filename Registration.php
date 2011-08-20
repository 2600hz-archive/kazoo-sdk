<?php

/**
 * Registration Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Registration extends CrossbarSession {
	
	protected $URI = 'registrations';
	protected $SAMPLE = array (
		'id' => NULL
	);
}

?>
