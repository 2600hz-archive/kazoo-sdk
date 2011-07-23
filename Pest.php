<?php

/**
 * Pest is a REST client for PHP.
 *
 * See http://github.com/educoder/pest for details.
 *
 * This code is licensed for use, modification, and distribution
 * under the terms of the MIT License (see http://en.wikipedia.org/wiki/MIT_License)
 */

class Pest {

    public $curl_opts = array(
        CURLOPT_RETURNTRANSFER => TRUE, // return result instead of echoing
        CURLOPT_SSL_VERIFYPEER => FALSE, // stop cURL from verifying the peer's certificate
        CURLOPT_FOLLOWLOCATION => TRUE, // follow redirects, Location: headers
        CURLOPT_MAXREDIRS => 10     // but dont redirect more than 10 times
    );
    public $base_url;
    public $auth_token;
    public $last_response;
    public $last_request;

    public function __construct($base_url, $auth_token) {
        if(!function_exists('curl_init')) {
            throw new Exception('CURL module not available! Pest requires CURL. See http://php.net/manual/en/book.curl.php');
        }

        $this->base_url = $base_url;
        $this->auth_token = $auth_token;
    }

    public function get($url) {
        $curl_opts = $this->curl_opts;
        $curl_opts[CURLOPT_HTTPHEADER] = array('X-Auth-Token: '.$this->auth_token, 'Accept: application/json');

        $curl = $this->prepRequest($curl_opts, $this->base_url.$url);
        $body = $this->doRequest($curl);

        $body = $this->processBody($body);

        return $body;
    }

    public function post($url, $data) {
        $data = (is_array($data)) ? http_build_query($data) : $data;

        $curl_opts = $this->curl_opts;
        $curl_opts[CURLOPT_CUSTOMREQUEST] = 'POST';
        $curl_opts[CURLOPT_HTTPHEADER] = array('X-Auth-Token: '.$this->auth_token, 'Content-Length: '.strlen($data), 'Content-type:application/json');
        $curl_opts[CURLOPT_POSTFIELDS] = $data;

        $curl = $this->prepRequest($curl_opts, $this->base_url.$url);
        $body = $this->doRequest($curl);

        $body = $this->processBody($body);

        return $body;
    }

    public function put($url, $data) {
        $data = (is_array($data)) ? http_build_query($data) : $data;

        $curl_opts = $this->curl_opts;
        $curl_opts[CURLOPT_CUSTOMREQUEST] = 'PUT';
        $curl_opts[CURLOPT_HTTPHEADER] = array('X-Auth-Token: '.$this->auth_token, 'Content-Length: '.strlen($data), 'Content-type:application/json');
        $curl_opts[CURLOPT_POSTFIELDS] = $data;

        $curl = $this->prepRequest($curl_opts, $this->base_url.$url);
        $body = $this->doRequest($curl);

        $body = $this->processBody($body);

        return $body;
    }

    public function delete($url) {
        $curl_opts = $this->curl_opts;
        $curl_opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
        $curl_opts[CURLOPT_HTTPHEADER] = array('X-Auth-Token: '.$this->auth_token, 'Accept: application/json');

        $curl = $this->prepRequest($curl_opts, $this->base_url.$url);
        $body = $this->doRequest($curl);

        $body = $this->processBody($body);

        return $body;
    }

    public function lastBody() {
        return $this->last_response['body'];
    }

    public function lastStatus() {
        return $this->last_response['meta']['http_code'];
    }

    public function processBody($body) {
        // Override this in classes that extend Pest.
        // The body of every GET/POST/PUT/DELETE response goes through 
        // here prior to being returned.
        return $body;
    }

    public function processError($code) {
        // Override this in classes that extend Pest.
        // The body of every erroneous (non-2xx/3xx) GET/POST/PUT/DELETE  
        // response goes through here prior to being used as the 'message'
        // of the resulting Pest_Exception
        return "HTTP return code : " .$code . "\n";
    }

