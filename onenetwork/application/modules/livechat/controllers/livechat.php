<?php

class livechat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->module("db_api");
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index($module, $subject_id, $sender_id) {
        $data["module"] = $module;
        $data["subject_id"] = $subject_id;
        $sender_id = $this->getprofileID($sender_id);
        $profile_info = $this->getprofileInfo($sender_id, $module);
        $data["load_messages"] = $this->getallChatMessages($subject_id);
        $data["sender_info"] = $profile_info;
        $data["user_id"] = $this->get_userId();
        $this->load->view("livechat/chat_edit",$data);
    }
    
    
    function getallChatMessages($subject_id){
        $db_obj = $this->load->module('db_api');
        $msgQry = "SELECT t.rec_aid, t.sent_on, t.message,t.sender_id_fk,t.receiver_id_fk FROM vcom_protalk t ".
                  "WHERE t.subject_id_fk = '".$subject_id."'";
        
        $sub_res = $db_obj->custom($msgQry);
        return $sub_res;
    }
    
    function getprofileID($reciever_id){
        $db_obj = $this->load->module('db_api');
        $msgQry = "SELECT profile_id FROM iws_profiles WHERE user_id = '".$reciever_id."' ";
        $sub_res = $db_obj->custom($msgQry);
        return $sub_res[0]["profile_id"];
    }
    
    function getprofileInfo($profile_id, $module){
        $db_obj = $this->load->module('db_api');
        if($module == "netpro")
            $dyncols = " nus.image_path ";
        else if($module == "oneshop") 
            $dyncols = " nus.profile_img as image_path ";
        else if($module == "dealerx") 
            $dyncols = " nus.profile_pic as image_path ";
        $msgQry = "SELECT ". $dyncols.",p.profile_id, CONCAT(p.first_name, ' ', p.middle_name, ' ',p.last_name) as prof_name FROM iws_profiles p ";
        if($module == "netpro")  
            $msgQry .= "INNER JOIN netpro_users_settings nus ON p.profile_id = nus.user_id_fk ";
        else if($module == "oneshop") 
            $msgQry .= "INNER JOIN os_user_details nus ON p.profile_id = nus.profile_id_fk ";
        else if($module == "dealerx") 
            $msgQry .= "INNER JOIN dx_users_details nus ON p.profile_id = nus.user_id_fk ";
        $msgQry .= "WHERE p.profile_id = '".$profile_id."' ";
        $sub_res = $db_obj->custom($msgQry);
        return $sub_res;
    }
    
    function insert_chat(){
        $db_obj = $this->load->module('db_api');
        $module = $_REQUEST["module"];
        $chat_text = $_REQUEST["chat_text"];
        $subject_id = $_REQUEST["subject_id"];
        $sender_id =  $this->get_userId();
        $reciever_id = $_REQUEST["reciever_id"];
        $insQry = "INSERT INTO vcom_protalk (subject_id_fk,message_type, message, module, sender_id_fk, receiver_id_fk,sent_on) VALUES
        ( '".$subject_id."',  'PLAINTEXT', '".addslashes($chat_text)."', '".strtoupper($module)."', '".$sender_id."', '".$reciever_id."', now())";
        $ins_res = $db_obj->custom($insQry);
    }
    
    function fullchat(){
        $db_obj = $this->load->module('db_api');
        $module = $_REQUEST["module"];
        $last_id = $_REQUEST["last_id"];
        $subject_id = $_REQUEST["subject_id"];
        $user_id =  $this->get_userId();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $profile_path_url = $protocol.$_SERVER['HTTP_HOST'].'/'.$module.'/';
               
        $msgQry = "SELECT t.rec_aid, t.sent_on, t.message,t.sender_id_fk,t.receiver_id_fk FROM vcom_protalk t ".
                  "WHERE t.subject_id_fk = '".$subject_id."' AND  module = '".strtoupper($module)."' AND t.rec_aid > $last_id ORDER BY t.rec_aid ASC";
        $sub_res = $db_obj->custom($msgQry);
        foreach($sub_res as $loadKey => $loadmsgVal){
         
            $sendProfData =  $this->getprofileInfo($loadmsgVal["sender_id_fk"],$module);
             if($user_id == $sendProfData[0]["profile_id"]){
                 $styleChng = "mat6";
             }
         ?>

         <div class="popup-new-livechat-box-main" id="msg_<?php echo $loadmsgVal['rec_aid'];?>">
         <div class="popup-new-livechat-leftthumb <?php echo $styleChng;?>"> 
         <?php if($user_id == $loadmsgVal["sender_id_fk"]){?>
             <p class="yellow"> Me : </p>
         <?php }else{
             if($module == "netpro" || $module == "dealerx") $pathProChk = "udata/avatar/mi/";
             else if($module == "oneshop") $pathProChk = "data/profile/mi/";
             ?>
             <img src="<?php echo  $profile_path_url.$pathProChk.$sendProfData[0]["image_path"];?>" class="popup-new-livechat-thumb-new">
         <?php }?>
         </div>
         <div class="popup-new-livechat-rightbox-container">

         <div class="wi100pstg fll">
         <p class="popup-new-livechat-rightbox-livechat-tex"><?php echo $loadmsgVal["message"];?> </p>
         </div>

         </div>
         </div>
     <?php }
    }
}
