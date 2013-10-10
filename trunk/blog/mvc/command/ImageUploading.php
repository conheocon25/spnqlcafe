<?php
	namespace MVC\Command;	
	class ImageUploading extends Command {
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
			$Name = $request->getProperty('Name1');
			$Note = $request->getProperty('Note1');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mBAlbum = new \MVC\Mapper\BAlbum();
			$mBImage = new \MVC\Mapper\BImage();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Album = $mBAlbum->find($IdAlbum);
			
			if ($_FILES["FileUpload1"]["error"] <= 0){								
				$file = "data/tmp/".$_FILES["FileUpload1"]["name"];
				move_uploaded_file($_FILES["FileUpload1"]["tmp_name"], $file );
				$P = new \MVC\Library\Picasa();
				$P->login('picasavinhlong@gmail.com', 'admin123456789');
				$Id = "5933065650085126945";
				$P->setAlbumId($Id);
				$Arr = $P->upload($file);
				unlink($file);
				
				$Image = new \MVC\Domain\BImage(
					null,
					$IdAlbum,
					$Name,
					date('Y-m-d H:i:s'),
					$Arr[3],
					$Note,
					$Arr[0]
				);
				$mBImage->insert($Image);
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty("IdAlbum", $IdAlbum);
			$request->setProperty("IdKey", $Album->getCustomer()->getKey() );
			
			return self::statuses('CMD_OK');
		}
	}
?>