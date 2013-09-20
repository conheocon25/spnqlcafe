<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class PaidEmployee extends Mapper implements \MVC\Domain\PaidEmployeeFinder{

    function __construct() {
        parent::__construct();
				
		$tblPaidEmployee = "demo1_paid_employee";
		
		$selectAllStmt = sprintf("select * from %s", $tblPaidEmployee);
		$selectStmt = sprintf("select * from %s where id=?", $tblPaidEmployee);
		$updateStmt = sprintf("update %s set idemployee=?, date=?, value=?, note=? where id=?", $tblPaidEmployee);
		$insertStmt = sprintf("insert into %s (idemployee, date, value, note) values(?,?,?,?)", $tblPaidEmployee);
		$deleteStmt = sprintf("delete from %s where id=?", $tblPaidEmployee);
		$findByStmt = sprintf("select * from %s where idemployee = ? order by date DESC", $tblPaidEmployee);
		$findByTop10Stmt = sprintf("select * from %s where idemployee = ? order by date DESC LIMIT 10", $tblPaidEmployee);
		
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
		, $tblPaidEmployee);
		$findByTracking1Stmt = sprintf(
			"select
				*
			from 
				%s
			where
				idemployee=? AND date >= ? AND date <= ?
			order by 
				date DESC
			"
		, $tblPaidEmployee);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		$this->findByStmt = self::$PDO->prepare($findByStmt);
		$this->findByTop10Stmt = self::$PDO->prepare($findByTop10Stmt);
		$this->findByTrackingStmt = self::$PDO->prepare($findByTrackingStmt);
		$this->findByTracking1Stmt = self::$PDO->prepare($findByTracking1Stmt);		
    } 
    function getCollection( array $raw ) {
        return new PaidEmployeeCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\PaidEmployee( 
			$array['id'],
			$array['idemployee'],
			$array['date'],
			$array['value'],
			$array['note']
		);
        return $obj;
    }

    protected function targetClass() {        
		return "PaidEmployee";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdEmployee(),
			$object->getDate(),
			$object->getValue(),
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
			$object->getValue(),
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
        return new PaidEmployeeCollection( $this->findByStmt->fetchAll(), $this );
    }
	
	function findByTop10($values ){
        $this->findByTop10Stmt->execute( $values );
        return new PaidEmployeeCollection( $this->findByTop10Stmt->fetchAll(), $this );
    }
	
	function findByTracking($values ){
        $this->findByTrackingStmt->execute( $values );
        return new PaidEmployeeCollection( $this->findByTrackingStmt->fetchAll(), $this );
    }
	
	function findByTracking1($values ){
        $this->findByTracking1Stmt->execute( $values );
        return new PaidEmployeeCollection( $this->findByTracking1Stmt->fetchAll(), $this );
    }
	
}
?>