<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class CategoryNews extends Object{

    private $Id;
	private $IdCustomer;
	private $Name;
	private $Order;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdCustomer=null, $Name=null , $Order=Null, $Key=Null) {$this->Id = $Id; $this->IdCustomer = $IdCustomer; $this->Name = $Name;$this->Order = $Order;$this->Key = $Key;parent::__construct( $Id );}
    function getId() {return $this->Id;}
	
	function setIdCustomer( $IdCustomer ) {$this->IdCustomer = $IdCustomer; $this->markDirty();}
	function getIdCustomer( ) {return $this->IdCustomer;}
	
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
	function getNews(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->findBy(array($this->getId()));
		return $News;
	}
	
	function getNewsLimit(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->findByLimit(array($this->getId()));
		return $News;
	}
	
	function getNewsLimit1(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->findByLimit1(array($this->getId()));
		return $News;
	}
	
	function getNewsLimit2(){
		$mNews = new \MVC\Mapper\News();
		$News = $mNews->findByLimit2(array($this->getId()));
		return $News;
	}
	
	function getProfileAll(){
		$mProfile = new \MVC\Mapper\ProfileNews();
		$ProfileAll = $mProfile->findBy(array($this->getId()));
		return $ProfileAll;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLRead(){return "/tin-tuc/".$this->getkey();}
		
	function getURLNewsAutoLoad(){		return "/setting/category/news/".$this->getId()."/auto/load";}
	function getURLNewsAutoExe(){		return "/setting/category/news/".$this->getId()."/auto/exe";}
	
	function getURLUpdLoad(){			return "/setting/category/news/".$this->getId()."/upd/load";}
	function getURLUpdExe(){			return "/setting/category/news/".$this->getId()."/upd/exe";}
	
	function getURLProfile(){			return "/setting/category/news/".$this->getId()."/profile";}
	function getURLProfileInsLoad(){	return "/setting/category/news/".$this->getId()."/profile/ins/load";}
	function getURLProfileInsExe(){		return "/setting/category/news/".$this->getId()."/profile/ins/exe";}
	
	function getURLDelLoad(){return "/setting/category/news/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/setting/category/news/".$this->getId()."/del/exe";}
	
	function getURLNews(){return "/setting/news/".$this->getId();}
	function getURLNewsInsLoad(){return "/app/news/".$this->getId()."/ins/load";}
	function getURLNewsInsExe(){return "/app/news/".$this->getId()."/ins/exe";}
	
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>