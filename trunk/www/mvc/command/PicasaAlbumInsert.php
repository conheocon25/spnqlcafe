<?php
	namespace MVC\Command;	
	class PicasaAlbumInsert extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");	
			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$Name = $request->getProperty('Name');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$PicasaUser 	= $mConfig->findByName("PICASA_USER");
			$PicasaPassword = $mConfig->findByName("PICASA_PASSWORD");
			
			$P = new \MVC\Library\Picasa();
			$P->login($PicasaUser->getValue(), $PicasaPassword->getValue());
			$Id = $P->addAlbum($Name);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			//$json = array('IdPicasaALbum' => $Id);
			echo $Id;
		}
	}
?>