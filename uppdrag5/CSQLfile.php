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



	public function __construct($filename)
	{
		//store filename
		$this->filename = $filename;


		/* Make all of the below into small private functions */

		//read file
		$this->filerows = file($filename, FILE_IGNORE_NEW_LINES);


		//find delimiters
		$this->divider1=array_search("--******--",$this->filerows);
		$this->divider2=array_search("--??????--",$this->filerows);
		$this->nrOfRows = count($this->filerows);


		//fetch description part of file
		for ($i=0; $i<$this->divider1; $i++) 
		{ 
			 $this->description .= $this->filerows[$i];
		}

		//fetch sql-expression part of file
		for ($i= $this->divider1+1; $i <$this->divider2 ; $i++) 
		{ 
			$this->sqlExpression .= $this->filerows[$i];
			$this->sqlExpressionRows=htmlspecialchars($this->filerows[$i]).'<br>';
		}

		//fetch sql-result-query part of file
		for ($i= $this->divider2+1; $i <$this->nrOfRows ; $i++) 
		{ 
			$this->sqlResultQuery .= $this->filerows[$i];
		}

		/* Make all of the above into small private functions */


		//create databaseconnection
		$db = new CDatabase();


	}

	public function getDescription() { return $this->description;}
	public function getSQL() { return $this->sqlExpression;}
	public function getSQLrows() { return $this->sqlExpressionRows;}
	public function getResultQuery() { return $this->sqlResultQuery;}


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