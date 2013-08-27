<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Supplier extends Mapper implements \MVC\Domain\SupplierFinder {

    function __construct() {
        parent::__construct();
		$tblSupplier = "cafecoirieng_supplier";
						
		$selectAllStmt = sprintf("select * from %s ORDER BY name", $tblSupplier);
		$selectStmt = sprintf("select * from %s where id=?", $tblSupplier);
		$updateStmt = sprintf("update %s set name=?, phone=?, address=?, note=?, debt=? where id=?", $tblSupplier);
		$insertStmt = sprintf("insert into %s ( name, phone, address, note, debt ) 
							values( ?, ?, ?, ?, ?)", $tblSupplier);
		$deleteStmt = sprintf("delete from %s where id=?", $tblSupplier);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
		
    } 
    function getCollection( array $raw ) {
        return new SupplierCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\Supplier(
			$array['id'],
			$array['name'], 
			$array['phone'],	
			$array['address'],
			$array['note'],
			$array['debt']
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "Supplier";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array(  
			$object->getName(), 
			$object->getPhone(),	
			$object->getAddress(),	
			$object->getNote(),
			$object->getDebt()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getName(), 
			$object->getPhone(),
			$object->getAddress(),
			$object->getNote(),
			$object->getDebt(),
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
	function create( $prefix ){
		$tblSupplier = $prefix."supplier";
		$createStmt = sprintf("
			CREATE TABLE IF NOT EXISTS %s (
				`id` int(9) NOT NULL AUTO_INCREMENT,
				`name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				`phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
				`address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
				`note` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
				`debt` bigint(20) NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

			INSERT INTO %s (`id`, `name`, `phone`, `address`, `note`, `debt`) VALUES
			(1, 'Đại lý nước đá', '0703456456', 'Phường 4', 'Cung cấp nước đá', 0),
			(2, 'Tạp hóa', '0703367367', 'Phường 2', 'Cung cấp đường, trà', 0),
			(3, 'Đại lý nước ngọt', '0703277189', 'Phường 2', 'Cung cấp nước ngọt', 0),
			(4, 'Đại lý cafe', '0703124578', 'Phường 6', 'Cung cấp cafe hạt', 0);			
		", $tblSupplier, $tblSupplier);
		$this->createStmt = self::$PDO->prepare($createStmt);		
        $this->createStmt->execute( null );
		$this->createStmt->closeCursor();
    }
	function drop( $prefix ){
		$tblSupplier = $prefix."supplier";
		$dropStmt = sprintf("
			DROP TABLE %s", $tblSupplier);
		$this->dropStmt = self::$PDO->prepare($dropStmt);
        $this->dropStmt->execute( null );
		$this->dropStmt->closeCursor();
    }
}
?>