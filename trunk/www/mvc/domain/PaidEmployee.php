<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class PaidEmployee extends Object{

    private $Id;
	private $IdEmployee;
	private $Date;
    private $Value;
	private $Note;
	
	private $Supplier;
			
	//-------------------------------------------------------------------------
	//Hàm khởi tạo và thiết lập các thuộc tính
	//-------------------------------------------------------------------------
    function __construct(
		$Id=null,		
		$IdEmployee=null,
		$Date=null,
		$Value=0,
		$Note=null
	) {
        $this->Id = $Id;
		$this->IdEmployee = $IdEmployee;
		$this->Date = $Date;
		$this->Value = $Value;
		$this->Note = $Note;
        parent::__construct( $Id );
    }
    function setId( $Id ) {
        $this->Id = $Id;
        $this->markDirty();
    }
    function getId( ) {
        return $this->Id;
    }
	function getIdPrint( ) {
        return "SupplierPaid".$this->Id;
    }
			
    function setIdEmployee( $IdEmployee ) {
        $this->IdEmployee = $IdEmployee;
        $this->markDirty();
    }
    function getIdEmployee( ) {
        return $this->IdEmployee;
    }
	function getEmployee( ) {
		
		$mEmployee = new \MVC\Mapper\Employee();
		$Employee = $mEmployee->find($this->IdEmployee);
		
        return $Employee;
    }
    
	function setValue( $Value ) {
        $this->Value = $Value;
        $this->markDirty();
    }	
	function getValue( ) {
		if (!isset($this->Value))
			return 0;
        return $this->Value;
    }
	function getValuePrint( ) {        
		$num = number_format($this->Value, 0, ',', '.');
		return $num." đ";
    }
	
	function setDate( $Date ) {
        $this->Date = $Date;
        $this->markDirty();
    }
	function getDate( ) {
        return $this->Date;
    }
	function getDatePrint( ) {        
		$date = new \DateTime($this->Date);
		return $date->format('d/m/Y');
    }
		
	   
	function setNote( $Note ) {
        $this->Note = $Note;
        $this->markDirty();
    }
	function getNote( ) {
		if (!isset($this->Note))
			return "Click để thêm ghi chú";
        return $this->Note;
    }	
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLUpdLoad(){
		return "/paid/employee/".$this->getIdEmployee()."/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){
		return "/paid/employee/".$this->getIdEmployee()."/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/paid/employee/".$this->getIdEmployee()."/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/paid/employee/".$this->getIdEmployee()."/".$this->getId()."/del/exe";
	}
	
	/*--------------------------------------------------------------------*/	
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
		
}
?>