<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Store extends Object{

    private $Id;
	private $Name;
	private $Email;
	private $Phone;
    private $Type;        
    private $Address;
	private $IdPicasaAlbum;
	private $Key;
	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $Id=null, $Name=null, $Email=null, $Phone=null, $Type=null, $Address=null, $IdPicasaAlbum=null, $Key=null ){
        $this->Id 				= $Id;
		$this->Name 			= $Name;
		$this->Email 			= $Email;
		$this->Phone 			= $Phone;
		$this->Type 			= $Type;
		$this->Address 			= $Address;
		$this->IdPicasaAlbum 	= $IdPicasaAlbum;
		$this->Key 				= $Key;
		
        parent::__construct( $Id );
    }
	function setId( $Id) {$this->Id = $Id;}
    function getId( ) {return $this->Id;}
						
	function getName(){return $this->Name;}	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}
	
	function getEmail(){return $this->Email;}	
    function setEmail( $Email ) {$this->Email = $Email;$this->markDirty();}
	
	function getPhone(){return $this->Phone;}	
    function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}
	
	function getType(){return $this->Type;}	
    function setType( $Type ) {$this->Type = $Type;$this->markDirty();}
			
    function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}
	function getAddress(){return $this->Address;}
	
	function setIdPicasaAlbum( $IdPicasaAlbum ) {$this->IdPicasaAlbum = $IdPicasaAlbum;$this->markDirty();}
	function getIdPicasaAlbum(){return $this->IdPicasaAlbum;}
	
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}
	function getKey(){return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl()."-".$this->getId();
	}
	function getAlbumAll(){
		$mAlbum = new \MVC\Mapper\Album();
		$AlbumAll = $mAlbum->findBy(array($this->getId()));
		return $AlbumAll;
	}
	
	function getFeatureAll(){
		$mStoreFeature = new \MVC\Mapper\StoreFeature();
		$FeatureAll = $mStoreFeature->findBy(array($this->getId()));
		return $FeatureAll;
	}
	
	function getPostAll(){
		$mPost = new \MVC\Mapper\Post();
		$PostAll = $mPost->findBy(array($this->getId()));
		return $PostAll;
	}
	
	function checkFeature($IdFeature){
		$mStoreFeature = new \MVC\Mapper\StoreFeature();
		$SFeature = $mStoreFeature->check(array($this->getId(), $IdFeature));		
		return $SFeature->count();
	}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'Name' 			=> $this->getName(),
			'Email' 		=> $this->getEmail(),
			'Phone' 		=> $this->getPhone(),
			'Type' 			=> $this->getType(),			
			'Address' 		=> $this->getAddress(),
			'IdPicasaAlbum'	=> $this->getIdPicasaAlbum(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 				= $Data[0];
		$this->Name 			= $Data[1];		
		$this->Email 			= $Data[2];
		$this->Phone 			= $Data[3];
		$this->Type 			= $Data[4];
		$this->Address 			= $Data[5];
		$this->IdPicasaAlbum 	= $Data[6];
		$this->reKey();
    }
	function getURLView(){ return "/quan/".$this->getKey();}
	
	//=================================================================================						
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
	
}
?>