    private function prepRequest($opts, $url) {
        $curl = curl_init($url);

        foreach($opts as $opt => $val)
            curl_setopt($curl, $opt, $val);

        $this->last_request = array(
            'url' => $url
        );

        if(isset($opts[CURLOPT_CUSTOMREQUEST]))
            $this->last_request['method'] = $opts[CURLOPT_CUSTOMREQUEST];
        else
            $this->last_request['method'] = 'GET';

        if(isset($opts[CURLOPT_POSTFIELDS]))
            $this->last_request['data'] = $opts[CURLOPT_POSTFIELDS];

        return $curl;
    }

    private function doRequest($curl) {
        $body = curl_exec($curl);
        $meta = curl_getinfo($curl);

        $this->last_response = array(
            'body' => $body,
            'meta' => $meta
        );

        curl_close($curl);

	try {
        $this->checkLastResponseForError();
	} catch (Exception $e) {
		echo("Received exception: " .$e->getMessage() . "<br />");
	};

        return $body;
    }

    private function checkLastResponseForError() {
        $meta = $this->last_response['meta'];
        $body = $this->last_response['body'];

        if(!$meta)
            return;

        $err = null;
        switch($meta['http_code']) {
            case 400:
                throw new Pest_BadRequest($this->processError($meta['http_code'] . ' Bad Request'));
                break;
            case 401:
                throw new Pest_Unauthorized($this->processError($meta['http_code'] . ' Unauthorized'));
                break;
            case 403:
                throw new Pest_Forbidden($this->processError($meta['http_code'] . ' Forbidden'));
                break;
            case 404:
                throw new Pest_NotFound($this->processError($meta['http_code'] . ' Not Found'));
                break;
            case 405:
                throw new Pest_MethodNotAllowed($this->processError($meta['http_code'] . ' Method Not Allowed'));
                break;
            case 409:
                throw new Pest_Conflict($this->processError($meta['http_code'] . ' Conflict'));
                break;
            case 410:
                throw new Pest_Gone($this->processError($meta['http_code'] . ' Gone'));
                break;
            case 422:
                // Unprocessable Entity -- see http://www.iana.org/assignments/http-status-codes
                // This is now commonly used (in Rails, at least) to indicate
                // a response to a request that is syntactically correct,
                // but semantically invalid (for example, when trying to 
                // create a resource with some required fields missing)
                throw new Pest_InvalidRecord($this->processError($meta['http_code'] . ' Invalid Record'));
                break;
            default:
                if($meta['http_code'] >= 400 && $meta['http_code'] <= 499)
                    throw new Pest_ClientError($this->processError($meta['http_code'] . ' Client Error'));
                elseif($meta['http_code'] >= 500 && $meta['http_code'] <= 599)
                    throw new Pest_ServerError($this->processError($meta['http_code'] . ' Server Error'));
                elseif(!$meta['http_code'] || $meta['http_code'] >= 600) {
                    throw new Pest_UnknownResponse($this->processError($meta['http_code'] . ' Unknown the Response is...'));
                }
        }
    }

}

class Pest_Exception extends Exception {
    
}

class Pest_UnknownResponse extends Pest_Exception {
    
}

/* 401-499 */

class Pest_ClientError extends Pest_Exception {
    
}

/* 400 */

class Pest_BadRequest extends Pest_ClientError {
    
}

/* 401 */

class Pest_Unauthorized extends Pest_ClientError {
    
}

/* 403 */

class Pest_Forbidden extends Pest_ClientError {
    
}

/* 404 */

class Pest_NotFound extends Pest_ClientError {
    
}

/* 405 */

class Pest_MethodNotAllowed extends Pest_ClientError {
    
}

/* 409 */

class Pest_Conflict extends Pest_ClientError {
    
}

/* 410 */

class Pest_Gone extends Pest_ClientError {
    
}

/* 422 */

class Pest_InvalidRecord extends Pest_ClientError {
    
}

/* 500-599 */

class Pest_ServerError extends Pest_Exception {
    
}

?>
