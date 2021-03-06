<?php

class Record {
	protected $_attributes = array();

	public function __construct($attributes = array()){
		$this->_attributes = $attributes;
	}
	
	public function __call($method, $args) {
		if (preg_match('/^get(.*)$/', $method, $matches)){
			$var = strtolower($matches[1]);
			return isset($this->_attributes[$var])?$this->_attributes[$var]:null;
		}
		if (preg_match('/^set(.*)$/', $method, $matches)){
			$var = strtolower($matches[1]);
			$this->_attributes[$var] = $args;
			return;
		}
		throw new Exception('Call to undefined method Record::'.$method.'()');
	}
	public function __get($var) {
		return isset($this->_attributes[$var])?$this->_attributes[$var]:null;
	}
	public function __set($var, $value) { // pas utile
		$this->_attributes[$var] = $value;
	}

	public function saveRecord($entries = array()) {
		$this->_attributes = array_merge($this->_attributes, $entries);
		//$db = BDD::CreateDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if ($this->__get("id")){
			//update
			$sets = array();
			foreach($this->_attributes as $key=>$value){
				array_push($sets, "$key = :$key");
			}
			$request = $db->prepare("Update record SET ".implode($sets,', ')." WHERE id = :id");
			$request->execute($this->_attributes);

		}else{
			//create
			$request = $db->prepare("INSERT INTO record (title, description) VALUES (:title, :description)");
			$request->execute($this->_attributes);
		}
	}

	public function editRecord($entries = array()) {
		$this->_attributes = array_merge($this->_attributes, $entries);
		$sets = array();
		foreach($this->_attributes as $key=>$value){
			array_push($sets, "$key = :$key");
		}
		//$db = BDD::createDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $db->prepare("Update record SET ".implode($sets,', ')." WHERE id = :id");
		$request->execute($this->_attributes);
	}

	public function getRecord($id){
		$id = $id;
		//$db = BDD::createDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $db->prepare('SELECT * FROM record WHERE id= :id');
		$request->execute(array("id"=>$id));
		$results = $request->fetch(PDO::FETCH_ASSOC);
		$this->_attributes = array_merge($this->_attributes, $results);
		return $this;

	}

	public function deleteRecord(){
		$id = $this->__get("id");
		//$db = BDD::CreateDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $db->prepare('DELETE FROM record WHERE id= :id');
		$request->execute(array("id"=>$id));
	}

	public static function getRecords(){
		//$db = BDD::createDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $db->prepare("SELECT * FROM record");
		$request->execute();
		$list = $request->fetchAll();

		$objects = array();
		foreach ($list as $value){
			array_push($objects, new Record($value));
		}
		return $objects;
	}

}

?>