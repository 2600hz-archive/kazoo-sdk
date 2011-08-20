<?php

/**
 * CDR Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Cdr extends CrossbarSession{
	protected $URI = 'cdr';
	protected $SAMPLE = array (
		'id' => NULL,
		'hangup_cause' => NULL,
		'call_id' => NULL,
		'other_leg_call_id' => NULL,
		'timestamp' => NULL,
		'call_direction' => NULL,
		'to_uri' => NULL,
		'from_uri' => NULL,
		'duration_seconds' => NULL,
		'billing_seconds' => NULL,
		'ringing_seconds' => NULL
	);
}

?>
