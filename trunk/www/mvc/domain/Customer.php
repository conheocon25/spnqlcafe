<?php
namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Customer extends Object{

    private $Id;
	private $name;
	private $phone;
    private $type;
    private $card;
    private $note;
    private $address;
	private $discount;
	
	/*Hàm khởi tạo và thiết lập các thuộc tính*/
    function __construct( $Id=null, $name=null, $type=null, $card=null, $phone=null, $address=null, $note=null, $discount=null ) {
        $this->Id = $Id;
		$this->name = $name;
		$this->type = $type;
		$this->card = $card;
		$this->phone = $phone;
		$this->address = $address;
		$this->note = $note;
		$this->discount = $discount;
        parent::__construct( $Id );
    }
	
    function getId( ) {return $this->Id;}
	
	function getType(){return $this->type;}
	
    function setType( $type ) {$this->type = $type;$this->markDirty();}
	function getTypePrint(){if ($this->type==1) return "VIP"; return "thường";}
	
	function getCard(){return $this->card;}
	
    function setCard( $card ) {$this->card = $card;$this->markDirty();}	
	function getNote(){return $this->note;}	
    function setNote( $note ) {$this->note = $note;$this->markDirty();}	
	function getName(){return $this->name;}	
    function setName( $name ) {$this->name = $name;$this->markDirty();}
	function getPhone(){return $this->phone;}	
    function setPhone( $phone ) {$this->phone = $phone;$this->markDirty();}			
    function setAddress( $address ) {$this->address = $address;$this->markDirty();}
	function getAddress(){return $this->address;}
		
	function setDiscount( $discount ) {$this->discount = $discount;$this->markDirty();}
	function getDiscount(){return $this->discount;}
			
	//=================================================================================		
	function getURLUpdLoad(){	return "/setting/customer/".$this->getId()."/upd/load";}
	function getURLUpdExe(){	return "/setting/customer/".$this->getId()."/upd/exe";}
	
	function getURLDelLoad(){	return "/setting/customer/".$this->getId()."/del/load";}
	function getURLDelExe(){	return "/setting/customer/".$this->getId()."/del/exe";}
	function getURLBarcode(){	return "/setting/customer/".$this->getId()."/barcode";}
			
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}	
	
}

?>