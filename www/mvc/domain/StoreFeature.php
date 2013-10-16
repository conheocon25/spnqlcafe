<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class StoreFeature extends Object{

    private $Id;
	private $IdFeature;
	private $IdStore;
	    	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $Id=null, $IdFeature=null, $IdStore=null){
        $this->Id 			= $Id;
		$this->IdFeature 	= $IdFeature;
		$this->IdStore 		= $IdStore;		
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
						
	function getIdFeature(){return $this->IdFeature;}	
    function setIdFeature( $IdFeature ) {$this->IdFeature = $IdFeature;$this->markDirty();}
	function getFeature( ) {
		$mFeature = new \MVC\Mapper\Feature();
		$Feature = $mFeature->find($this->IdFeature);
		return $Feature;
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
			'IdFeature' 	=> $this->getIdFeature(),
			'IdStore' 		=> $this->getIdStore()	
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 			= $Data[0];
		$this->IdFeature 	= $Data[1];
		$this->IdStore 		= $Data[2];
    }
			
	//=================================================================================
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}		
}
?>