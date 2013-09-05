<?php
Namespace MVC\Domain;
use MVC\Library\Number;

require_once( "mvc/base/domain/DomainObject.php");

class Course extends Object{

    private $Id;
	private $IdCategory;
	private $Name;
	private $ShortName;
	private $Unit;
	private $Price1;
	private $Price2;
	private $Price3;
	private $Price4;
	private $Picture;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( 
		$Id=null, 
		$IdCategory=null, 
		$Name=null, 
		$ShortName=null, 
		$Unit=null, 
		$Price1=null, 
		$Price2=null, 
		$Price3=null, 
		$Price4=null, 
		$Picture=Null) 
	{
        $this->Id = $Id;
		$this->IdCategory = $IdCategory;
		$this->Name = $Name;
		$this->ShortName = $ShortName;
		$this->Unit = $Unit;
		$this->Price1 = $Price1;
		$this->Price2 = $Price2;
		$this->Price3 = $Price3;
		$this->Price4 = $Price4;
		$this->Picture = $Picture;
        parent::__construct( $Id );
    }
    function getId( ) {
        return $this->Id;
    }
		
	function getIdCategory( ) {
        return $this->IdCategory;
    }
	function getCategory( ){
		$mCategory = new \MVC\Mapper\Category();
		$Category = $mCategory->find($this->IdCategory);
        return $Category;
    }
	
    function setName( $Name ) {
        $this->Name = $Name;
        $this->markDirty();
    }
	function setShortName( $ShortName ) {
        $this->ShortName = $ShortName;
        $this->markDirty();
    }
	function setIdCategory( $IdCategory ) {
        $this->IdCategory = $IdCategory;
        $this->markDirty();
    }
   function setUnit( $Unit) {
        $this->Unit = $Unit;
        $this->markDirty();
    }
	function getPrice( ) {
		$Session = \MVC\Base\SessionRegistry::instance();
		$CurrentTypePrice = $Session->getCurrentTypePrice();
		if ($CurrentTypePrice==2)
			return $this->Price2;
		else if ($CurrentTypePrice==3)	
			return $this->Price3;
		else if ($CurrentTypePrice==4)
			return $this->Price4;
		return $this->Price1;
    }	
	function setPrice1( $Price1 ) {
        $this->Price1 = $Price1;
        $this->markDirty();
    }
	function getPrice1( ) {
        return $this->Price1;
    }
	function getPrice1Print( ) {
        $num = new Number($this->Price1);
		return $num->formatCurrency()." đ";
    }
	
	function setPrice2( $Price2 ) {
        $this->Price2 = $Price2;
        $this->markDirty();
    }
	function getPrice2( ) {
        return $this->Price2;
    }
	function getPrice2Print( ) {
        $num = new Number($this->Price2);
		return $num->formatCurrency();
    }
	
	function setPrice3( $Price3 ) {
        $this->Price3 = $Price3;
        $this->markDirty();
    }
	function getPrice3( ) {
        return $this->Price3;
    }
	function getPrice3Print( ) {
        $num = new Number($this->Price3);
		return $num->formatCurrency();
    }
	
	function setPrice4( $Price4 ) {
        $this->Price4 = $Price4;
        $this->markDirty();
    }
	function getPrice4( ) {
        return $this->Price4;
    }
	function getPrice4Print( ){
        $num = new Number($this->Price4);
		return $num->formatCurrency();
    }
	
	function setPicture( $Picture ) {
        $this->Picture = $Picture;
        $this->markDirty();
    }
	
	function getPicture( ) {
        return $this->Picture;
    }
	
	function getName( ) {
        return $this->Name;
    }
	function getShortName( ) {
        return $this->ShortName;
    }
	function getUnit( ) {
        return $this->Unit;
    }
	//----------------------------------------------------------------------------------
	function getTrackingCount($DateStart, $DateEnd){
		$mTC = new 	\MVC\Mapper\SessionDetail();
		return $mTC->trackingCount(array($this->getId(), $DateStart, $DateEnd));
	}
	
	function getRecipeAll(){
		$mR2C = new \MVC\Mapper\R2C();
		return $mR2C->findBy(array($this->getId()));
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL SETTING.COURSE
	//-------------------------------------------------------------------------------
	function getURLRecipe(){
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/recipe";
	}
	function getURLRecipeInsLoad(){
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/recipe/ins/load";
	}
	function getURLRecipeInsExe(){
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/recipe/ins/exe";
	}
	
	function getURLUpdLoad(){	
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){		
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/del/load";
	}
	function getURLDelExe(){		
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/del/exe";
	}
	//-------------------------------------------------------------------------------
	//DEFINE URL SELLING
	//-------------------------------------------------------------------------------
	function getURLCallDefaultExe(){		
		return "/setting/category/".$this->getIdCategory()."/".$this->getId()."/del/exe";
	}
	
	//----------------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ){$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>
