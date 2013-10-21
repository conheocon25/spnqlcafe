<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class StoreLocation extends Object{

    private $Id;
	private $IdDistrict;
	private $IdStore;
	private $X;
	private $Y;
    	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $Id=null, $IdDistrict=null, $IdStore=null, $X=null, $Y=null){
        $this->Id 			= $Id;
		$this->IdDistrict 	= $IdDistrict;
		$this->IdStore 		= $IdStore;
		$this->X 			= $X;
		$this->Y 			= $Y;
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
						
	function getIdDistrict(){return $this->IdDistrict;}	
    function setIdDistrict( $IdDistrict ) {$this->IdDistrict = $IdDistrict;$this->markDirty();}
	function getDistrict( ) {
		$mDistrict = new \MVC\Mapper\District();
		$District = $mDistrict->find($this->IdDistrict);
		return $District;
	}
	
	function getIdStore(){return $this->IdStore;}	
    function setIdStore( $IdStore ) {$this->IdStore = $IdStore;$this->markDirty();}
	function getStore( ) {
		$mStore = new \MVC\Mapper\Store();
		$Store = $mStore->find($this->getIdStore() );
		return $Store;
	}
	
	function getX(){return $this->X;}	
    function setX( $X ) {$this->X = $X;$this->markDirty();}
	
	function getY(){return $this->Y;}	
    function setY( $Y ) {$this->Y = $Y;$this->markDirty();}
			
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdDistrict' 	=> $this->getIdDistrict(),
			'IdStore' 		=> $this->getIdStore(),
			'X' 			=> $this->getX(),
			'Y' 			=> $this->getY()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 			= $Data[0];
		$this->IdDistrict 	= $Data[1];
		$this->IdStore 		= $Data[2];
		$this->X 			= $Data[3];
		$this->Y 			= $Data[4];
    }
	
	function getURLSettingLocation(){return "/setting/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getIdStore()."/location";}
	function getURLSettingLocationUpdate(){return "/setting/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getIdStore()."/location/update";}
	function getURLSettingAlbum(){return "/setting/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getIdStore()."/album";}
	function getURLSettingFeature(){return "/setting/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getIdStore()."/feature";}
	function getURLSettingPost(){return "/setting/province/".$this->getDistrict()->getIdProvince()."/".$this->getIdDistrict()."/".$this->getIdStore()."/post";}
	//=================================================================================
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}		
}
?>