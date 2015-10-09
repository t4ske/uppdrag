<?php
include 'CSQLfile.php';

class CSQLfileMenu
{
	private $categoriesArray;
	private $params;

	private $CSQLfile;

	private $files;
	private $labels;

	private $content;
	private $navigation;


	public function __construct($params)
	{
		$this->params = $params;

		//subfolders i sql-folder are categories
		foreach(glob('sql/*', GLOB_ONLYDIR) as $dir) 
    		$this->categoriesArray[] = basename($dir);

    	if(isset($this->params['filename']) && isset($this->params['folder'])) 
    	{
    		$this->navigation = "<form method='post'><input type='submit' value='MAPPAR' class='breadcrumb'></form>";
			$this->navigation .= " > ";
			$this->navigation .= "<form method='post'><input type='submit' value='FILER' class='breadcrumb'>";
			$this->navigation .= "<input type='hidden' name='subcategory' value='".$this->params['folder']."'>";
			$this->navigation .= "</form>";
    		$this->navigation .= " >";
    		$this->navigation .= "<form method='post'><input type='submit' value='SQL' class='breadcrumb'>";
    		$this->navigation .= "<input type='hidden' name='filename' value='".$this->params['filename']."'>";
    		$this->navigation .= "<input type='hidden' name='folder' value='".$this->params['folder']."'>";
    		$this->navigation .= "</form>";

    		$path = "./sql/".$this->params['folder']."/".$this->params['filename'].".sql";

    		//if file exists - load, run and display
    		if(is_file($path))
    		{
    			$comandfile = new CSQLfile($path);

    			$this->content = "<div class='query'>";
    			$this->content .= "<div>".$comandfile->getDescription()."</div>"; 
    			$this->content .= "<div><h2>Exempel:</h2>".$comandfile->getSQL()."</div>"; 
    			$this->content .= "<div><h2>Resultat:</h2>".$comandfile->getResult()."</div>"; 
    			$this->content .= "</div>";
    		}	
    	}
		else if(isset($this->params['subcategory']) && in_array($this->params['subcategory'],$this->categoriesArray))
		{	
			$this->navigation = "<form method='post'><input type='submit' value='MAPPAR' class='breadcrumb'></form>";
			$this->navigation .= " > ";
			$this->navigation .= "<form method='post'><input type='submit' value='FILER' class='breadcrumb'><input type='hidden' name='subcategory' value='".$this->params['subcategory']."'></form>";

			$this->content = $this->getSubMenu($this->params['subcategory']);
		}
		else
		{
			$this->navigation = "<form method='post'><input type='submit' value='MAPPAR' class='breadcrumb'></form>";

			$this->content = $this->getMainMenu();
		}

	}

	public function getContent()
	{
		return $this->content;
	}
	
	public function getNavigation()
	{
		return $this->navigation;
	}


	public function getMainMenu()
	{ 
		$html="<form method='post'>";
		foreach ($this->categoriesArray as $category) 
			$html .= "<input type='submit' name='subcategory' class='button' value='".htmlentities($category)."'>";
		$html .= "</form>";

		return $html;
	}


	public function getSubMenu($subfolder)
	{

		$html="<form method='post'>";
		$html.="<input type='hidden' name='folder' value='".$subfolder."'>";
		foreach(glob("sql/$subfolder/*") as $file)
			$html .= "<input type='submit' name='filename' class='button' value='".htmlentities(basename($file,'.sql'))."'>";
		$html .= "</form>";

		return $html;
	}


	
}