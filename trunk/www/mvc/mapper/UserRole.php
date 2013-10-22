<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class UserRole extends Mapper implements \MVC\Domain\UserRoleFinder {

    function __construct() {
        parent::__construct();
				
		$tblUserRole = "tbl_user_role";
		
		$selectAllStmt = sprintf("select * from %s", $tblUserRole);
		$selectStmt = sprintf("select *  from %s where id=?", $tblUserRole);
		$updateStmt = sprintf("update %s set name=? where id=?", $tblUserRole);
		$insertStmt = sprintf("insert into %s ( name) values(?)", $tblUserRole);
		$deleteStmt = sprintf("delete from %s where id=?", $tblUserRole);
						
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);						
    } 
    function getCollection( array $raw ) {return new UserRoleCollection( $raw, $this );}

    protected function doCreateObject( array $array ) {
        $obj = new \MVC\Domain\UserRole( 
			$array['id'],				
			$array['name']			
		);
        return $obj;
    }
    protected function targetClass() {return "UserRole";}
    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(		
			$object->getName()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getName(),			
			$object->getId()
		);		
        $this->updateStmt->execute( $values );
    }
	protected function doDelete(array $values) {return $this->deleteStmt->execute( $values );}
    function selectStmt() {return $this->selectStmt;}    
	function selectAllStmt() {return $this->selectAllStmt;}
}
?>