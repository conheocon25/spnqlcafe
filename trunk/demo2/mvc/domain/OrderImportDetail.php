<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
use MVC\Library\Number;
use MVC\Library\Date;

class OrderImportDetail extends Object{

    private $id;
	private $idorder;
	private $idresource;
	private $count;
    private $price;
	
	private $Resource;
	private $Order;
	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $id=null, $idorder=null, $idresource=null, $count=null, $price=null) {
        $this->id = $id;
		$this->idorder = $idorder;
		$this->idresource = $idresource;
		$this->count = $count;
		$this->price = $price;
        parent::__construct( $id );
    }
    function getId( ) {
        return $this->id;
    }	

    function setIdOrder( $idorder ) {
        $this->idorder = $idorder;
        $this->markDirty();
    }
    function getIdOrder( ) {
        return $this->idorder;
    }
	function getOrder( ){
		if (!isset($this->Order)){
			$mOrder = new \MVC\Mapper\OrderImport();
			$this->Order = $mOrder->find($this->getIdOrder());
		}
        return $this->Order;
    }
	
	
	function setIdResource( $idresource ) {
        $this->idresource = $idresource;
        $this->markDirty();
    }
    function getIdResource( ) {
        return $this->idresource;
    }
	function getResource( ){
		if (!isset($this->Resource)){
			$mResource = new \MVC\Mapper\Resource();
			$this->Resource = $mResource->find($this->getIdResource());
		}
        return $this->Resource;
    }
		
	function getCount( ) {
        return $this->count;
    }
    function setCount( $count ) {
        $this->count = $count;
        $this->markDirty();
    }
	function getCountPrint( ) {
		if (!isset($this->count)){
			return 0;
		}
        return $this->count;
    }

	function getPrice( ) {
        return $this->price;
    }
	function setPrice( $price ) {
        $this->price = $price;
        $this->markDirty();
    }
	function getPricePrint( ) {
		$N = new \MVC\Library\Number($this->price);
        return $N->formatCurrency();
    }

	function getValue( ) {
        return $this->count*$this->price;
    }
	function getValuePrint( ) {
		$N = new \MVC\Library\Number($this->getValue());
        return $N->formatCurrency()." đ";
    }
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------	
	function getURLUpdLoad(){
		$Order = $this->getOrder();		
		return "/import/".$Order->getSupplier()->getId()."/".$this->getIdOrder()."/".$this->getIdResource()."/upd/load";
	}
	function getURLUpdExe(){
		return "/import/".$Order->getSupplier()->getId()."/".$this->getIdOrder()."/".$this->getIdResource()."/upd/exe";
	}
	
	//---------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $id );}
	
}

?>
