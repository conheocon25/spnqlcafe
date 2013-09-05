<?php	
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php");

class R2C extends Object{

    private $Id;
	private $IdCourse;
	private $IdResource;
	private $Value1;
	private $Value2;

	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( 
		$Id=null, 
		$IdCourse=null,
		$IdResource=null,
		$Value1=null,
		$Value2=null
	) 
	{
        $this->Id = $Id;
		$this->IdCourse = $IdCourse;
		$this->IdResource = $IdResource;		
		$this->Value1 = $Value1;
		$this->Value2 = $Value2;
		
        parent::__construct( $Id );
    }
    function getId( ) {
        return $this->Id;
    }
		
	function setIdCourse( $IdCourse) {
        $this->IdCourse = $IdCourse;
    }
	function getIdCourse( ) {
        return $this->IdCourse;
    }
	function getCourse( ) {
		$mCourse = new \MVC\Mapper\Course();
		$Course = $mCourse->find($this->IdCourse);
        return $Course;
    }
	
    function setIdResource( $IdResource ) {
        $this->IdResource = $IdResource;
        $this->markDirty();
    }
	function getIdResource( ) {
        return $this->IdResource;
    }
	function getResource( ) {
		$mResource = new \MVC\Mapper\Resource();
		$Resource = $mResource->find($this->IdResource);
        return $Resource;
    }
		
	function setValue1( $Value1 ) {
        $this->Value1 = $Value1;
        $this->markDirty();
    }
	function getValue1( ) {
        return $this->Value1;
    }
	
	function setValue2( $Value2 ) {
        $this->Value2 = $Value2;
        $this->markDirty();
    }
	function getValue2( ) {
        return $this->Value2;
    }
					
	//-------------------------------------------------------------------------------
	//DEFINE URL SETTING.R2C
	//-------------------------------------------------------------------------------
	function getURLUpdLoad(){
		return "/setting/category/".$this->getCourse()->getCategory()->getId()."/".$this->getIdCourse()."/recipe/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){
		return "/setting/category/".$this->getCourse()->getCategory()->getId()."/".$this->getIdCourse()."/recipe/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){
		return "/setting/category/".$this->getCourse()->getCategory()->getId()."/".$this->getIdCourse()."/recipe/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/setting/category/".$this->getCourse()->getCategory()->getId()."/".$this->getIdCourse()."/recipe/".$this->getId()."/del/exe";
	}
	//-------------------------------------------------------------------------------
	//DEFINE URL SELLING
	//-------------------------------------------------------------------------------
		
	//----------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ){$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>
