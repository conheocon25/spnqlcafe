<?php
Namespace MVC\Domain;
require_once( "mvc/base/domain/DomainObject.php" );

class Post extends Object{
    private $Id;
	private $IdStore;
	private $Author;
	private $Date;
	private $Content;
	private $Title;
	private $Type;
	private $Key;
	
	//-------------------------------------------------------------------------------
	//ACCESSING MEMBER PROPERTY
	//-------------------------------------------------------------------------------
    function __construct( $Id=null, $IdStore=null, $Author=Null, $Date=Null, $Content=null, $Title=null, $Type=null, $Key=null){
        $this->Id 		= $Id;
		$this->IdStore 	= $IdStore;
		$this->Author 	= $Author;
		$this->Date 	= $Date;
		$this->Content 	= $Content;
		$this->Title 	= $Title;
		$this->Type 	= $Type;
		$this->Key 		= $Key;
		
        parent::__construct( $Id );
    }
	function setId($Id) {$this->Id = $Id; $this->markDirty();}	
    function getId() {return $this->Id;}
	
	function setIdStore($IdStore) {$this->IdStore = $IdStore; $this->markDirty();}	
    function getIdStore() {return $this->IdStore;}	
	function getStore(){
		$mStore = new \MVC\Maper\Store();
		$Store = $mStore->find($this->IdStore);
		return $Store;
	}
	
	function setAuthor( $Author ){$this->Author = $Author;$this->markDirty();}   
	function getAuthor( ) {return $this->Author;}
	
	function setDate( $Date ){$this->Date = $Date;$this->markDirty();}   
	function getDate( ) {return $this->Date;}
	function getDatePrint( ){$D = new \MVC\Library\Date($this->Date);return $D->getDateFormat();}
	
	function setContent( $Content ){$this->Content = $Content;$this->markDirty();}   
	function getContent( ) {return $this->Content;}
	
	function setTitle( $Title ){$this->Title = $Title;$this->markDirty();}   
	function getTitle( ) {return $this->Title;}	
	function getTitleReduce(){$S = new \MVC\Library\String($this->Title);return $S->reduce(45);}
	
	function setType( $Type ){$this->Type = $Type;$this->markDirty();}   
	function getType( ) {return $this->Type;}
	function isVIP(){if ($this->Type == 1)return true;return false;}
	
	function getImage(){		
		$first_img = '';
		\ob_start();
		\ob_end_clean();
		if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $this->Content, $matches)){
			$first_img = $matches[1][0];
		}
		else {
			$first_img = "/data/images/news.jpg";
		}
		return $first_img;
	}
	
	function setKey( $Key ){$this->Key = $Key;$this->markDirty();}
	function getKey( ) {return $this->Key;}
	function reKey( ){
		$Str = new \MVC\Library\String($this->Title." ".$this->getId());
		$this->Key = $Str->converturl();
	}		
	function getContentReduce(){$S = new \MVC\Library\String($this->Content);return $S->reduceHTML(320);}
	
	function toJSON(){
		$json = array(
			'Id' 			=> $this->getId(),
			'IdStore' 		=> $this->getIdStore(),
			'Author' 		=> $this->getAuthor(),
			'Date' 			=> $this->getDate(),
			'Content' 		=> $this->getContent(),
			'Title' 		=> $this->getTitle(),
			'Type' 			=> $this->getType(),
			'Key'			=> $this->getKey()
		);
		return json_encode($json);
	}
	
	function setArray( $Data ){        
		$this->Id 		= $Data[0];
		$this->IdStore	= $Data[1];
		$this->Author 	= $Data[2];
		$this->Date 	= date('Y-m-d H:i:s');
		$this->Content	= $Data[3];
		$this->Title 	= $Data[4];
		$this->Type 	= $Data[5];
		$this->reKey();		
    }			
	//-------------------------------------------------------------------------------
	//DEFINE URL
	//-------------------------------------------------------------------------------
				
	//--------------------------------------------------------------------------
    static function findAll() {$finder = self::getFinder( __CLASS__ ); return $finder->findAll();}
    static function find( $Id ) {$finder = self::getFinder( __CLASS__ ); return $finder->find( $Id );}
	
}
?>