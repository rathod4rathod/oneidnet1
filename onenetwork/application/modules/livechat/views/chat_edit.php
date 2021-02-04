<?php
$this->load->module('templates');
$this->templates->header();

if($module == "netpro" || $module == "oneshop" || $module == "dealerx"){
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $profile_path_url = $protocol.$_SERVER['HTTP_HOST'].'/'.$module.'/';
    
}
$chatobj = $this->load->module('livechat');
////
?>
<div class="new_wrapper">
     <div class="popup-new-livechat-mainwrapper" style="margin:20px;">
    <div class="db-box-title pu-bb">
          <h5> Live Chat With <?php echo $sender_info[0]["prof_name"];?> </h5>
          <div class="db-box-tools"> <a href="javascript:window.close();" class="close top-info-btn">Close</a> </div>
          <!--<div class="db-box-tools"> <a href="#" class="top-info-btn">SAVE</a> </div>-->
        </div>
        
    <div class="popup-new-livechat-container">
          
          
    <div class="popup-new-livechat-leftcontainer">
    <div class="popup-new-livechat-leftcontainer-insidebox" id="discussion">
        <p class="gray fs12 italic"> You are now connected to oneidnet </p>
    
    <?php foreach($load_messages as $loadKey => $loadmsgVal){
         
           $sendProfData =  $chatobj->getprofileInfo($loadmsgVal["sender_id_fk"]);
            if($user_id == $sendProfData[0]["profile_id"]){
                $styleChng = "mat6";
            }
            
        ?>
    
        <div class="popup-new-livechat-box-main" id="msg_<?php echo $loadmsgVal['rec_aid'];?>">
            
            <div class="fll">
                sdgasdg asgasdg
            </div>
            
        <div class="popup-new-livechat-leftthumb <?php echo $styleChng;?>"> 
        <?php if($user_id == $loadmsgVal["sender_id_fk"]){?>
            <p class="yellow"> Me : </p>
        <?php }else{
             $reciever_id = $loadmsgVal["sender_id_fk"];
             
             if($module == "netpro"|| $module == "dealerx") $pathProChk = "udata/avatar/mi/";
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
    <?php }?>


    
    
  

    </div>
    </div> 
    
    
   <form name="livechat" method="post">
       <input type="hidden" name="module" id="module" value="<?php echo $module;?>">
       <input type="hidden" id="base_url" name="base_url" value="<?php echo  base_url();?>">
      
       <input type="hidden" name="reciever_id" id="reciever_id" value="<?php echo $reciever_id;?>">
       <input type="hidden" id="subject_id" name="subject_id" value="<?php echo $subject_id;?>">
    <div class="popup-new-livechat-right-container-div">
    
    <div class="fll wi100pstg">
    <p class="fll wi100pstg">
        <textarea id="msg_data" class="oneshop_livechat_textarea" name="msg_data" maxlength="200"></textarea>
    </p>
    <p class="gray fs11 aright mat5" id="counter"> 200 Characters left </p>
    <input type="checkbox" name="enter_chk" id="enter_chk" checked>Press enter to send message.</p>
    <p class="wi100pstg flr overflow mat20"><input type="button" id="send_click" value="SEND" class="np_des_checkout_btn_new aright mal20" name="button"></p>
    </div>
    
   <!-- <div class="fll wi100pstg mat30 pab5">
	<p class="wi22 fll"> <a href="#"> <img src="<?php echo base_url();?>assets/images/call.png" title="Reject"> </a> </p>
	<p class="wi22 fll"> <a href="#"> <img src="<?php echo  base_url();?>assets/images/connect_icon.png" title="No Message"> </a>  </p>
	<p class="wi22 fll"> <a href="#"> <img src="<?php echo  base_url();?>assets/images/connect_icon.png" title="No Call">  </a> </p>
	</div>-->
    
    </div>
   </form>  
  </div>
  </div>
  </div>
<script type="text/javascript" src="<?php echo base_url() . "/application/modules/livechat/microjs/"; ?>livechat.js"></script>