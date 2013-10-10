<?php
	namespace MVC\Command;	
	class UploadingImage extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");	
			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();

			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
									
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
									
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if ($_FILES["FileUpload1"]["error"] <= 0){
				//echo "ten ne ".$_FILES["FileUpload1"]["name"];
				
				$file = "data/tmp/".$_FILES["FileUpload1"]["name"];
				move_uploaded_file($_FILES["FileUpload1"]["tmp_name"], $file );
				$P = new \MVC\Library\Picasa();
				$P->login('picasavinhlong@gmail.com', 'admin123456789');
				$Id = $P->addAlbum("Cafe Van Xuan");
				$P->setAlbumId($Id);
				$Arr = $P->upload($file);
				unlink($file);
				print_r($Arr);
			}
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
						
			$json = array('result' => "OK");
			echo json_encode($json);
		}
	}
?>