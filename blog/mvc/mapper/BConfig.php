<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class BConfig extends Mapper implements \MVC\Domain\BConfigFinder {

    function __construct() {
        parent::__construct();
		$tblBConfig = "www_config";
		
		$selectAllStmt = sprintf("select * from %s", $tblBConfig);
		$selectStmt = sprintf("select *  from %s where id=?", $tblBConfig);
		$updateStmt = sprintf("update %s set param=?, value=? where id=?", $tblBConfig);
		$insertStmt = sprintf("insert into %s ( param, value) values(?, ?)", $tblBConfig);
		$deleteStmt = sprintf("delete from %s where id=?", $tblBConfig);		
		$findByNameStmt = sprintf("select *  from %s where param=?", $tblBConfig);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblBConfig);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByNameStmt = self::$PDO->prepare($findByNameStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    }
	
    function getCollection( array $raw ) {return new BConfigCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\BConfig(
			$array['id'],
			$array['param'],
			$array['value']			
		);
        return $obj;
    }

    protected function targetClass() {return "BConfig";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getParam(),			
			$object->getValue()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getParam(),
			$object->getValue(),			
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }

	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}

    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findByName( $Param ){
        $this->findByNameStmt->execute( array( $Param ) );
        $array = $this->findByNameStmt->fetch( ); 
        $this->findByNameStmt->closeCursor( );
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->createObject( $array );
        $object->markClean();
        return $object; 
    }
	
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new BConfigCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>