<?php
	namespace MVC\Command;
	use MVC\Library\Mail;
	class ContactInsExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			$Email = $request->getProperty('inputEmail');
			$Name = $request->getProperty('inputName');			
			$Address = $request->getProperty('inputCity');			
			$Subject = $request->getProperty('Subject');
			$Comment = $request->getProperty('comments');	

			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
					
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			
				if ($Email != ""){				
					//lấy ngày hiện tại
					$Today = \getdate();
					$CurDateTime = $Today['year']."-".$Today['mon']."-".$Today['mday']." ".$Today['hours'].":".$Today['minutes'].":".$Today['seconds'];
					//Gửi mail về Admin
					$AdminMailName = "Liên Hệ Quản lý Karaoke - Cửa hàng";
					$AdminMail ="contact@quanly-cuahang.com";			
					$MailSubject = "Quản lý Karaoke: ngày $CurDateTime - Khách hàng: $Name";
					$MailContent = "Khách Hàng: $Name <br /> Email: $Email <br /> Địa chỉ: $Address <br /> Ghi Chú: $Comment";
					//Mail($smtp_host, $admin_email, $smtp_username, $smtp_password);
					$mMail = new Mail('localhost', 'contact@quanly-cuahang.com', 'contact@quanly-cuahang.com', 'admin123456');
					$mMail->SendMail( $AdminMailName, $AdminMail, 'thanhbao2007vl@gmail.com', $MailSubject, $MailContent);
					$mMail->SendMail( $AdminMailName, $AdminMail, 'tuanbuithanh@gmail.com', $MailSubject, $MailContent);
					return self::statuses('CMD_OK');
				}
				return self::statuses('CMD_OK');
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			
		}
	}
?>