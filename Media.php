<?php

/**
 * Media Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Media extends CrossbarSession {

	protected $URI = 'media';
	protected $SAMPLE = array(
		'display_name' => NULL,
		'media_type' => NULL
	);

}

?>
