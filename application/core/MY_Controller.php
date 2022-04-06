<?php
class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    public function send_email($data){
		extract($data);
		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();

		$mail->IsSMTP();
		$mail->Mailer = "smtp";
	    //$mail->SMTPDebug  = 1;  
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = "era.needs.uae@gmail.com";
		$mail->Password   = "eraneeds123";
	
	
		$mail->smtpConnect(
			array(
				"ssl" => array(
					"verify_peer" => false,
					"verify_peer_name" => false,
					"allow_self_signed" => true
					)
				)
			);
	
	
	  $mail->setFrom('era.needs.uae@gmail.com','WED');
	
	  if(isset($to)){
	
	  if(!is_array($to)) {
	  $mail->addAddress($to);
	
	  } else {
	  foreach($to as $email) {
	  $mail->addAddress($email);
	  }
	
	  }
	
	  }
	
	  if(isset($bcc)) {
	
	  if(!is_array($bcc)) {
	  $mail->AddBCC($bcc);
	
	  } else {
	  foreach($bcc as $bcc_email) {
	  $mail->AddBCC($bcc_email);
	  }
	
	  }
	
	  }
	
	
	  $mail->isHTML(true);                           
	  $mail->Subject = $subject;
	  $mail->Body    =$body;
	  $mail->AltBody = '';
	
	return $mail->Send();
	}
}

