<?php

class BDD {
	public static function createDB() {
		$db = new PDO('mysql:host=localhost;dbname=gladys', "root", "");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $db;
	}	
}

