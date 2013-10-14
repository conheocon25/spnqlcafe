<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class StoreLocation extends Mapper implements \MVC\Domain\StoreLocationFinder {

    function __construct() {
        parent::__construct();
				
		$tblStoreLocation = "tbl_store_location";
		
		$selectAllStmt = sprintf("select * from %s", $tblStoreLocation);
		$selectStmt = sprintf("select *  from %s where id=?", $tblStoreLocation);
		$updateStmt = sprintf("update %s set id_district=?, id_store=?, X=?, Y=? where id=?", $tblStoreLocation);
		$insertStmt = sprintf("insert into %s ( id_district, id_store, X, Y) values(?, ?, ?, ?)", $tblStoreLocation);
		$deleteStmt = sprintf("delete from %s where id=?", $tblStoreLocation);
		$findByStmt = sprintf("select *  from %s where id_district=?", $tblStoreLocation);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		
    } 
    function getCollection( array $raw ) {
        return new StoreLocationCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\StoreLocation( 
			$array['id'],
			$array['id_district'],
			$array['id_store'],
			$array['x'],
			$array['y']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "StoreLocation";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdDistrict(),
			$object->getIdStore(),
			$object->getX(),
			$object->getY()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdDistrict(),
			$object->getIdStore(),
			$object->getX(),
			$object->getY(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new StoreLocationCollection( $this->findByStmt->fetchAll(), $this);
    }
	
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
	
}
?>