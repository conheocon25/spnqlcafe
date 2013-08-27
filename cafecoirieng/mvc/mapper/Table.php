<?php
namespace MVC\Mapper;

require_once( "mvc/base/Mapper.php" );
class Table extends Mapper implements \MVC\Domain\UserFinder {

    function __construct() {
        parent::__construct();
				
		$tblTable = "cafecoirieng_table";
		$tblSession = "cafecoirieng_session";
		$tblSessionDetail = "cafecoirieng_session_detail";
				
		$selectAllStmt = sprintf("select * from %s", $tblTable);								
		$selectStmt = sprintf("select * from %s where id=?", $tblTable);
		$updateStmt = sprintf("update %s set iddomain=?, name=?, iduser=?, type=? where id=?", $tblTable);
		$insertStmt = sprintf("insert into %s (iddomain, name, iduser, type) values(?, ?, ?, ?)", $tblTable);
		$deleteStmt = sprintf("delete from %s where id=?", $tblTable);
		$findByDomainStmt = sprintf("select id, iddomain, name, iduser, type from %s where iddomain =?", $tblTable);
		
		$findNonGuestStmt = sprintf("
							SELECT
								*	 
							FROM %s T
							WHERE 
								iddomain=? AND
								(
									select S.status
									from %s S
									where T.id = S.idtable
									order by datetime DESC
									LIMIT 1
								) <> 0
		", $tblTable, $tblSession);
		
		$findAllNonGuestStmt = sprintf("
			SELECT
				*	 
			FROM %s T
			WHERE 				
			(
				SELECT S.status
				from %s S
				where T.id = S.idtable
				order by datetime DESC
				LIMIT 1
			) <> 0
		", $tblTable, $tblSession);
		
		$findGuestStmt = sprintf("
							SELECT
								*	 
							FROM %s T
							WHERE 
								iddomain=? AND
								(
									SELECT S.status
									from %s S
									where T.id = S.idtable
									order by datetime DESC
									LIMIT 1
								) = 0
		", $tblTable, $tblSession);
		
		$findAllGuestStmt = sprintf("
			SELECT
				*	 
			FROM %s T
			WHERE
			(
				SELECT S.status
				FROM %s S
				WHERE T.id = S.idtable
				GROUP BY S.datetime DESC
				LIMIT 1
			) = 0
		", $tblTable,  $tblSession);
		
        $this->selectAllStmt = self::$PDO->prepare($selectAllStmt);
        $this->selectStmt = self::$PDO->prepare($selectStmt);
        $this->updateStmt = self::$PDO->prepare($updateStmt);
        $this->insertStmt = self::$PDO->prepare($insertStmt);
		$this->deleteStmt = self::$PDO->prepare($deleteStmt);
							
		$this->findByDomainStmt = self::$PDO->prepare($findByDomainStmt);							
		$this->findNonGuestStmt = self::$PDO->prepare($findNonGuestStmt);		
		$this->findAllNonGuestStmt = self::$PDO->prepare($findAllNonGuestStmt);
		$this->findGuestStmt = self::$PDO->prepare($findGuestStmt);
		$this->findAllGuestStmt = self::$PDO->prepare($findAllGuestStmt);
	
    } 
    function getCollection( array $raw ) {
        return new TableCollection( $raw, $this );
    }

    protected function doCreateObject( array $array ) {		
        $obj = new \MVC\Domain\Table( 
			$array['id'],
			$array['iddomain'],				
			$array['name'],
			$array['iduser'],
			$array['type']
		);
        return $obj;
    }
	
    protected function targetClass() {        
		return "Table";
    }

    protected function doInsert( \MVC\Domain\Object $object ) {
        $values = array( 
			$object->getIdDomain(),
			$object->getName(),
			$object->getIdUser(),
			$object->getType()
		); 
        $this->insertStmt->execute( $values );
        $id = self::$PDO->lastInsertId();
        $object->setId( $id );
    }
    
    protected function doUpdate( \MVC\Domain\Object $object ) {
        $values = array(
			$object->getIdDomain(),
			$object->getName(),
			$object->getIdUser(),
			$object->getType(),
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
	
	function findByDomain($values ) {	
        $this->findByDomainStmt->execute( $values );
        return new TableCollection( $this->findByDomainStmt->fetchAll(), $this );
    }
	function findNonGuest($values ) {	
        $this->findNonGuestStmt->execute( $values );
        return new TableCollection( $this->findNonGuestStmt->fetchAll(), $this );
    }
	function findAllNonGuest($values ) {
        $this->findAllNonGuestStmt->execute( $values );
        return new TableCollection( $this->findAllNonGuestStmt->fetchAll(), $this );
    }
	
	function findGuest($values ) {	
        $this->findGuestStmt->execute( $values );
        return new TableCollection( $this->findGuestStmt->fetchAll(), $this );
    }
	function findAllGuest($values ){
        $this->findAllGuestStmt->execute( $values );
        return new TableCollection( $this->findAllGuestStmt->fetchAll(), $this );
    }
	
	function create( $prefix ){
		$tblTable = $prefix."table";
		$tblDomain = $prefix."domain";
		$createStmt = sprintf("
			CREATE TABLE IF NOT EXISTS %s (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`iddomain` int(11) NOT NULL,
				`name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
				`iduser` int(11) DEFAULT NULL,
				`type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
				PRIMARY KEY (`id`),
				KEY `iddomain` (`iddomain`)
			)ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

			INSERT INTO %s (`id`, `iddomain`, `name`, `iduser`, `type`) VALUES
			(1, 1, 'Ban 01', 0, 'VIP'),
			(2, 1, 'Bàn 02', 0, 'VIP'),
			(3, 1, 'Bàn 03', 0, 'VIP'),
			(4, 1, 'Ban 04', 0, 'Thường'),
			(5, 1, 'Ban 05', 0, 'Thường'),
			(6, 1, 'Ban 06', 0, 'Thường'),
			(7, 1, 'Ban 07', 0, 'Thường'),
			(8, 1, 'Ban 08', 0, 'Thường'),
			(9, 1, 'Ban 09', 0, 'Thường'),
			(10, 1, 'Ban 10', 0, 'Thường'),
			(11, 1, 'Ban 11', 0, 'VIP'),
			(12, 1, 'Ban 12', 0, 'VIP'),
			(13, 1, 'Ban 13', 0, 'VIP'),
			(14, 2, 'Ban 14', 0, 'Thường'),
			(15, 2, 'Ban 15', 0, 'Thường'),
			(16, 2, 'Ban 16', 0, 'Thường'),
			(17, 2, 'Ban 17', 0, 'Thường'),
			(18, 2, 'Ban 18', 0, 'Thường'),
			(19, 2, 'Ban 19', 0, 'Thường'),
			(20, 2, 'Ban 20', 0, 'Thường'),
			(21, 2, 'Ban 21', 0, 'Thường'),
			(22, 2, 'Ban 22', 0, 'Thường'),
			(23, 2, 'Ban 23', 0, 'Thường'),
			(24, 2, 'Ban 24', 0, 'Thường'),
			(25, 2, 'Ban 25', 0, 'Thường'),
			(26, 3, 'Ban 26', 0, 'Thường'),
			(27, 3, 'Ban 27', 0, 'Thường'),
			(28, 3, 'Ban 28', 0, 'Thường'),
			(29, 3, 'Ban 29', 0, 'Thường'),
			(30, 3, 'Ban 30', 0, 'Thường'),
			(31, 3, 'Ban 31', 0, 'Thường'),
			(32, 3, 'Ban 32', 0, 'Thường'),
			(33, 3, 'Ban 33', 0, 'Thường'),
			(34, 3, 'Ban 34', 0, 'Thường'),
			(35, 3, 'Ban 35', 0, 'Thường'),
			(36, 3, 'Ban 36', 0, 'Thường'),
			(37, 3, 'Ban 37', 0, 'Thường'),
			(38, 3, 'Ban 38', 0, 'Thường'),
			(39, 3, 'Ban 39', 0, 'Thường'),
			(40, 3, 'Ban 40', 0, 'Thường'),
			(41, 4, 'Ban 41', 0, 'VIP'),
			(42, 4, 'Ban 42', 0, 'VIP'),
			(43, 4, 'Ban 43', 0, 'VIP'),
			(44, 4, 'Ban 44', 0, 'Thường'),
			(45, 4, 'Ban 45', 2, 'Thường'),
			(46, 4, 'Ban 46', 2, 'Thường'),
			(47, 4, 'Ban 47', 2, 'Thường'),
			(48, 4, 'Ban 48', 2, 'Thường'),
			(49, 4, 'Ban 49', 2, 'Thường'),
			(50, 4, 'Ban 50', 0, 'Thường'),
			(51, 4, 'Ban 51', 0, 'Thường'),
			(52, 4, 'Ban 52', 0, 'Thường')
		;
		ALTER TABLE %s
			ADD CONSTRAINT %s 
				FOREIGN KEY (`iddomain`) 
				REFERENCES %s (`id`) 
				ON DELETE CASCADE ON UPDATE CASCADE;
		", $tblTable, $tblTable, $tblTable, $tblTable."_1", $tblDomain);
		$this->createStmt = self::$PDO->prepare($createStmt);		
        $this->createStmt->execute( null );
		$this->createStmt->closeCursor();
    }
	function drop( $prefix ){
		$tblTable = $prefix."table";
		$dropStmt = sprintf("
			DROP TABLE %s", $tblTable);
		$this->dropStmt = self::$PDO->prepare($dropStmt);
        $this->dropStmt->execute( null );
		$this->dropStmt->closeCursor();
    }
}
?>