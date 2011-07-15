<?php

/**
 * Call flow Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'SDK.php';

class Call_flow extends SDK{
	
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
