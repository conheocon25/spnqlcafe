<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Image extends Mapper implements \MVC\Domain\ImageFinder {

    function __construct() {
        parent::__construct();
		$tblImage = "tbl_album_image";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblImage);
		$selectStmt = sprintf("select *  from %s where id=?", $tblImage);
		$updateStmt = sprintf("update %s set id_album=?, name=?, url=?, note=?, time=?, `key`=? where id=?", $tblImage);
		$insertStmt = sprintf("insert into %s ( id_album, name, url, note, `key`) values(?, ?, ?, ?, ?)", $tblImage);
		$deleteStmt = sprintf("delete from %s where id=?", $tblImage);
		$findByStmt = sprintf("select *  from %s where id_album=?", $tblImage);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblImage);
		$findByPageStmt = sprintf("SELECT * FROM  %s WHERE id_album = :id_album LIMIT :start,:max", $tblImage);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    } 
    function getCollection( array $raw ) {return new ImageCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Image(
			$array['id'],
			$array['id_album'],
			$array['name'],
			$array['time'],
			$array['url'],
			$array['note'],
			$array['key'] 
		);
        return $obj;
    }

    protected function targetClass(){return "Image";}

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdAlbum(),
			$object->getName(),
			$object->getURL(),
			$object->getNote(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdAlbum(),
			$object->getName(),
			$object->getURL(),
			$object->getNote(),
			$object->getTime(),
			$object->getKey(),
			$object->getId()
		);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt(){return $this->selectAllStmt;}
	
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
		$this->findByPageStmt->bindValue(':id_album', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new ImageCollection( $this->findByPageStmt->fetchAll(), $this );
    }	
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new ImageCollection( $this->findByStmt->fetchAll(), $this);
    }
	
}
?>