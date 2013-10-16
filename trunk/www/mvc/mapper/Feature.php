<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Feature extends Mapper implements \MVC\Domain\FeatureFinder {

    function __construct() {
        parent::__construct();
		$tblFeature = "tbl_feature";
		
		$selectAllStmt = sprintf("select * from %s", $tblFeature);
		$selectStmt = sprintf("select *  from %s where id=?", $tblFeature);
		$updateStmt = sprintf("update %s set name=?, icon=?, `key`=? where id=?", $tblFeature);
		$insertStmt = sprintf("insert into %s ( name, icon, `key`) values(?, ?, ?)", $tblFeature);
		$deleteStmt = sprintf("delete from %s where id=?", $tblFeature);		
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblFeature);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblFeature);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		
    } 
    function getCollection( array $raw ) {
        return new FeatureCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Feature( 
			$array['id'],
			$array['name'],			
			$array['icon'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() { return "Feature";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getIcon(),			
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(),
			$object->getIcon(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
	function findByKey( $values ) {	
		$this->findByKeyStmt->execute( array($values) );
        $array = $this->findByKeyStmt->fetch();
        $this->findByKeyStmt->closeCursor();
        if ( ! is_array( $array ) ) { return null; }
        if ( ! isset( $array['id'] ) ) { return null; }
        $object = $this->doCreateObject( $array );
        return $object;		
    }
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new FeatureCollection( $this->findByPageStmt->fetchAll(), $this );
    }
}
?>