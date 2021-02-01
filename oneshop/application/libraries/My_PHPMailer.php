<?php
/*********************************************************
 * Class:My_PHPMailer
 * Function: send_mail----to send mail to the recepient  
**********************************************************/
if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_PHPMailer {

  public function My_PHPMailer() {
    $path = BASEPATH . 'libraries/PHPMailer/PHPMailerAutoload.php';
    require_once($path);
  }
  /* Params:
   * $to----mailid to send mail to the recepient
   * $subject---- text for the subject in the mail
   * $mailmsg----body of the mail
   * $is_reply----mailid of the person to send reply sent by the recepient
   * $attach_files_path----path of the file to be sent as an attachment
   */
  function send_mail($to, $subject, $mailmsg,$is_reply='',$attach_files_path='') {
    $mail = new PHPMailer();
    $mail->isSMTP(); // we are going to use SMTP
    $mail->SMTPAuth = true; // enabled SMTP authentication
    /*$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
    $mail->Host = "oneidnetcom.ipage.com";      // setting GMail as our SMTP server
    $mail->Port = 465;                   // SMTP port to connect to GMail
    $mail->Username = "do-not-reply@oneidnet.com";  // user email address
    $mail->Password = "Ylper-ton-od@786";            // password in GMail*/
    $mail->SMTPSecure = 'starttls';  // prefix for secure protocol to connect to the server
    $mail->Host = "mail.oneidnet.com";//"oneidnetcom.ipage.com";      // setting GMail as our SMTP server
    $mail->Port = 587;                    // SMTP port to connect to GMail
    $mail->Username = "do-not-reply@oneidnet.com";  // user email address
    $mail->Password = "Ylper-ton-od@786";            // password in GMail
    $mail->IsHTML(true);
    //$mail->SMTPDebug   = 1;
    $mail->SetFrom('do-not-reply@oneidnet.com', 'ONEIDNET');  //Who is sending the email 
    if($is_reply!=""){
      $mail->AddReplyTo("do-not-reply@oneidnet.com","Lead");  //email address that receives the response
    }
    if($attach_files_path!=""){
      $mail->AddAttachment($attach_files_path);      // some attached files
    }
    $mail->Subject = $subject;
    $mail->Body = $mailmsg;
    //$mail->AltBody = "Plain text message";
    if(strpos($to,",")!=false){
      $to_address=explode(",",$to);
      for($i=0;$i<count($to_address);$i++){
        $to_email=$to_address[$i];
        $mail->addAddress($to_email);
      }
    }else{
      $mail->AddAddress($to);
    }
    //$mail->AddAttachment("images/phpmailer.gif");      // some attached files
    //$mail->AddAttachment("images/phpmailer_mini.gif"); // as many as you want
    $msg="";
    if (!$mail->send()) {      
      $msg="ERROR".$mail->ErrorInfo;
    } else {      
      $msg="SUCCESS";
    }
    return $msg;
  }

}
