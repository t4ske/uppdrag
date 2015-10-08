<?php 

class CDatabase
{
	private $dsn      	= 'mysql:host=localhost;';
	private $username   = '';
	private $password 	= '';
	private $options  	= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'");
	private $PDO        = null;

	public function __construct($dbname="",$user="root",$pass="")
	{
		if(count($dbname)>0)
			$this->dsn .= "dbname=" . $dbname .";";

		$this->username = $user;
		$this->password = $pass;

		$this->PDO = new PDO($this->dsn, $this->username, $this->password, $this->options);

		return $this->PDO;
	}

	public function prepare($sql)
	{
		return $this->PDO->prepare($sql);
	}
	



}