<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class StoreUser extends Mapper implements \MVC\Domain\StoreUserFinder {

    function __construct() {
        parent::__construct();
				
		$tblStoreUser = "tbl_store_user";
		
		$selectAllStmt 			= sprintf("select * from %s", $tblStoreUser);
		$selectStmt 			= sprintf("select *  from %s where id=?", $tblStoreUser);
		$updateStmt 			= sprintf("update %s set id_user=?, id_store=? where id=?", $tblStoreUser);
		$insertStmt 			= sprintf("insert into %s ( id_user, id_store) values(?, ?)", $tblStoreUser);
		$deleteStmt 			= sprintf("delete from %s where id=?", $tblStoreUser);
		$findByStmt 			= sprintf("select *  from %s where id_store=?", $tblStoreUser);
		$findByUserStmt 		= sprintf("select *  from %s where id_user=?", $tblStoreUser);
		
        $this->selectAllStmt 	= self::$PDO->prepare($selectAllStmt);
        $this->selectStmt 		= self::$PDO->prepare($selectStmt);
        $this->updateStmt 		= self::$PDO->prepare($updateStmt);
        $this->insertStmt 		= self::$PDO->prepare($insertStmt);
		$this->deleteStmt 		= self::$PDO->prepare($deleteStmt);
		$this->findByStmt 		= self::$PDO->prepare($findByStmt);		
		$this->findByUserStmt 	= self::$PDO->prepare($findByUserStmt);
    }
	
    function getCollection( array $raw ) {return new StoreUserCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\StoreUser( 
			$array['id'],
			$array['id_user'],
			$array['id_store']			
		);
        return $obj;
    }

    protected function targetClass() { return "StoreUser";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdStore()			
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdUser(),
			$object->getIdStore(),			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
			
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new StoreUserCollection( $this->findByStmt->fetchAll(), $this);
    }
	
	function findByUser( $values ){
        $this->findByUserStmt->execute( $values );
        return new StoreUserCollection( $this->findByUserStmt->fetchAll(), $this);
    }
	
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}	
	
}
?>