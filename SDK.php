<?php

/**
 * General SDK definition
 * SDK's Master class
 * All the REST methods are defined in this class
 * The other classes are just subclasses of this one
 *
 * @author Francis Genet & Peter Defebvre
 * @version 1.0
 * @since July 14, 2011 - 1.0
 * 
 */

require_once 'Pest.php';
require_once 'config.php';

class SDK {

	/**
	 * Server url to join the API
	 * Don't forget to put the account_id at the end and a "/"
     * 
     * Put the url to your server here with the account id
     * EX : http://blabla.2600hz.com/accounts/43563787366353663563/
	 * 
	 * @var string $URL
	 */
	protected $URL = '';
	
	/**
	 * First definition of the URI
	 * ex: devices/cdr/callflows...
	 * 
	 * @var string $URI 
	 */
	protected $URI = null;
	
	/**
	 * First definition of the sample array which gonna represent the JSON objects
	 * 
	 * @var array $SAMPLE
	 */
	protected $SAMPLE = array ();
	
	/**
	 * The general PEST object
	 * 
	 * @var object $PEST
	 */
	protected $PEST = null;

	/**
	 * Class constructor
	 * PEST initialization
	 */
	public function SDK() {
		$this->PEST = new Pest($this->URL);
	}

	/**
	 * Getting all the entries
	 * 
	 * @return array  
	 */
	public function getAll() {
		$result = json_decode($this->PEST->get($this->URL.$this->URI), TRUE);

		return $result;
	}

	/**
	 * Getting ONE particular entry
	 * 
	 * @param int $id
	 * @return array 
	 */
	public function get($id) {
		$result = json_decode($this->PEST->get($this->URL.$this->URI.'/'.$id), TRUE);

		return $result;
	}

	/**
	 * Adding one object
	 * 
	 * @param array $data This is the object that you want to add
	 * @return type 
	 */
	public function add($data) {

		$json['data'] = $data;
		try {
			$this->check($data, $this->SAMPLE);
			$result = json_decode($this->PEST->put($this->URI, json_encode($json)), TRUE);
			return $result;
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 * Updating an object
	 * /!\ you MUST fill all the element in the $data array
	 * 
	 * @param int $id
	 * @param array $data This is the object that you want to update
	 * @return mixed 
	 */
	public function update($id, $data) {
		$json['data'] = $data;
		try {
			$this->check($data, $this->SAMPLE);
			$result = json_decode($this->PEST->post($this->URI.'/'.$id, json_encode($json)), TRUE);
			return $result;
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 * Deleting an entry
	 * 
	 * @param int $id
	 * @return mixed 
	 */
	public function delete($id) {
		$result = json_decode($this->PEST->delete($this->URL.$this->URI.'/'.$id), TRUE);

		return $result;
	}

	/**
	 * Check if the both of the sample and the data array are similar
	 * 
	 * @param array $sample The sample which is provide in the subclass 
	 * @param array $data The array that you provide
	 * @return bool 
	 */
	private function check($sample, $data) {

		if(count($sample) == count($data)) {
			foreach($data as $key => $value) {
				if(array_key_exists($key, $sample)) {
					if(is_array($value)) {
						$this->check($sample[$key], $value);
					}
				}else{
					throw new Exception('Error at '.$key);
				}
			}
		}else{
			throw new Exception('Count data diff');
		}

		return true;
	}

}

?>