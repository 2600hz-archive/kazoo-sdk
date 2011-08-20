<?php

/**
 * Call flow Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Call_flow extends CrossbarSession{
	
	protected $URI = 'callflows';
	protected $SAMPLE = array(
		'numbers' => NULL,
		'flow' => array(
			'module' => NULL,
			'data' => NULL,
			'children' => NULL
		)
	);
}

?>
