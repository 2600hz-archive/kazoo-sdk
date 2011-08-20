<?php

/**
 * Account Uri and Sample definition
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'CrossbarSession.php';

class Account extends CrossbarSession {

	/**
	 * Account Uri
	 * 
	 * @var string $URI 
	 * 
	 */
	protected $URI = '';
	
	/**
	 * Sample array.
	 * Use to format the data
	 * 
	 * @var array SAMPLE 
	 * 
	 */
	protected $SAMPLE = array(
		'name' => NULL,
		'realm' => NULL,
		'caller_id' => array(
			'name' => NULL,
			'number' => NULL
		),
		'caller_id_options' => NULL,
		'vm_to_email_template' => NULL
	);

}

?>
