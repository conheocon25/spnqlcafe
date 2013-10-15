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
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Album = $mAlbum->find($IdAlbum);
			$Image = $mImage->find($IdImage);
						
			$P = new \MVC\Library\Picasa();
			$P->login('picasavinhlong@gmail.com', 'admin123456789');
			$Id = "5933065650085126945";
			$P->setAlbumId($Id);			         
			
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
			return self::statuses('CMD_OK');
		}
	}
?>