<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Customer extends Object{

    private $Id;
	private $Name;
	private $Email;
	private $Phone;
    private $Type;        
    private $Address;
	private $Key;
	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $Id=null, $Name=null, $Email=null, $Phone=null, $Type=null, $Address=null, $Key=null ){
        $this->Id = $Id;
		$this->Name = $Name;
		$this->Email = $Email;
		$this->Phone = $Phone;
		$this->Type = $Type;
		$this->Address = $Address;
		$this->Key = $Key;
		
        parent::__construct( $Id );
    }
    function getId( ) {return $this->Id;}
						
	function getName(){return $this->Name;}	
    function setName( $Name ) {$this->Name = $Name;$this->markDirty();}
	
	function getEmail(){return $this->Email;}	
    function setEmail( $Email ) {$this->Email = $Email;$this->markDirty();}
	
	function getPhone(){return $this->Phone;}	
    function setPhone( $Phone ) {$this->Phone = $Phone;$this->markDirty();}
	
	function getType(){return $this->Type;}	
    function setType( $Type ) {$this->Type = $Type;$this->markDirty();}
	
	function getTypePrint( ) {		
		//$mA = new \MVC\Mapper\Unit();
		//$A = $mA->findAll();
		return "abc";
	}
	
    function setAddress( $Address ) {$this->Address = $Address;$this->markDirty();}
	function getAddress(){return $this->Address;}
		
	function setKey( $Key ) {$this->Key = $Key;$this->markDirty();}
	function getKey(){return $this->Key;}
	function reKey( ) {
		$Str = new \MVC\Library\String($this->Name);
		$this->Key = $Str->converturl();
	}
	
	//=================================================================================		
	function getURLUpdLoad(){	return "/setting/customer/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "/setting/customer/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){	return "/setting/customer/".$this->getId()."/del/load";}
	function getURLDelExe(){	return "/setting/customer/".$this->getId()."/del/exe";}
				
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
	
}

?>