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
			$mAlbum = new \MVC\Mapper\Album();
			$mImage = new \MVC\Mapper\Image();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Album = $mAlbum->find($IdAlbum);
			
			if ($_FILES["FileUpload1"]["error"] <= 0){								
				$file = "data/tmp/".$_FILES["FileUpload1"]["name"];
				move_uploaded_file($_FILES["FileUpload1"]["tmp_name"], $file );
				$P = new \MVC\Library\Picasa();
				$P->login('picasavinhlong@gmail.com', 'admin123456789');
				$Id = "5933065650085126945";
				$P->setAlbumId($Id);
				$Arr = $P->upload($file);
				unlink($file);
				
				$Image = new \MVC\Domain\Image(
					null,
					$IdAlbum,
					$Name,
					date('Y-m-d H:i:s'),
					$Arr[3],
					$Note,
					""
				);
				$Image->reKey();
				$mImage->insert($Image);
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$json = array('result' => "OK");
			echo json_encode($json);
		}
	}
?>