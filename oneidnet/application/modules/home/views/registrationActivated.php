<?php
$this->load->module("templates");
//$this->templates->basic_info_header();
?>

<style>
.registration_activated{ position:relative; text-align:center; padding:0px 2%; font-family:Arial, Helvetica, sans-serif; padding-top:60px;}
.registration_activated .success{position:relative; text-align:center;}
.registration_activated .success h2{ font-size:30px; color:#333; font-weight:normal; margin:10px 0px 40px;}
.registration_activated .activate_message{ display:inline-block; background:#f0fafd; padding:15px; font-size:15px; color:#353535; -webkit-border-radius:25px; -moz-border-radius:25px; border-radius:25px; border:2px solid #c7dae0; }
.registration_activated .activate_message a{color:#1779d0; text-decoration:none;}
</style>
</div>

<div class="registration_activated">

	<div class="success">
    <img src="<?php echo base_url(); ?>assets/Images/success.png" />
    <h2><?php echo $msg; ?></h2>
    <div class="activate_message"><a href="<?PHP echo base_url();?>">Click here</a> to go ONEIDNET</div>
    </div>
    
</div>


