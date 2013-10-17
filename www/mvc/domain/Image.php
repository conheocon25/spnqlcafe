<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Image extends Object{

    private $Id;
	private $IdAlbum;
	private $Name;
    private $Time;
	private $URL;
	private $Note;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdAlbum=null, $Name=null, $Time=null, $URL=null, $Note=null, $Key=null){$this->Id = $Id; $this->IdAlbum = $IdAlbum; $this->Name = $Name;$this->Time = $Time;$this->URL = $URL;$this->Note = $Note; $this->Key = $Key; parent::__construct( $Id );}
    function setId( $Id ) {return $this->Id = $Id;}
	function getId( ) {return $this->Id;}
	
	function setIdAlbum( $IdAlbum ){$this->IdAlbum = $IdAlbum;$this->markDirty();}
    function getIdAlbum( ) {return $this->IdAlbum;}
	function getAlbum( ) {	
		$mAlbum = new \MVC\Mapper\Album();
		$Album = $mAlbum->find($this->IdAlbum);
		return $Album;
	}
	
    function setName( $Name ){$this->Name = $Name;$this->markDirty();}
    function getName( ) {return $this->Name;}
	
	function setTime( $Time ) {$this->Time = $Time;$this->markDirty();}
    function getTime( ) {return $this->Time;}
	
	function setURL( $URL ) {$this->URL = $URL;$this->markDirty();}
    function getURL( ) {return $this->URL;}
	
	function getTimePrint( ) {$num = new \MVC\Library\Date($this->Time);return $num->getDateTimeFormat();}
	function getNote( ) {return $this->Note;}
	function setNote( $Note ) {$this->Note = $Note;$this->markDirty();}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	function toJSON(){		
		$json = array(
			'Id' 			=> $this->getId(),
			'IdAlbum' 		=> $this->getIdAlbum(),
			'Name' 			=> $this->getName(),
			'Time' 			=> $this->getTime(),
			'URL' 			=> $this->getURL(),
			'Note' 			=> $this->getNote(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 		= $Data[0];
		$this->IdAlbum 	= $Data[1];
		$this->Name 	= $Data[2];		
		$this->URL 		= $Data[3];
		$this->Note 	= $Data[4];
		$this->Time 	= date('Y-m-d H:i:s');
		$this->reKey();
    }
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLMove2Picasa(){
		return "/setting/album/".$this->getIdAlbum()."/".$this->getId()."/picasa";
	}
	
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>