<?php
require_once 'CDatabase.php';

class CSQLfile
{
	private $filename = '';
	private $db = null;

	private $filerows;
	private $dvider1;
	private $divider2;
	private $nrOfRows;

	private $description = '';
	private $sqlExpression;
	private $sqlExpressionRows;
	private $sqlResultQuery;

	private $sqlResultQueryReply;



	public function __construct($filename)
	{
		//store filename
		$this->filename = $filename;

		//read file parts into members
		$this->readFileParts($this->filename);

		//create database connection
		$this->db = new CDatabase(); 

		//execute statement(s)
		$this->executeStatements();
	}

	private function executeStatements()
	{
		//run sql-command
		$stm = $this->db->prepare($this->sqlExpression);
		$stm->execute();
		

		//run result query
		$stm = $this->db->prepare($this->sqlResultQuery);
		$stm->execute(); 
		$this->sqlResultQueryReply = $this->generateHTMLtableResult($stm);
		
	}

	private function readFileParts($filename)
	{
		//read file
		$this->filerows = file($filename, FILE_IGNORE_NEW_LINES);


		//find delimiters
		$this->divider1=array_search("--******--",$this->filerows);
		$this->divider2=array_search("--??????--",$this->filerows);
		$this->nrOfRows = count($this->filerows);

		if(!$this->divider2)
			$this->divider2=$this->nrOfRows;


		//fetch description part of file
		for ($i=0; $i<$this->divider1; $i++) 
		{ 
			 $this->description .= $this->filerows[$i];
		}

		//fetch sql-expression part of file
		for ($i= $this->divider1+1; $i<$this->divider2 ; $i++) 
		{ 
			$this->sqlExpression .= $this->filerows[$i];
			$this->sqlExpressionRows .=htmlspecialchars($this->filerows[$i]).'<br>';
		}

		//fetch sql-result-query part of file (if any)
		if($this->divider2<$this->nrOfRows)
			for ($i= $this->divider2+1; $i <$this->nrOfRows ; $i++) 
				$this->sqlResultQuery .= $this->filerows[$i];
		else
			$this->sqlResultQuery = $this->sqlExpression; //if none -set the resultquerya to exactly the same as the sqlExpression
		

	}

	public function getDescription() { return $this->description;}
	public function getSQL() { return $this->sqlExpressionRows;}
	public function getResult() { return $this->sqlResultQueryReply;}


	private function generateHTMLtableResult($stmObj)
	{
		 $html = "<table border='1' cellpadding='5'><tr>";

		 //skapar de två första raderna i tabellen rad1= rubriker rad2=data
		 $row = $stmObj->fetch(PDO::FETCH_ASSOC);
		 $rad1="";
		 $rad2="";
		 foreach ($row as $key => $value) 
		 {
		    $rad1 .= "<th>$key</th>";
		    $rad2 .= "<td>$value</td>";
		 }
		 $html .= $rad1 ."<tr>". $rad2 . "</tr>";

		 //fyller på med resten av raderna (om sådana finns)
		 while($row = $stmObj->fetch(PDO::FETCH_ASSOC))
		 {
		    $radx='';
		    $html .= "<tr>";
		    foreach ($row as $key => $value) 
		    	$radx .= "<td>$value</td>";
		    $html .= $radx. "</tr>";
		 }

		$html .= "</table>";
		return $html;
	}

	

}