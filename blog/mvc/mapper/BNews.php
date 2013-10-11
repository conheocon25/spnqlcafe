<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class BNews extends Mapper implements \MVC\Domain\BNewsFinder {

    function __construct() {
        parent::__construct();
				
		$tblBNews = "www_news";
		
		$selectAllStmt = sprintf("select * from %s ORDER BY type DESC, date DESC", $tblBNews);
		$selectStmt = sprintf("select *  from %s where id=?", $tblBNews);
		$updateStmt = sprintf("update %s set id_category=?, author=?, date=?, content=?, title=?, type=?, `key`=? where id=?", $tblBNews);
		$insertStmt = sprintf("insert into %s ( id_category, author, date, content, title, type, `key`) values(?, ?, ?, ?, ?, ?, ?)", $tblBNews);
		$deleteStmt = sprintf("delete from %s where id=?", $tblBNews);
		$findByStmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC", $tblBNews);		
		$findByKeyStmt = sprintf("select *  from %s where `key`=?", $tblBNews);
		$findByLimitStmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC limit 5", $tblBNews);
		$findByLimit1Stmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC limit 6", $tblBNews);
		$findByLimit2Stmt = sprintf("select *  from %s where id_category=? ORDER BY type DESC, date DESC limit 12", $tblBNews);
		
		$findByCategoryDateStmt = sprintf(
			"select *  
			from %s 
			where id_category=? AND date<=?
			ORDER BY type DESC, date DESC LIMIT 10"
		, $tblBNews);
			
		$findByCategoryPageStmt = sprintf(
			"SELECT 
				*
			FROM 
				%s 			
			WHERE id_category=:id_category
			ORDER BY date desc			
			LIMIT :start,:max"
		, $tblBNews);
		
		$findByPageStmt = sprintf("SELECT * FROM  %s ORDER BY date desc LIMIT :start,:max" , $tblBNews);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByKeyStmt = self::$PDO->prepare($findByKeyStmt);
		$this->findByLimitStmt = self::$PDO->prepare($findByLimitStmt);
		$this->findByLimit1Stmt = self::$PDO->prepare($findByLimit1Stmt);
		$this->findByLimit2Stmt = self::$PDO->prepare($findByLimit2Stmt);
		
		$this->findByCategoryDateStmt = self::$PDO->prepare($findByCategoryDateStmt);
		$this->findByPageStmt = self::$PDO->prepare($findByPageStmt);
		$this->findByCategoryPageStmt = self::$PDO->prepare($findByCategoryPageStmt);

    } 
    function getCollection( array $raw ) {
        return new BNewsCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\BNews( 
			$array['id'],
			$array['id_category'],
			$array['author'],
			$array['date'],
			$array['content'],
			$array['title'],
			$array['type'],
			$array['key']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "BNews";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getAuthor(),
			$object->getDate(),
			$object->getContent(),
			$object->getTitle(),
			$object->getType(),
			$object->getKey()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdCategory(),
			$object->getAuthor(),
			$object->getDate(),
			$object->getContent(),
			$object->getTitle(),
			$object->getType(),
			$object->getKey(),
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
	
	function findBy( $values ){
        $this->findByStmt->execute( $values );
        return new BNewsCollection( $this->findByStmt->fetchAll(), $this);
    }
		
	function findByLimit( $values ){
        $this->findByLimitStmt->execute( $values );
        return new BNewsCollection( $this->findByLimitStmt->fetchAll(), $this);
    }
	function findByLimit1( $values ){
        $this->findByLimit1Stmt->execute( $values );
        return new BNewsCollection( $this->findByLimit1Stmt->fetchAll(), $this);
    }
	function findByLimit2( $values ){
        $this->findByLimit2Stmt->execute( $values );
        return new BNewsCollection( $this->findByLimit2Stmt->fetchAll(), $this);
    }
	
	function findByCategoryDate( $values ){
        $this->findByCategoryDateStmt->execute( $values );
        return new BNewsCollection( $this->findByCategoryDateStmt->fetchAll(), $this);
    }
	
	function findByPage( $values ) {		
		$this->findByPageStmt->bindValue(':start', ((int)($values[0])-1)*(int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->bindValue(':max', (int)($values[1]), \PDO::PARAM_INT);
		$this->findByPageStmt->execute();
        return new BNewsCollection( $this->findByPageStmt->fetchAll(), $this );
    }
	function findByCategoryPage( $values ) {
		$this->findByCategoryPageStmt->bindValue(':id_category', $values[0], \PDO::PARAM_INT);
		$this->findByCategoryPageStmt->bindValue(':start', ((int)($values[1])-1)*(int)($values[2]), \PDO::PARAM_INT);
		$this->findByCategoryPageStmt->bindValue(':max', (int)($values[2]), \PDO::PARAM_INT);
		$this->findByCategoryPageStmt->execute();
        return new BNewsCollection( $this->findByCategoryPageStmt->fetchAll(), $this );
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
}
?>