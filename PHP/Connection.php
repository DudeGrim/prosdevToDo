<?php
class DBConnection
{
	private $servername;
	private	$dbuser;
	private	$password;
	private	$dbName;
	public $conn;

	function __construct()
	{
			$this->servername = "localhost";
			$this->dbuser = "root";
			$this->password = "";
			$this->dbName = "prosdevtodo";
			$this->conn = new mysqli($this->servername, $this->dbuser, $this->password, $this->dbName);
	}

	function getInstance()
	{
					/* Connect */
		if($this->conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}
		else return $this->conn;
	}
}
?>