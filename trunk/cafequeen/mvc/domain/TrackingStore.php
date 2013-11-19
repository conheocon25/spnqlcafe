<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );
class TrackingStore extends Object{

    private $Id;
	private $IdTracking;
	private $IdCourse;
	private $CountOld;
	private $CountImport;
	private $CountExport;	
	private $Price;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( 
		$Id=null, 
		$IdTracking=null, 
		$IdCourse=null, 
		$CountOld=null, 
		$CountImport=null, 
		$CountExport=null, 		
		$Price=Null
	) {
        $this->Id = $Id;
		$this->IdTracking = $IdTracking;
		$this->IdCourse = $IdCourse;
		$this->CountOld = $CountOld;
		$this->CountImport = $CountImport;
		$this->CountExport = $CountExport;
		$this->Price = $Price;
		
        parent::__construct( $Id );
    }

    function getId() {return $this->Id;}	
	function getIdPrint(){return "s" . $this->getId();}	
	
    function setIdTracking( $IdTracking ) {$this->IdTracking = $IdTracking;$this->markDirty();}   
	function getIdTracking( ) {return $this->IdTracking;}
	
	function setIdCourse( $IdCourse ) {$this->IdCourse = $IdCourse;$this->markDirty();}   
	function getIdCourse( ) {return $this->IdCourse;}
	function getCourse(){ $mCourse = new \MVC\Mapper\Course(); $Course = $mCourse->find( $this->getIdCourse() ); return $Course;}
	
	function setCountOld( $CountOld ) {$this->CountOld = $CountOld;$this->markDirty();}   
	function getCountOld( ) {return $this->CountOld;}
	function getCountOldPrint( ) {return \round($this->CountOld,1);}
	
	function setCountImport( $CountImport ) {$this->CountImport = $CountImport;$this->markDirty();}   
	function getCountImport( ) {return $this->CountImport;}
	function getCountImportPrint( ) {return \round($this->CountImport,1);}
	
	function setCountExport( $CountExport ) {$this->CountExport = $CountExport;$this->markDirty();}   
	function getCountExport( ) {return $this->CountExport;}
	function getCountExportPrint( ) {return \round($this->CountExport,1);}
			
	function setPrice( $Price ) {$this->Price = $Price;$this->markDirty();}   
	function getPrice( ) {return $this->Price;}
	function getPricePrint( ) {$N = new \MVC\Library\Number($this->Price);return $N->formatCurrency();}
	
	function getCountRemain(){
		return $this->getCountOld() + $this->getCountImport() - $this->getCountExport() ;
	}
	function getCountRemainPrint( ) {return \round($this->getCountRemain(),1);}
		
	function getCountRemainValue(){
		return $this->getPrice() * $this->getCountRemain();
	}
	function getCountRemainValuePrint(){
		$N = new \MVC\Library\Number( $this->getCountRemainValue());
		return $N->formatCurrency();
	}

	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLUpdLoad(){	return "/report/store/".$this->getIdTracking()."/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "/report/store/".$this->getIdTracking()."/".$this->getId()."/upd/exe";}
	
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>