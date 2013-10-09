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
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdCustomer'	=> $this->getIdCustomer(),
			'Name'			=> $this->getName(),
			'Order'			=> $this->getOrder(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id			= $Data[0];;
		$this->IdCustomer	= $Data[1];;
		$this->Name			= $Data[2];;
		$this->Order		= $Data[3];;
		$this->Key			= $Data[4];;
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getImageAll(){
		$mBImage = new \MVC\Mapper\BImage();
		$ImageAll = $mBImage->findBy(array($this->getId()));
		return $ImageAll;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLImage(){	return "/".$this->getCustomer()->getKey()."/setting/album/".$this->getId();}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>