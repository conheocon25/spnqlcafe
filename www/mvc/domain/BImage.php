<?php
namespace MVC\Domain;
use MVC\Library\Number;
require_once( "mvc/base/domain/DomainObject.php" );

class BImage extends Object{

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
    function getId( ) {return $this->Id;}
	
	function setIdAlbum( $IdAlbum ){$this->IdAlbum = $IdAlbum;$this->markDirty();}
    function getIdAlbum( ) {return $this->IdAlbum;}
	function getAlbum( ) {	
		$mAlbum = new \MVC\Mapper\BAlbum();
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
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLUpdLoad(){	return "blog/".$this->getAlbum()->getCustomer()->getKey()."/setting/album/".$this->getIdAlbum()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "blog/".$this->getAlbum()->getCustomer()->getKey()."/setting/album/".$this->getIdAlbum()."/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){	return "blog/".$this->getAlbum()->getCustomer()->getKey()."/setting/album/".$this->getIdAlbum()."/".$this->getId()."/del/load";}
	function getURLDelExe(){	return "blog/".$this->getAlbum()->getCustomer()->getKey()."/setting/album/".$this->getIdAlbum()."/".$this->getId()."/del/exe";}
			
	//-------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>