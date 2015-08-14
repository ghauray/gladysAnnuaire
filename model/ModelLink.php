<?php

class Link {
	protected $_attributes = array();

	public function __construct($attributes = array()){
		$this->_attributes = $attributes;
	}

	public static function getCategoryRecords() {
		//$db = BDD::CreateDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $db->prepare("SELECT * FROM category_record");
		$request->execute();
		$list = $request->fetchAll();

		$objects = array();
		foreach ($list as $value){
			array_push($objects, new CategoryRecord($value));
		}
		return $objects;
	}
	
	public function __get($var) {
		return isset($this->_attributes[$var])?$this->_attributes[$var]:null;
	}
	public function __set($var, $value) { // pas utile
		$this->_attributes[$var] = $value;
	}

	public static function getLinks() {
		//$db = BDD::createDB();
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$request = $db->prepare("SELECT * FROM category_record");
		$request->execute();
		$list = $request->fetchAll();

		$objects = array();
		foreach ($list as $value){
			$link = new Link($value);
			$link->__set("category",$link->getLinkedCategory());
			$link->__get("record",$link->getLinkedRecord());
			array_push($objects, $link);

		}
		return $objects;
	}

	public function getLinkedCategory() {
		$category = new Category();
		$category->getCategory($this->_attributes["id_category"]);
		return $category;
	}

	public function getLinkedRecord() {
		$record = new Record();
		$record->getRecord($this->__get("id_record"));
		return $record;
	}

	/*public function saveRecord($entries = array()) {
		$this->_attributes = array_merge($this->_attributes, $entries);
		$db = BDD::CreateDB();
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
		$db = BDD::createDB();
		$request = $db->prepare("Update record SET ".implode($sets,', ')." WHERE id = :id");
		$request->execute($this->_attributes);
	}

	public function getRecord($id){
		$id = $id;
		$db = BDD::createDB();
		$request = $db->prepare('SELECT * FROM record WHERE id= :id');
		$request->execute(array("id"=>$id));
		$results = $request->fetch(PDO::FETCH_ASSOC);
		$this->_attributes = array_merge($this->_attributes, $results);
		return $this;

	}

	public function deleteRecord(){
		$id = $this->__get("id");
		$db = BDD::CreateDB();
		$request = $db->prepare('DELETE FROM record WHERE id= :id');
		$request->execute(array("id"=>$id));
	}

	public static function getRecords(){
		$db = BDD::createDB();
		$request = $db->prepare("SELECT * FROM record");
		$request->execute();
		$list = $request->fetchAll();

		$objects = array();
		foreach ($list as $value){
			array_push($objects, new Record($value));
		}
		return $objects;
	}*/

}

?>