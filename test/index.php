<?php

/**
 * This page launch all the tests
 * 
 * @author Francis Genet
 * @version 1.1
 * @since July 22, 2011 - 1.1
 */

require_once 'GeneralTest.php';
require_once 'ActionTest.php';

// Set your URL here
$url = 'http://blah.yourdomain.com:8000/v1/accounts/{your_account_id}/';
// Set your Auth Token here (If the server need one)
$auth_token = '{your_auth_token}';

new GeneralTest($url, $auth_token);
new ActionTest($url, $auth_token);

?>
