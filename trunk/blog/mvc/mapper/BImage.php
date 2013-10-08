<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class BImage extends Mapper implements \MVC\Domain\BImageFinder {

    function __construct() {
        parent::__construct();
		$tblBImage = "www_blog_image";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY time DESC", $tblBImage);
		$selectStmt = sprintf("select *  from %s where id=?", $tblBImage);
		$updateStmt = sprintf("update %s set id_album=?, name=?, url=?, note=?, time=?, `key`=? where id=?", $tblBImage);
		$insertStmt = sprintf("insert into %s ( id_album, name, url, note, `key`) values(?, ?, ?, ?, ?)", $tblBImage);
		$deleteStmt = sprintf("delete from %s where id=?", $tblBImage);
		$findByStmt = sprintf("select *  from %s where id_album=?", $tblBImage);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblBImage);
		$findByPageStmt = sprintf("SELECT * FROM  %s WHERE id_album = :id_album LIMIT :start,:max", $tblBImage);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
    } 
    function getCollection( array $raw ) {return new BImageCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\BImage(
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

    protected function targetClass(){return "BImage";}

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
        return new BImageCollection( $this->findByPageStmt->fetchAll(), $this );
    }	
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new BImageCollection( $this->findByStmt->fetchAll(), $this);
    }
	
}
?>