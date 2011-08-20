<?php

/**
 * Description of Auth
 *
 * @author frifri
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
    
    public function getUserAuth() {
        // the datas we gonna send
        $json['data'] = array(
            'credentials' => $this->CREDENTIALS,
            'realm' => $this->USERNAME.'.sip.2600hz.com'
        );
        
        try {
            $result = json_decode($this->PEST->basicPut("user_auth", json_encode($json)));
            return $result;
        } catch(Exception $e) {
            echo $e->getMessage();
            return FALSE;
        }
    }

}

?>
