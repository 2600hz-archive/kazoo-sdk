<?php

/**
 * Voicemail boxes Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.1
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Voicemail_boxe extends CrossbarSession{
	
	protected $URI = 'vmboxes';
	protected $SAMPLE = array(
		'mailbox' => NULL,
		'pin' => NULL,
		'timezone' => NULL,
		'require_pin' => NULL,
		'check_if_owner' => NULL,
		'skip_greeting' => NULL,
		'skip_instructions' => NULL
	);
}

?>
