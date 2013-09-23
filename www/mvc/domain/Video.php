<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class Video extends Object{

    private $Id;
	private $IdCategory;
	private $Name;
    private $Time;
    private $URL;
	private $Note;
	private $Count;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCategory=null, $Name=null, $Time=null, $URL=null, $Note=null, $Count=null, $Key=null) {
        $this->Id = $Id;
		$this->IdCategory = $IdCategory;
		$this->Name = $Name;
		$this->Time = $Time;
		$this->URL = $URL;
		$this->Note = $Note;
		$this->Count = $Count;
		$this->Key = $Key;
        parent::__construct( $Id );
    }
	function setId( $Id ){return $this->Id = $Id;}
    function getId( ) {return $this->Id;}
	
	function setIdCategory( $IdCategory ){return $this->IdCategory = $IdCategory;}
    function getIdCategory( ) {return $this->IdCategory;}
	
    function setName( $Name ){$this->Name = $Name;$this->markDirty();}
    function getName( ) {return $this->Name;}
	
	function setTime( $Time ) {$this->Time = $Time;$this->markDirty();}
    function getTime( ) {return $this->Time;}
	function getTimePrint( ) {$Time = \date("d/m/y", strtotime($this->getTime()));return $Time;}
	
	function setURL( $URL ) {$this->URL = $URL;$this->markDirty();}
    function getURL( ) {return $this->URL;}
	function parseURLYoutube() {		
		$arr = \parse_url($this->URL);
		if (!isset($arr['query']))
			return "";
		\parse_str($arr['query'], $Param);
		if (isset($Param['v']))
			return "http://www.youtube.com/embed/".$Param['v'];			
        return "";
    }
	
	function getIdURL( ){list($http, $sym, $addr1, $addr2, $addr3) = explode("/", $this->URL);return $addr3;}
	function getNote( ) {return $this->Note;}
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}
	function getURLImage(){
		return "http://img.youtube.com/vi/".$this->getIdURL()."/2.jpg";
	}
		
	function setCount( $Count ) {$this->Count = $Count;$this->markDirty();}
	function getCount( ) {return $this->Count;}
	function getCountPrint( ) {$N = new \MVC\Library\Number($this->Count);	return $N->formatCurrency();}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Name." ".$this->getId());
		$this->Key = $Str->converturl();
	}
	function getKey( ) {return $this->Key;}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------		
	function getURLView(){return "/library/video/".$this->getId();}
		
	function getURLUpdLoad(){	return "/setting/category/video/".$this->getIdCategory()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "/setting/category/video/".$this->getIdCategory()."/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){	return "/setting/category/video/".$this->getIdCategory()."/".$this->getId()."/del/load";}
	function getURLDelExe(){	return "/setting/category/video/".$this->getIdCategory()."/".$this->getId()."/del/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}

?>
