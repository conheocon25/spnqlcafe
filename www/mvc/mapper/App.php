<?php
namespace MVC\Mapper;
use MVC\Library\Encrypted;
require_once( "mvc/base/Mapper.php" );
class App extends Mapper implements \MVC\Domain\AppFinder {

    function __construct() {
        parent::__construct();
        $this->selectAllStmt = self::$PDO->prepare( "");
        $this->selectStmt = self::$PDO->prepare( "");
		$this->findByStmt = self::$PDO->prepare("");
		
		$this->notSignedStmt = self::$PDO->prepare("");							
        $this->updateStmt = self::$PDO->prepare("");
        $this->insertStmt = self::$PDO->prepare("");
		$this->deleteStmt = self::$PDO->prepare("");
		$this->checkStmt = self::$PDO->prepare("");
		$this->checkEmailStmt = self::$PDO->prepare("");		
    } 
	
    function getCollection( array $raw ) {return new AppCollection( $raw, $this );}

    protected function doCreateObject( array $array ){
        $obj = new \MVC\Domain\App(
			$array['id'],
			$array['name'],
			$array['phone'],
			$array['address'],
			$array['email'],
			$array['banner'],
			$array['prefix'],
			$array['alias'],
			$array['date_created'],
			$array['date_modified'],
			$array['date_activity'],
			$array['type'],
			$array['page_view']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "App";
    }
	
	function findBy( $values ) {	
        $this->findByStmt->execute( $values );
        return new AppCollection( $this->findByStmt->fetchAll(), $this );
    }
	
	function notSigned( $values ) {	
        $this->notSignedStmt->execute( $values );
        return new AppCollection( $this->notSignedStmt->fetchAll(), $this );
    }
	
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),
			$object->getPhone(),
			$object->getAddress(),
			$object->getEmail(),
			$object->getBanner(),
			$object->getPrefix(),
			$object->getAlias(),
			$object->getDateCreated(),
			$object->getDateModified(),
			$object->getDateActivity(),
			$object->getType()			
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
		
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getPhone(),
			$object->getAddress(),
			$object->getEmail(),
			$object->getBanner(),
			$object->getPrefix(),
			$object->getAlias(),
			$object->getDateCreated(),
			$object->getDateModified(),
			$object->getDateActivity(),
			$object->getType(),
			$object->getPageView(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }

    function selectStmt() {
        return $this->selectStmt;
    }
    function selectAllStmt() {
        return $this->selectAllStmt;
    }
	
	function check( $values ) {	
        $this->checkStmt->execute( $values );
		$result = $this->checkStmt->fetchAll();		
		if (!isset($result) || $result==null)
			return null;        
        return $result[0][0];
    }
	function checkEmail( $values ) {	
        $this->checkEmailStmt->execute( $values );
		$result = $this->checkEmailStmt->fetchAll();		
		if (!isset($result) || $result==null)
			return null;        
        return $result[0][0];
    }
	function countTables( $values ) {
		$Encrypt = new Encrypted();				
		$dbname = $Encrypt->getDBName();	
        $countTablesStmt = "SHOW TABLES IN ".$dbname." like '".$values[0]."%'";
		$this->countTablesStmt = self::$PDO->prepare( $countTablesStmt);
		$this->countTablesStmt->execute( $values );
		$result = $this->countTablesStmt->fetchAll();
		if (!isset($result) || $result==null)
			return 0;
        return count($result);
    }
	
	function getSizeDB( $values ) {
		$Encrypt = new Encrypted();				
		$dbname = $Encrypt->getDBName();
        $getSizeDBStmt = "
			SELECT 
				sum(((data_length + index_length) / 1024 / 1024))
			FROM 
				information_schema.TABLES 
			WHERE 
				table_schema = '".$dbname."' AND TABLE_NAME like '".$values[0]."%'";
				
		$this->getSizeDBStmt = self::$PDO->prepare( $getSizeDBStmt);
		$this->getSizeDBStmt->execute( $values );
		$result = $this->getSizeDBStmt->fetchAll();
		if (!isset($result[0][0]))
			return 0;
        return $result[0][0];
    }
	
}
?>