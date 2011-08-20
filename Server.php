<?php

/**
 * Server Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Server extends CrossbarSession {
	
	protected $URI = 'servers';
	protected $SAMPLE = array(
		'hostname' => NULL,
		'ip' => NULL,
		'roles' => NULL,
		'password' => NULL,
		'operating_system' => NULL,
		'deploy_status' => NULL
	);
}

?>
