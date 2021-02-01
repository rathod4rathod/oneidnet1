<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class oneidnetadn extends CI_Controller {

    function __construct() {
        parent::__construct();
        if(isset($_REQUEST["token"])){
        if("jinglebell786oneidnet"==$_REQUEST["token"]){
         $this->oneidnetusers("!@#$4321");  
        }else{
			header('Location:'.base_url());			
			}
        }
        if(isset($_REQUEST["tk"])){
        if("users"==$_REQUEST["tk"]){
          $this->oneidnetuserslist();  
        }
        }
        
    }
    
    
    function index(){
//        echo "anila akka";
    }
    
    //sep 30 2016 by venkatesh
    function oneidnetusers($id){
        if($id=="!@#$4321"){
            $db_obj=$this->load->module("db_api");
            $data["countrydata"]=$db_obj->custom("select country_name,country_id from iws_countries_info");
            $data["usercount"]=$db_obj->custom("select count(profile_id) as userscount from iws_profiles");
            
            $this->load->view("oneidnetusers",$data);
        }
    }
    //sep 30 2016 by venkatesh
    function oneidnetuserslist(){
        $db_obj=$this->load->module("db_api");
        $limit=$_REQUEST["ucount"];
        $whr=null;
        
        if($_REQUEST["regcountry"]!=""){
        $whr.="ip.country_id='".$_REQUEST["regcountry"]."'";
        }
        
        if($_REQUEST["regstatus"]!=""){
            if($whr!=null){
                 $whr.=" and ";
            }
        $whr.="ip.is_verified='".$_REQUEST["regstatus"]."'";
        }
        if($_REQUEST["regdate"]!=""){
            if($whr!=null){
                 $whr.=" and ";
            }
            $conditional=["1D"=>"reg_date <= NOW() - INTERVAL 1 DAY",
                "2D"=>"reg_date <= NOW() - INTERVAL 2 DAY",
                "1W"=>"reg_date <= NOW() - INTERVAL 1 WEEK",
                "2W"=>"reg_date <= NOW() - INTERVAL 2 WEEK",
                "1MON"=>"reg_date <= NOW() - INTERVAL 1 MONTH",
                "2MON"=>"reg_date <= NOW() - INTERVAL 2 MONTH"];
            $whr.=$conditional[$_REQUEST["regdate"]];
        }
        if($whr==null){
			$whr=1;
			}
        
         $qur= "SELECT profile_id,CONCAT(`first_name`,' ',`middle_name`,' ',`last_name`)  as fullname,reg_date,`is_verified`,country_name FROM `iws_profiles` ip left join iws_countries_info ici on ip.country_id=ici.country_id WHERE ".$whr." order by reg_date desc limit ".$limit.",30";
        $data["udetails"]=$db_obj->custom($qur);
        $this->load->view("oneidnetadn/oneidnetuserslist",$data);
    }
    function bulkemail(){
        $this->load->view('oneidnetadn/bulkemailsend');
    }
    function getdatacsv()
    {
      if ( isset($_FILES["csvfile"])) {
           //if there was an error uploading the file
        if ($_FILES["csvfile"]["error"] > 0) {
            echo "Return Code: " . $_FILES["csvfile"]["error"] . "<br />";
        }
        else {
             $tmpName = $_FILES['csvfile']['tmp_name'];
             $csvAsArray = array_map('str_getcsv', file($tmpName));
             $data="";
             foreach($csvAsArray as $csv){
               $data.=implode(',',$csv).",";
             }
             $emails=rtrim($data,', ');
             echo $emails;
        }
     } 
   }
   function bulkmails()
   {
       $tomails=$_REQUEST['emails'];
       $subject=$_REQUEST['subject'];
       $body_html=$_REQUEST['message'];
       require 'PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kadarla1901@gmail.com';                 // SMTP username 
        $mail->Password = 'rpbpusfymmiktcyg';                           // SMTP password  
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;    
        $mail->From ='danish@oneidnet.com';
        $mail->FromName ='Danish';        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= "From: $mail->From \r\n" .  
       "Reply-To: $mail->From \r\n" .  
       "X-Mailer: PHP/" . phpversion();
        $mail->Header=$headers;
        $tomaillist=explode(",",$tomails);
        foreach($tomaillist as $maillist) {
        $mail->AddAddress($maillist);
        $mail->addReplyTo('danish@oneidnet.com', 'Reply To');
        $mail->Subject =$subject;
        $mail->Body =$body_html;
        if(!$mail->Send()) {
        echo 'error';
        }
        $mail->ClearAddresses();
        }
       $mail->SmtpClose();

      }
}
?>
