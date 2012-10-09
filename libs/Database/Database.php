<?php

class Database {
	private static $link = null;
	
	private $this->pdo = null;
	private $this->dbuser = '';
	private $this->dbpassword = '';
	private $this->dbname = '';
	private $this->dbhost = '';
	
	function __construct($dbuser, $dbpassword, $dbname, $dbhost) {
		$this->dbuser = $dbuser;
		$this->dbpassword = $dbpassword;
		$this->dbname = $dbname;
		$this->dbhost = $dbhost;
		
		$this->connect();
	}

	private static function getLink() {
		if (self::$link) {
			return self::$link;
		}
		
		self::$link = $this->connect();
		
		return self::$link;
	}
	
	public static function __callStatic($name, $args) {
		$callback = array(self::getLink(), $name);
		
		return call_user_func_array($callback , $args);
	}
	
	private function connect() {
		return new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpassword, array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
		));
	}
}

?>