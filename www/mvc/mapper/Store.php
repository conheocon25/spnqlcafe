<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Store extends Mapper implements \MVC\Domain\StoreFinder {

    function __construct() {
        parent::__construct();
        $this->selectAllStmt = self::$PDO->prepare( "select * from tbl_store");
        $this->selectStmt = self::$PDO->prepare( "select * from tbl_store where id=?");
        $this->updateStmt = self::$PDO->prepare( "update tbl_store set name=?, email =?, phone=?, type=?, address=?, `key`=? where id=?");
        $this->insertStmt = self::$PDO->prepare( "insert into tbl_store (name, email, phone, type, address, `key`)
							values( ?, ?, ?, ?, ?, ?)");
		$this->deleteStmt = self::$PDO->prepare( "delete from tbl_store where id=?");
		$this->findByKeyStmt = self::$PDO->prepare("SELECT * FROM tbl_store WHERE `key`=?");
		$this->findByCardStmt = self::$PDO->prepare("SELECT * from tbl_store where card=?");
		$this->findByPageStmt = self::$PDO->prepare("SELECT * FROM  tbl_store LIMIT :start,:max");
    }
	
    function getCollection( array $raw ) {return new StoreCollection( $raw, $this );}
    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Store( 
			$array['id'],  
			$array['name'],
			$array['email'],			
			$array['phone'],
			$array['type'],
			$array['address'],
			$array['key']
		);
        return $obj;
    }
	
    protected function targetClass() {  return "Store"; }
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(  
			$object->getName(),
			$object->getEmail(),
			$object->getPhone(),
			$object->getType(),
			$object->getAddress(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getEmail(),
			$object->getPhone(),
			$object->getType(),
			$object->getAddress(),
			$object->getKey(),
			$object->getId()
		);		
        $this->updateStmt->execute( $values );
    }
	
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findByPostion($values) {		
        $str = "SELECT id FROM tbl_store ORDER BY id LIMIT ". $values[0] .",1";		
		$this->findByPositionStmt = self::$PDO->prepare($str);
        $this->findByPositionStmt->execute($values);
		$result = $this->findByPositionStmt->fetchAll();
        return $result[0][0];
    }
	
	function findByKey( $values ) {	
		$this->findByKeyStmt->execute( array($values) );
        $array = $this->findByKeyStmt->fetch();
        $this->findByKeyStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
	function findByCard( $values ) {	
		$this->findByCardStmt->execute( $values );
        $array = $this->findByCardStmt->fetch();
        $this->findByCardStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
				
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new StoreCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>