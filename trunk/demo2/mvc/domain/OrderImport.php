<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
use MVC\Library\Number;
use MVC\Library\Date;

class OrderImport extends Object{

    private $id;
	private $idsupplier;
	private $date;
    private $description;
	
	private $Supplier;
	private $Tracks;
	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $id=null, $idsupplier=null, $date=null, $description=null) {
        $this->id = $id;
		$this->idsupplier = $idsupplier;
		$this->date = $date;
		$this->description = $description;
        parent::__construct( $id );
    }
    function getId( ) {
        return $this->id;
    }
	
	function getIdPrint( ) {
        return "o".$this->id;
    }

    function setIdSupplier( $idsupplier ) {
        $this->idsupplier = $idsupplier;
        $this->markDirty();
    }
    function getIdSupplier( ) {
        return $this->idsupplier;
    }
	function getSupplier( ) {
		if ( !isset($this->Supplier) ){
			$mSupplier = new \MVC\Mapper\Supplier();
			$this->Supplier = $mSupplier->find($this->idsupplier);
		}
        return $this->Supplier;
    }
	
	function getDate( ) {
        return $this->date;
    }
    function setDate( $date ) {
        $this->date = $date;
        $this->markDirty();
    }
	function getDatePrint( ) {
		$date = new Date($this->date);		
        return $date->getDateFormat();
    }
	
	function setCurrentTime() {				
		$Today = date("Y-m-d H:i:s");		
		$this->date = $Today;        
        $this->markDirty();
    }
	
	function getDescription( ) {
        return $this->description;
    }
	function setDescription( $description ) {
        $this->description = $description;
        $this->markDirty();
    }
	
	function getDetails(){
		if (!isset($this->Tracks)){			
			$mOID = new \MVC\Mapper\OrderImportDetail();
			$this->Tracks = $mOID->trackBy(array(
				$this->getId(),
				$this->getIdSupplier(),
				$this->getId()
			));			
		}
		return $this->Tracks;
	}
	
	function getValue(){
		$mOID = new \MVC\Mapper\OrderImportDetail();
		$Eval = $mOID->Evaluate(array($this->id));
		return $Eval;
	}
	
	function getValuePrint(){
		$Value = new Number($this->getValue());
		return $Value->formatCurrency()." đ";
	}
	
	function getValueStrPrint(){
		$Value = new Number($this->getValue());
		return $Value->readDigit()." đồng";
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLPrint(){
		return "/import/".$this->getIdSupplier()."/".$this->getId()."/print";
	}
	function getURLPrint1(){
		return "/import/".$this->getIdSupplier()."/".$this->getId()."/print/1";
	}
	
	function getURLUpdLoad(){
		return "/import/".$this->getIdSupplier()."/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/import/".$this->getIdSupplier()."/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){		
		return "/import/".$this->getIdSupplier()."/".$this->getId()."/del/load";
	}
	function getURLDelExe(){		
		return "/import/".$this->getIdSupplier()."/".$this->getId()."/del/exe";
	}
	
	function getURLDetail(){
		return "/import/".$this->getIdSupplier()."/".$this->getId();
	}
	
	//---------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $id );}
	
}
?>
