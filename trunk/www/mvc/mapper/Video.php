<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Video extends Mapper implements \MVC\Domain\VideoFinder {

    function __construct() {
        parent::__construct();
				
		$tblVideo = "tbl_video";
							
		$selectAllStmt = sprintf("select * from %s order by `count` desc", $tblVideo);
		$selectStmt = sprintf("select *  from %s where id=?", $tblVideo);
		$updateStmt = sprintf("update %s set `name`=?, `time`=?, `url`=?, `note`=?, `count`=?, `key`=? where id=?", $tblVideo);
		$insertStmt = sprintf("insert into %s ( `name`, `time`, `url`, `note`, `count`, `key`) values(?, ?, ?, ?, ?, ?)", $tblVideo);
		$deleteStmt = sprintf("delete from %s where id=?", $tblVideo);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblVideo);
		$findByCategoryStmt = sprintf("select *  from %s where id_category=?", $tblVideo);
		$findByPageStmt = sprintf("SELECT * FROM  %s LIMIT :start,:max", $tblVideo);
		$findByPage1Stmt = sprintf("SELECT * FROM  %s WHERE id_category=:id_category LIMIT :start,:max", $tblVideo);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);		
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);		
		$this->findByCategoryStmt = self::$PDO->prepare($findByCategoryStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		$this->findByPage1Stmt = self::$PDO->prepare($findByPage1Stmt);
    } 
    function getCollection( array $raw ) {
        return new VideoCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\Video(
			$array['id'],	
			$array['name'],
			$array['time'],
			$array['url'],
			$array['note'],
			$array['count'],
			$array['key'] 
		);
        return $obj;
    }

    protected function targetClass() {        
		return "Video";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(			
			$object->getName(),
			$object->getTime(),
			$object->getURL(),
			$object->getNote(),
			$object->getCount(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 					
			$object->getName(),
			$object->getTime(),
			$object->getURL(),
			$object->getNote(),
			$object->getCount(),			
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
	
	function findByCategory( $values ){
        $this->findByCategoryStmt->execute( $values );
        return new VideoCollection( $this->findByCategoryStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ){		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new VideoCollection( $this->findByPageStmt->fetchAll(), $this);
    }
	
	function findByPage1( $values ){
		$this->findByPageStmt->bindValue(':id_category', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new VideoCollection( $this->findByPageStmt->fetchAll(), $this);
    }	
}
?>