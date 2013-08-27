<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Supplier extends Object{

    private $id;
	private $name;
	private $phone;
    private $address;
	private $note;
	private $debt;
	
	private $paids;
	private $OrderTrackings;
	private $PaidTrackings;
			
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( 
		$id=null, 
		$name=null, 
		$phone=null, 
		$address=null, 
		$note=null,
		$debt=null
	){
        $this->id = $id;
		$this->name = $name;
		$this->phone = $phone;
		$this->address = $address;
		$this->note = $note;
		$this->debt = $debt;
		
        parent::__construct( $id );
    }
    function getId( ) {
        return $this->id;
    }	
	function getIdPrint( ) {
        return "s".$this->id;
    }	
	
    function setName( $name ) {
        $this->name = $name;
        $this->markDirty();
    }
    function getName( ) {
        return $this->name;
    }
	function getPhone( ) {
        return $this->phone;
    }
    function setPhone( $phone ) {
        $this->phone = $phone;
        $this->markDirty();
    }
	function setAddress( $address ) {
        $this->address = $address;
        $this->markDirty();
    }
    function getAddress( ) {
        return $this->address;
    }
	
	function setNote( $Note ) {
        $this->note = $Note;
        $this->markDirty();
    }
	function getNote( ) {
        return $this->note;
    }
	
	function setDebt( $Debt ) {
        $this->debt = $Debt;
        $this->markDirty();
    }
	function getDebt( ){
        return $this->debt;
    }
	
	//--------------------------------------------------------	
	//TÍNH CÔNG NỢ
	//--------------------------------------------------------	
	function getOldDebt( ){
		$Session = \MVC\Base\SessionRegistry::instance();
		$DateStart = $Session->getReportSupplierDateStart();
							
		$mOrder = new \MVC\Mapper\OrderImport();
		$mSPaid = new \MVC\Mapper\PaidSupplier();
		
		$NDate = new \MVC\Library\Date();
		$arr = $NDate->rangeOldDebt($DateStart);
				
		//(1) Nhập hàng trước đó
		$Orders = $mOrder->findByTracking1( array($this->getId(), $arr[0], $arr[1]) );
		$SOrders = 0;
		while($Orders->valid()){
			$SOrders += $Orders->current()->getValue();
			$Orders->next();
		}
				
		//(2) Trả tiền
		$Paids = $mSPaid->findByTracking1( array($this->getId(), $arr[0], $arr[1]) );
		$SPaids = 0;
		while($Paids->valid()){
			$SPaids += $Paids->current()->getValue();
			$Paids->next();
		}
				
		return $this->getDebt() + $SOrders - $SPaids;
	}
	function getOldDebtPrint(){
		$Value = $this->getOldDebt();
		$N = new \MVC\Library\Number($Value);
		return $N->formatCurrency()." đ";
	}
	function getNewDebt( ){
		$Value = $this->getOldDebt() + $this->getOrdersTrackingValue() - $this->getPaidsTrackingValue(); 
		return $Value;
	}
	function getNewDebtPrint(){
		$Value = $this->getNewDebt();
		$N = new \MVC\Library\Number($Value);
		return $N->formatCurrency()." đ";
	}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//Lấy về danh sách trả tiền
	function getPaidsTop10(){		
		$mSP = new \MVC\Mapper\PaidSupplier();
		$paids = $mSP->findByTop10(array($this->getId()));
		return $paids;
	}
	function getPaids(){
		if (!isset($this->paids)){
			$mSP = new \MVC\Mapper\PaidSupplier();
			$this->paids = $mSP->findBy(array($this->getId()));
		}
		return $this->paids;
	}
	function getPaidsTracking(){
		if (!isset($this->PaidsTracking)){
			$Session = \MVC\Base\SessionRegistry::instance();
			$DateStart = $Session->getReportSupplierDateStart();
			$DateEnd = $Session->getReportSupplierDateEnd();

			$mPaid = new \MVC\Mapper\PaidSupplier();
			$this->PaidsTracking = $mPaid->findByTracking1( array($this->getId(), $DateStart, $DateEnd) );
		}
		return $this->PaidsTracking;
	}
	function getPaidsTrackingValue(){
		$Paids = $this->getPaidsTracking();
		$Sum = 0;
		$Paids->rewind();
		while ($Paids->valid()){
			$Sum += $Paids->current()->getValue();
			$Paids->next();
		}
		return $Sum;
	}
	function getPaidsTrackingValuePrint(){
		$Value = $this->getPaidsTrackingValue();
		$N = new \MVC\Library\Number($Value);
		return $N->formatCurrency()." đ";
	}
	
			
	//Lấy về danh sách các đơn hàng
	function getOrders(){
		$mOrderImport = new \MVC\Mapper\OrderImport();
		$Orders = $mOrderImport->findBy(array($this->getId()));
		return $Orders;
	}
	function getOrdersTop10(){
		$mOrderImport = new \MVC\Mapper\OrderImport();
		$Orders = $mOrderImport->findByTop10(array($this->getId()));
		return $Orders;
	}
	
	function getOrdersTracking(){
		if (!isset($this->OrdersTracking)){
			$Session = \MVC\Base\SessionRegistry::instance();
			$DateStart = $Session->getReportSupplierDateStart();
			$DateEnd = $Session->getReportSupplierDateEnd();

			$mOrder = new \MVC\Mapper\OrderImport();
			$this->OrdersTracking = $mOrder->findByTracking1( array($this->getId(), $DateStart, $DateEnd) );
		}
		return $this->OrdersTracking;
	}
	
	function getOrdersTrackingValue(){
		$Orders = $this->getOrdersTracking();
		$Sum = 0;
		$Orders->rewind();
		while ($Orders->valid()){
			$Sum += $Orders->current()->getValue();
			$Orders->next();
		}
		return $Sum;
	}
	function getOrdersTrackingValuePrint(){
		$Value = $this->getOrdersTrackingValue();
		$N = new \MVC\Library\Number($Value);
		return $N->formatCurrency()." đ";
	}
	
	//Lấy về danh sách các tài nguyên nhà cung cấp có
	function getResources() {
		$mResource = new \MVC\Mapper\Resource();
		$Resources = $mResource->findBySupplier(array($this->getId()));
		return $Resources;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE IMPORT.SUPPLIER
	//-------------------------------------------------------------------------------
	function getURLImport(){return "/import/".$this->getId();}	
	function getURLImportInsLoad(){return "/import/".$this->getId()."/ins/load";}	
	function getURLImportInsExe(){return "/import/".$this->getId()."/ins/exe";}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL SETTING.SUPPLIER
	//-------------------------------------------------------------------------------	
	function getURL(){return "/setting/resource#".$this->getId();}
		
	function getURLUpdLoad(){return "/setting/supplier/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/setting/supplier/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/setting/supplier/".$this->getId()."/del/load";}
	function getURLDelExe(){return "/setting/supplier/".$this->getId()."/del/exe";}
	
	function getURLResource(){		
		return "/setting/supplier/".$this->getId();
	}
	
	function getURLResourceInsLoad(){return "/setting/supplier/".$this->getId()."/ins/load";}
	function getURLResourceInsExe(){return "/setting/supplier/".$this->getId()."/ins/exe";}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL PAID.SUPPLIER
	//-------------------------------------------------------------------------------	
	function getURLPaid(){return "/paid/supplier/".$this->getId();}
	function getURLPaidInsLoad(){return "/paid/supplier/".$this->getId()."/ins/load";}
	function getURLPaidInsExe(){return "/paid/supplier/".$this->getId()."/ins/exe";}
							
	//---------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $id );}
	
}
?>