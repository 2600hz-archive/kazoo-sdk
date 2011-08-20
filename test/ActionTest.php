<?php
/**
 * This class is made in order to try to get a result
 * from the server. If there is a result, you should be able
 * to use the SDK correctly
 * 
 * @author Francis Genet & Peter Defebvre
 * @version 1.3
 * @since July 22, 2011 - 1.1
 */

require_once('../CrossbarSession.php');
   
class ActionTest {

    private $URL = '';
    
    function __construct($url) {
        $this->URL = $url;
        $this->ACCOUNT_ID = $account_id;
        $this->AUTH_TOKEN = $auth_token;
        
        $this->doTest();
    }
    
    private function doTest() {
        $CrossbarSession = new CrossbarSession($this->URL);
    
        echo "<pre>";
        print_r($CrossbarSession->get('devices'));
        echo "</pre>";
    }

}
?>
