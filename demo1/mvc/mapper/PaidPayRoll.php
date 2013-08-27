<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PaidPayRoll extends Mapper implements \MVC\Domain\PaidPayRollFinder{

    function __construct() {
        parent::__construct();
				
		$tblPaidPayRoll = "cafedemo_paid_pay_roll";
		
		$selectAllStmt = sprintf("select * from %s", $tblPaidPayRoll);
		$selectStmt = sprintf("select * from %s where id=?", $tblPaidPayRoll);
		$updateStmt = sprintf("update %s set idemployee=?, date=?, value_base=?, value_sub=?, value_pre=?, note=? where id=?", $tblPaidPayRoll);
		$insertStmt = sprintf("insert into %s (idemployee, date, value_base, value_sub, value_pre, note) values(?,?,?,?,?,?)", $tblPaidPayRoll);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPaidPayRoll);
		$findByStmt = sprintf("select * from %s where idemployee = ? order by date DESC", $tblPaidPayRoll);
		$findByTop10Stmt = sprintf("select * from %s where idemployee = ? order by date DESC LIMIT 10", $tblPaidPayRoll);
		
		$findByTrackingStmt = sprintf(
			"select
				*
			from 
				%s
			where
				date >= ? AND date <= ?
			order by 
				date DESC
			"
		, $tblPaidPayRoll);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByTop10Stmt = self::$PDO->prepare($findByTop10Stmt);
		$this->findByTrackingStmt = self::$PDO->prepare($findByTrackingStmt);		
    } 
    function getCollection( array $raw ) {
        return new PaidPayRollCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PaidPayRoll( 
			$array['id'],
			$array['idemployee'],
			$array['date'],
			$array['value_base'],
			$array['value_sub'],
			$array['value_pre'],
			$array['note']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PaidPayRoll";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdEmployee(),
			$object->getDate(),
			$object->getValueBase(),
			$object->getValueSub(),
			$object->getValuePre(),
			$object->getNote()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdEmployee(),
			$object->getDate(),
			$object->getValueBase(),
			$object->getValueSub(),
			$object->getValuePre(),
			$object->getNote(),
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
	
	function findBy($values ){
        $this->findByStmt->execute( $values );
        return new PaidPayRollCollection( $this->findByStmt->fetchAll(), $this );
    }
	
	function findByTop10($values ){
        $this->findByTop10Stmt->execute( $values );
        return new PaidPayRollCollection( $this->findByTop10Stmt->fetchAll(), $this );
    }
	
	function findByTracking($values ){
        $this->findByTrackingStmt->execute( $values );
        return new PaidPayRollCollection( $this->findByTrackingStmt->fetchAll(), $this );
    }
	
}
?>