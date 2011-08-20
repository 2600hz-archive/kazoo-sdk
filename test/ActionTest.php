<?php
/**
 * This class is made in order to try to get a result
 * from the server. If there is a result, you should be able
 * to use the SDK correctly
 * 
 * @author Francis Genet & Peter Defebvre
 * @version 1.1
 * @since July 22, 2011 - 1.1
 */

require_once('../CrossbarSession.php');
   
class ActionTest {

    private $URL = '';
    private $AUTH_TOKEN = '';
    private $ACCOUNT_ID = '';
    
    function __construct($url, $account_id, $auth_token) {
        $this->URL = $url;
        $this->ACCOUNT_ID = $account_id;
        $this->AUTH_TOKEN = $auth_token;
        
        $this->doTest();
    }
    
    private function doTest() {
        $CrossbarSession = new CrossbarSession($this->URL, $this->ACCOUNT_ID, $this->AUTH_TOKEN);
    
        echo "<pre>";
        print_r($CrossbarSession->get('devices'));
        echo "</pre>";
    }

}
?>
