<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Album extends Object{

    private $Id;
	private $IdStore;
	private $Name;
	private $Order;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdStore=null, $Name=null , $Order=Null, $Key=Null) {$this->Id = $Id; $this->IdStore = $IdStore; $this->Name = $Name;$this->Order = $Order;$this->Key = $Key;parent::__construct( $Id );}
	function setId($Id) {return $this->Id = $Id;}
    function getId() {return $this->Id;}
		
	function setIdStore($IdStore) {return $this->IdStore = $IdStore;}
    function getIdStore() {return $this->IdStore;}
	function getStore(){
		$mStore = new \MVC\Mapper\Store();
		$Store = $mStore->find($this->getIdStore());
		return $Store;
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
			'IdStore' 		=> $this->getIdStore(),
			'Name' 			=> $this->getName(),			
			'Order' 		=> $this->getOrder(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 		= $Data[0];
		$this->IdStore 	= $Data[1];
		$this->Name 	= $Data[2];
		$this->Order 	= $Data[3];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getImageAll(){
		$mImage = new \MVC\Mapper\Image();
		$ImageAll = $mImage->findBy(array($this->getId()));
		return $ImageAll;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLImage(){			
		return "/setting/album/".$this->getId();
	}

	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>