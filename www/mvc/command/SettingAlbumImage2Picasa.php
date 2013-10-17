<?php
	namespace MVC\Command;	
	class SettingAlbumImage2Picasa extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");	
			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdAlbum = $request->getProperty('IdAlbum');
			$IdImage = $request->getProperty('IdImage');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mAlbum = new \MVC\Mapper\Album();
			$mImage = new \MVC\Mapper\Image();
			$mConfig = new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$PUser 		= $mConfig->findByName("PICASA_USER");
			$PPassword 	= $mConfig->findByName("PICASA_PASSWORD");
			
			$Album = $mAlbum->find($IdAlbum);
			$Image = $mImage->find($IdImage);
						
			$P = new \MVC\Library\Picasa();
			$P->login( $PUser->getValue(), $PPassword->getValue() );			
			
			$IdAbum = $Album->getStore()->getIdPicasaAlbum();			
			$P->setAlbumId($IdAbum);
			
			$file = "mvc/library/image/upload/".$Image->getName();			
			$Arr = $P->upload($file);
			unlink($file);
			
			$Image->setURL($Arr[3]);
			$Image->setNote("Picasa");									
			$Image->setKey($Arr[0]);
			$mImage->update($Image);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$json = array('result' => "OK");
			echo json_encode($json);
		}
	}
?>