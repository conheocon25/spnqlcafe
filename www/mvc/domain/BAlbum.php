<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class BAlbum extends Object{

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

	function setIdCustomer( $IdCustomer ) {$this->IdCustomer = $IdCustomer;$this->markDirty();}
	function getIdCustomer( ) {return $this->IdCustomer;}
	
	function getCustomer( ){
		$mCustomer = new \MVC\Mapper\Customer();
		$Customer = $mCustomer->find($this->IdCustomer);
		return $Customer;
	}
	
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
	function getAlbumAll(){
		$mBImage = new \MVC\Mapper\BImage();
		$ImageAll = $mBImage->findByCategory(array($this->getId()));
		return $ImageAll;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLView(){		return "blog/".$this->getCustomer()->getKey()."/setting/album/".$this->getId();}
	
	function getURLUpdLoad(){	return "blog/".$this->getCustomer()->getKey()."/setting/album/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "blog/".$this->getCustomer()->getKey()."/setting/album/".$this->getId()."/upd/exe";}
			
	function getURLDelLoad(){	return "blog/".$this->getCustomer()->getKey()."/setting/album/".$this->getId()."/del/load";}
	function getURLDelExe(){	return "blog/".$this->getCustomer()->getKey()."/setting/album/".$this->getId()."/del/exe";}
		
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>