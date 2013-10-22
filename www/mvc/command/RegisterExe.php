<?php
	namespace MVC\Command;	
	use MVC\Library\Encrypted;
	use MVC\Library\Mail;
	class RegisterExe extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------			
			$EmailRegister = $request->getProperty('EmailRegister');
			
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			//base64_decode($str)
			//base64_encode($str)
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			if (isset($EmailRegister)){				
				//lấy ngày hiện tại
					$Today = \getdate();
					$CurDateTime = $Today['year']."-".$Today['mon']."-".$Today['mday']." ".$Today['hours'].":".$Today['minutes'].":".$Today['seconds'];
					//Gửi mail về Admin
					$EncodeEmail = base64_encode($EmailRegister);
					$AdminMailName = "Đăng ký sử dụng Hệ Thống Quán Cafe";
					$AdminMail ="contact@quanly-cuahang.com";			
					$MailSubject = "Đăng ký sử dụng vào ngày $CurDateTime";
					$MailContent = "Bạn hoàn thành việc đăng ký sử dụng hệ thống quán Cafe bạn click và link này <br /> http://www.quanly-cafe.com/xac-nhan/$EncodeEmail   xác nhận email với hệ thống! <br /> Cám ơn bạn đã đăng ký sử dụng hệ thống!";
					//Mail($smtp_host, $admin_email, $smtp_username, $smtp_password);
					$mMail = new Mail('mail.quanly-cuahang.com', 'contact@quanly-cuahang.com', 'contact@quanly-cuahang.com', 'admin123456');
					$mMail->SendMail( $AdminMailName, $AdminMail, $EmailRegister, $MailSubject, $MailContent);
					$mMail->SendMail( $AdminMailName, $AdminMail, 'tuanbuithanh@gmail.com', $MailSubject, $MailContent);
					$mMail->SendMail( $AdminMailName, $AdminMail, 'thanhbao2007vl@gmail.com', $MailSubject, $MailContent);
					return self::statuses('CMD_OK');
					
			}
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			return self::statuses('CMD_OK');
		}
	}
?>