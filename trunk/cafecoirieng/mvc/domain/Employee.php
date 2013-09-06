<?php
/** 
 * PHP version 5.3
 *
 * LICENSE: Lưu hành nội bộ
 *
 * @category   Domain
 * @package    MVC\Domain
 * @author     Bùi Thanh Tuấn <tuanbuithanh@gmail.com> 
 * @copyright  2010-2012 SPN Group
 * @license    Bản quyền nhóm
 * @version    SVN: ?
 * @link       mvc/domain/employee.php
 * @see        Employee
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */
	namespace MVC\Domain;
	require_once( "mvc/base/domain/DomainObject.php" );
	class Employee extends Object{

    private $Id;
	private $Name;
    private $Gender;
	private $Job;
	private $Phone;
	private $Address;
	
	private $Paids;
	private $PaidsTop10;
			
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null, $Gender=null, $Job=null, $Phone=null, $Address=null){
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Gender = $Gender;
		$this->Job = $Job;
		$this->Phone = $Phone;
		$this->Address = $Address;
		
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
	function getIdPrint( ) {return "e".$this->Id;}
		
	function setName( $Name ) {$this->Name = $Name;$this->markDirty();}
	function getName(){return $this->Name;}
	
    function setGender( $Gender) {$this->Gender = $Gender;$this->markDirty();}
    function getGender( ){return $this->Gender;}
	function getGenderPrint( ){if ($this->Gender==0) return "Nam"; return "Nữ";}
	
	function setJob( $Job) {$this->Job = $Job;$this->markDirty();}
    function getJob( ){return $this->Job;}
	
    function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}	
    function getPhone( ) {return $this->Phone;}
		
	function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}
	function getAddress( ) {return $this->Address;}
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getPaids(){
		if (!isset($this->Paids)){
			$mPE = new \MVC\Mapper\PaidEmployee();
			$this->Paids = $mPE->findBy(array($this->getId()));
		}
		return $this->Paids;
	}
	function getPaidsTop10(){
		if (!isset($this->PaidsTop10)){
			$mPE = new \MVC\Mapper\PaidEmployee();
			$this->PaidsTop10 = $mPE->findByTop10(array($this->getId()));
		}
		return $this->PaidsTop10;
	}
	
	function getPaidsTracking(){
		if (!isset($this->PaidsTracking)){		
			$mPE = new \MVC\Mapper\PaidEmployee();
			$Session = \MVC\Base\SessionRegistry::instance();
			$DateStart = $Session->getReportEmployeeDateStart();
			$DateEnd = $Session->getReportEmployeeDateEnd();
			
			$this->PaidsTracking = $mPE->findByTracking(array($this->getId(),$DateStart, $DateEnd));
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
		$num = new \MVC\Library\Number($this->getPaidsTrackingValue());
		return $num->formatCurrency()." đ";
	}
		
	function getPayRollAll(){
		$mPPR = new \MVC\Mapper\PaidPayRoll();
		$PRRAll = $mPPR->findBy(array($this->getId()));
		return $PRRAll;
	}
	
	function getPayRoll($Date){
		$mPR = new \MVC\Mapper\PayRoll();		
		$IdPR = $mPR->check(array($this->getId(), $Date));
		$PR = $mPR->find($IdPR);
		return $PR;
	}
	
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $id );}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------				
	function getURLUpdLoad(){return "/setting/employee/".$this->getId()."/upd/load";}
	function getURLUpdExe(){return "/setting/employee/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){return "/setting/employee/".$this->getId()."/del/load";						}
	function getURLDelExe(){return "/setting/employee/".$this->getId()."/del/exe";}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL PAID.SUPPLIER
	//-------------------------------------------------------------------------------
	
	
	//-------------------------------------------------------------------------------
	//DEFINE URL PAID.PAY.ROLL
	//-------------------------------------------------------------------------------
	function getURLPPR(){return "/paid/payroll/".$this->getIdPrint();}
	function getURLPPRInsLoad(){return "/paid/payroll/".$this->getId()."/ins/load";}
	function getURLPPRInsExe(){return "/paid/payroll/".$this->getId()."/ins/exe";}
}
?>