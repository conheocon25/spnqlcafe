<?php
namespace MVC\Mapper;
require_once( "mvc/base/Mapper.php" );
class Employee extends Mapper implements \MVC\Domain\EmployeeFinder{

    function __construct() {
        parent::__construct();
				
		$tblEmployee = "cafedemo_employee";
						
		$selectAllStmt = sprintf("select * from %s", $tblEmployee);
		$selectStmt = sprintf("select * from %s where id=?", $tblEmployee);
		$updateStmt = sprintf("update %s set name=?, gender=?, job=?, phone=?, address=? where id=?", $tblEmployee);
		$insertStmt = sprintf("insert into %s (name, gender, job, phone, address) values(?, ?, ?, ?, ?)", $tblEmployee);
		$deleteStmt = sprintf("delete from %s where id=?", $tblEmployee);
				
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
			
    } 
    function getCollection( array $raw ) {
        return new EmployeeCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\Employee( 
			$array['id'],			
			$array['name'],
			$array['gender'],
			$array['job'],
			$array['phone'],			
			$array['address']
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "Employee";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 			
			$object->getName(),
			$object->getGender(),
			$object->getJob(),
			$object->getPhone(),			
			$object->getAddress()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(			
			$object->getName(),
			$object->getGender(),
			$object->getJob(),
			$object->getPhone(),
			$object->getAddress(),
			$object->getId()
		);		
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {
        return $this->deleteStmt->execute( $values );
    }
    function selectStmt() {return $this->selectStmt;}
    function selectAllStmt() {return $this->selectAllStmt;}
	
}
?>