<?php

/**
 * Voicemail boxes Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'SDK.php';

class Voicemail_boxe extends SDK{
	
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
