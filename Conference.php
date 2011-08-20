<?php

/**
 * Conference Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Conference extends CrossbarSession {
	
	protected $URI = 'conferences';
	protected $SAMPLE = array(
		'name' => NULL,
		'member_pins' => NULL,
		'moderator_pins' => NULL,
		'member_join_muted' => NULL,
		'member_join_deaf' => NULL,
		'moderator_join_muted' => NULL,
		'moderator_join_deaf' => NULL,
	);
}

?>
