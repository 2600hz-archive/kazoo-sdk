<?php

/**
 * Event subscription Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class EvtSub extends CrossbarSession {
	
	protected $URI = 'evtsub';
	protected $SAMPLE = array(
		'stream' => NULL,
		'max_events' => NULL,
		'flush' => NULL,
		'subscriptions' => NULL,
		'events' => NULL
	);
}

?>
