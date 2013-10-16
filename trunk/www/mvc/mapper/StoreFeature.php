<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class StoreFeature extends Mapper implements \MVC\Domain\StoreFeatureFinder {
    function __construct() {
        parent::__construct();
		
		$tblStoreFeature = "tbl_store_feature";		
		$selectAllStmt = sprintf("select * from %s", $tblStoreFeature);
		$selectStmt = sprintf("select *  from %s where id=?", $tblStoreFeature);
		$updateStmt = sprintf("update %s set id_feature=?, id_store=? where id=?", $tblStoreFeature);
		$insertStmt = sprintf("insert into %s ( id_feature, id_store) values(?, ?)", $tblStoreFeature);
		$deleteStmt = sprintf("delete from %s where id=?", $tblStoreFeature);
		$findByStmt = sprintf("select *  from %s where id_store=?", $tblStoreFeature);
	
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);		
    } 
    function getCollection( array $raw ) {
        return new StoreFeatureCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\StoreFeature( 
			$array['id'],
			$array['id_feature'],
			$array['id_store']			
		);
        return $obj;
    }

    protected function targetClass() {        
		return "StoreFeature";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdFeature(),
			$object->getIdStore()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdFeature(),
			$object->getIdStore(),			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }
	
	function findByStore( $values ) {	
		$this->findByStoreStmt->execute( array($values) );
        $array = $this->findByStoreStmt->fetch();
        $this->findByStoreStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new StoreFeatureCollection( $this->findByStmt->fetchAll(), $this);
    }
	
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}		
}
?>