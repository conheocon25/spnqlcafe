<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Resource extends Mapper implements \MVC\Domain\ResourceFinder {

    function __construct() {
        parent::__construct();
		$cafedemo = "cafedemo_resource";
						
		$selectAllStmt = sprintf("select * from %s", $cafedemo);
		$selectStmt = sprintf("select * from %s where id=?", $cafedemo);
		$updateStmt = sprintf("update %s set name=?, unit=?, price=?, description=? where id=?", $cafedemo);
		$insertStmt = sprintf("insert into %s ( idsupplier, name, unit, price, description ) 
							values( ?, ?, ?, ?, ?)", $cafedemo);
		$deleteStmt = sprintf("delete from %s where id=?", $cafedemo);
		$findBySupplierStmt = sprintf("select * from %s where idsupplier=?", $cafedemo);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findBySupplierStmt = self::$PDO->prepare($findBySupplierStmt);
		
    } 
    function getCollection( array $raw ) {
        return new ResourceCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\Resource( 
			$array['id'],
			$array['idsupplier'],
			$array['name'],
			$array['unit'],				
			$array['price'],	
			$array['description']
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "Resource";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(  
			$object->getIdSupplier(),
			$object->getName(),	
			$object->getUnit(),	
			$object->getPrice(),	
			$object->getDescription()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getUnit(),
			$object->getPrice(),
			$object->getDescription(),
			$object->getId()
		);		
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }
	
	function findBySupplier(array $values) {
        $this->findBySupplierStmt->execute( $values );
        return new SupplierCollection( $this->findBySupplierStmt->fetchAll(), $this );
    }
	
    function selectStmt() {
        return $this->selectStmt;
    }	
    function selectAllStmt() {
        return $this->selectAllStmt;
    }	
}
?>