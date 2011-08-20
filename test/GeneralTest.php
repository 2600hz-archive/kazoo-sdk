<?php

/**
 * This class is made in order to test the generals aspects
 * like the connection to the account or the auth_token
 * 
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 22, 2011 - 1.1
 */

require_once '../CrossbarSession.php';

class GeneralTest {

    private $URL = '';
    
    function __construct($url) {
        $this->URL = $url;
        
        $this->doTest();
    }
    
    private function doTest() {
        $CrossbarSession = new CrossbarSession($this->URL);

        $response = $CrossbarSession->get();

        if ($response['status'] == "success")
            echo "URL and AUTH_TOKEN correct !";
        else if ($response['status'] == "error") {

            switch($response['error']) {
                case "404":
                    echo 'Your Account might be wrong <br />';
                    break;
                case "403":
                    echo 'Your Auth_token might be wrong <br />';
                    break;

                default:
                    echo 'Unknown error <br />';
                    break;
            }

        }
    }

}

?>
