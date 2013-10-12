<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Album extends Mapper implements \MVC\Domain\AlbumFinder {

    function __construct() {
        parent::__construct();
				
		$tblAlbum = "www_album";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY `order`", $tblAlbum);
		$selectStmt = sprintf("select *  from %s where id=?", $tblAlbum);
		$updateStmt = sprintf("update %s set name=?, `order`=?, `key`=? where id=?", $tblAlbum);
		$insertStmt = sprintf("insert into %s ( name, `order`, `key`) values(?, ?, ?)", $tblAlbum);
		$deleteStmt = sprintf("delete from %s where id=?", $tblAlbum);
		
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblAlbum);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblAlbum);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		
    } 
    function getCollection( array $raw ) {return new AlbumCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Album( 
			$array['id'],		
			$array['name'],
			$array['order'],
			$array['key']
		);
        return $obj;
    }
    protected function targetClass() {return "Album";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getOrder(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getOrder(),
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
        return new AlbumCollection( $this->findByPageStmt->fetchAll(), $this );
    }	
}
?>