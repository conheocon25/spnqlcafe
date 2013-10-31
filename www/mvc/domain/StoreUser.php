<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class StoreUser extends Object{

    private $Id;
	private $IdUser;
	private $IdStore;
	    	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $Id=null, $IdUser=null, $IdStore=null){
        $this->Id 			= $Id;
		$this->IdUser 	= $IdUser;
		$this->IdStore 		= $IdStore;
	
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
						
	function getIdUser(){return $this->IdUser;}	
    function setIdUser( $IdUser ) {$this->IdUser = $IdUser;$this->markDirty();}
	function getUser( ) {
		$mUser 	= new \MVC\Mapper\User();
		$User 	= $mUser->find($this->IdUser);
		return $User;
	}
	
	function getIdStore(){return $this->IdStore;}	
    function setIdStore( $IdStore ) {$this->IdStore = $IdStore;$this->markDirty();}
	function getStore( ) {
		$mStore = new \MVC\Mapper\Store();
		$Store = $mStore->find($this->getIdStore() );
		return $Store;
	}
					
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdUser' 		=> $this->getIdUser(),
			'IdStore' 		=> $this->getIdStore()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 			= $Data[0];
		$this->IdUser 		= $Data[1];
		$this->IdStore 		= $Data[2];
    }

	//=================================================================================
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}		
}
?>