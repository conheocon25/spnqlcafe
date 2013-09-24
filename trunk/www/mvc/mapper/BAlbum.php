<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class BAlbum extends Mapper implements \MVC\Domain\BAlbumFinder {

    function __construct() {
        parent::__construct();
				
		$tblCategory = "www_blog_category_album";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY `order`", $tblCategory);
		$selectStmt = sprintf("select *  from %s where id=?", $tblCategory);
		$updateStmt = sprintf("update %s set id_customer=?, name=?, `order`=?, `key`=? where id=?", $tblCategory);
		$insertStmt = sprintf("insert into %s ( id_customer, name, `order`, `key`) values(?, ?, ?, ?)", $tblCategory);
		$deleteStmt = sprintf("delete from %s where id=?", $tblCategory);
		$findByStmt = sprintf("select *  from %s where id_customer=?", $tblCategory);
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblCategory);
		$findByPageStmt = sprintf("SELECT * FROM  %s where id_customer=:id_customer LIMIT :start,:max", $tblCategory);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		
    } 
    function getCollection( array $raw ) {return new BAlbumCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\BAlbum( 
			$array['id'],
			$array['id_customer'],
			$array['name'],
			$array['order'],
			$array['key']
		);
        return $obj;
    }
    protected function targetClass() {return "BAlbum";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCustomer(),
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
			$object->getIdCustomer(),
			$object->getName(),
			$object->getOrder(),
			$object->getKey(),
			$object->getId()
		);
		//print_r($values);
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}    
	function selectAllStmt() {return $this->selectAllStmt;}
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new BAlbumCollection( $this->findByStmt->fetchAll(), $this);
    }
	
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
		$this->findByPageStmt->bindValue(':id_customer', $values[0], \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new BAlbumCollection( $this->findByPageStmt->fetchAll(), $this );
    }	
}
?>