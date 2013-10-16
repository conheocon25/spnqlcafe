<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Feature extends Object{

    private $Id;
	private $Name;
	private $Icon;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Icon=Null , $Key=Null) {$this->Id = $Id;$this->Name = $Name; $this->Icon = $Icon; $this->Key = $Key;parent::__construct( $Id );}
    function getId() {return $this->Id;}
		
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}
	function getName( ){return $this->Name;}
	
	function setIcon( $Icon ) {$this->Icon = $Icon;$this->markDirty();}
	function getIcon( ){return $this->Icon;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name' 			=> $this->getName(),
			'Icon' 			=> $this->getIcon(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){
		$this->Id 		= $Data[0];
		$this->Name 	= $Data[1];
		$this->Icon 	= $Data[2];
		$this->reKey();
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
		
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
		
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>