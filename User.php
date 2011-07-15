<?php

/**
 * User Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'SDK.php';

class User extends SDK {
	
	protected $URI = 'users';
	protected $SAMPLE = array(
		'first_name' => NULL,
		'last_name' => NULL,
		'email' => NULL,
		'username' => NULL,
		'password' => NULL,
		'verified' => NULL,
		'lang' => NULL,
		'timezone' => NULL,
		'caller_id' => array(
			'name' => NULL,
			'number' => NULL
		),
		'caller_id_options' => NULL,
		'call_forward' => array(
			'enabled' => NULL,
			'number' => NULL,
			'require_keypress' => NULL,
			'keep_caller_id' => NULL
		),
		'vm_to_email_enabled' => NULL
	);
}

?>
