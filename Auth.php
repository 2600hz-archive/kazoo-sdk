<?php

/**
 * Auth class
 *
 * @author Francis Genet
 * @version 1.3
 * @since August 19, 2011 - 1.2
 * 
 */

require_once 'Pest.php';

class Auth {

    private $CREDENTIALS = '';
    private $USERNAME = '';
    private $PEST;

    function __construct($url, $username, $password) {
        $this->CREDENTIALS = md5($username.":".$password);
        $this->USERNAME = $username;
        $this->PEST = new Pest($url);
    }
    
    public function setUserAuth() {
        // the datas we gonna send
        $json['data'] = array(
            'credentials' => $this->CREDENTIALS,
            'realm' => $this->USERNAME.'.sip.2600hz.com'
        );
        
        try {
            $result = json_decode($this->PEST->basicPut("user_auth", json_encode($json)));
            
            define("ACCOUNT_ID", $result->data->account_id);
            define("AUTH_TOKEN", $result->auth_token);
        } catch(Exception $e) {
            echo $e->getMessage();
            return FALSE;
        }
    }

}

?>
