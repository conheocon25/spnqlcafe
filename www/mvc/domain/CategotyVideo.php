<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryVideo extends Object{

    private $Id;
	private $Name;
	private $Order;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null , $Order=Null, $Key=Null) {$this->Id = $Id;$this->Name = $Name;$this->Order = $Order;$this->Key = $Key;parent::__construct( $Id );}
    function getId() {return $this->Id;}	
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}   
	function getName( ) {return $this->Name;}
	
	function setOrder( $Order ) {$this->Order = $Order;$this->markDirty();}   
	function getOrder( ) {return $this->Order;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}   
	function getKey( ) {return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getVideoAll(){
		$mVideo = new \MVC\Mapper\Video();
		$VideoAll = $mVideo->findByCategory(array($this->getId()));
		return $VideoAll;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/video/".$this->getId();}
			
	function getURLUpdLoad(){	return "/setting/category/video/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "/setting/category/video/".$this->getId()."/upd/exe";}
			
	function getURLDelLoad(){	return "/setting/category/video/".$this->getId()."/del/load";}
	function getURLDelExe(){	return "/setting/category/video/".$this->getId()."/del/exe";}
	
	function getURLView(){		return "/setting/category/video/".$this->getId();}
	function getURLVideoInsLoad(){		return "/setting/category/video/".$this->getId()."/ins/load";}
	function getURLVideoInsExe(){		return "/setting/category/video/".$this->getId()."/ins/exe";}
	
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>