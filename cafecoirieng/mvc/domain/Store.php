<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Store extends Object{

    private $Id;
	private $Name;
	private $Note;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $Name=null , $Note=Null) {
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Note = $Note;
        parent::__construct( $Id );
    }
    function getId() {
        return $this->Id;
    }	
	function getIdPrint(){
        return "s" . $this->getId();
    }	
	
    function setName( $Name ) {
        $this->Name = $Name;
        $this->markDirty();
    }
   
	function getName( ) {
        return $this->Name;
    }
	
	function setNote( $Note ) {
        $this->Note = $Note;
        $this->markDirty();
    }
   
	function getNote( ) {
        return $this->Note;
    }
	
	//-------------------------------------------------------------------------------
	//GET LISTs
	//-------------------------------------------------------------------------------
	function getCourses(){
		$mCourse = new \MVC\Mapper\Course();
		$Courses = $mCourse->findByStore(array($this->getId()));
		return $Courses;
	}
	
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
	function getURLUpdLoad(){		
		return "/setting/store/".$this->getId()."/upd/load";
	}
	function getURLUpdExe(){		
		return "/setting/store/".$this->getId()."/upd/exe";
	}
	
	function getURLDelLoad(){		
		return "/setting/store/".$this->getId()."/del/load";
	}
	function getURLDelExe(){
		return "/setting/store/".$this->getId()."/del/exe";
	}
			
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
}
?>
