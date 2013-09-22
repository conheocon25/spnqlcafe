<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class News extends Object{

    private $Id;
	private $IdCategory;
	private $Author;
	private $Date;
	private $Content;
	private $Title;
	private $Type;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCategory=null , $Author=Null, $Date=Null, $Content=null, $Title=null, $Type=null, $Key=null){
        $this->Id = $Id;
		$this->IdCategory = $IdCategory;
		$this->Author = $Author;
		$this->Date = $Date;
		$this->Content = $Content;
		$this->Title = $Title;
		$this->Type = $Type;
		$this->Key = $Key;
		
        parent::__construct( $Id );
    }
    function getId() {return $this->Id;}	
	function getIdPrint(){return "n" . $this->getId();}	
	
    function setIdCategory( $IdCategory ) {$this->IdCategory = $IdCategory;$this->markDirty();}   
	function getIdCategory( ) {return $this->IdCategory;}
	function getCategory(){$mCategory = new \MVC\Mapper\CategoryNews();$Category = $mCategory->find($this->getIdCategory());return $Category;}
	
	function setAuthor( $Author ){$this->Author = $Author;$this->markDirty();}   
	function getAuthor( ) {return $this->Author;}
	
	function setDate( $Date ){$this->Date = $Date;$this->markDirty();}   
	function getDate( ) {return $this->Date;}
	function getDatePrint( ){$D = new \MVC\Library\Date($this->Date);return $D->getDateFormat();}
	
	function setContent( $Content ){$this->Content = $Content;$this->markDirty();}   
	function getContent( ) {return $this->Content;}
	
	function setTitle( $Title ){$this->Title = $Title;$this->markDirty();}   
	function getTitle( ) {return $this->Title;}	
	function getTitleReduce(){$S = new \MVC\Library\String($this->Title);return $S->reduce(45);}
	
	function setType( $Type ){$this->Type = $Type;$this->markDirty();}   
	function getType( ) {return $this->Type;}
	function isVIP(){if ($this->Type == 1)return true;return false;}
	
	function getImage(){		
		$first_img = '';
		\ob_start();
		\ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->Content, $matches)){
			$first_img = $matches[1][0];
		}
		else {
			$first_img = "/data/images/news.jpg";
		}
		return $first_img;
	}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Title." ".$this->getId());
		$this->Key = $Str->converturl();
	}
	
	
	function getContentReduce(){$S = new \MVC\Library\String($this->Content);return $S->reduceHTML(320);}
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/tin-tuc/".$this->getCategory()->getKey()."/".$this->getKey();}
	function getURLUpdLoad(){return "/app/news/".$this->getIdCategory()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/app/news/".$this->getIdCategory()."/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/app/news/".$this->getIdCategory()."/".$this->getId()."/del/load";}	
	function getURLDelExe(){return "/app/news/".$this->getIdCategory()."/".$this->getId()."/del/exe";}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>