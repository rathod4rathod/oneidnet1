<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader();
?>
</div>

<div class="clearfix"></div>
<div class="oneidapp_wrapper appcontainer">
<div class="app_header">
    <h1>Connect App name with ONEIDNET</h1>
  </div>

  <div class="appconnt_top">
    <div class="oneidnet_logoforapp"> <img src="<?php echo base_url(); ?>assets/basic_info/images/logo.png" /> </div>
    <div class="connected">
    	<div class="plug"><span class="firstchild"></span>
        <span class="secondchild"><p></p></span>
        	<h6>Connected</h6>
        </div>
    </div>
    <div class="app_logowithname"><img src="<?php echo base_url(); ?>assets/Images/iconapp.png" />
    	<h2>App Fake Name</h2>
    </div>
  </div>
  <div class="appconnt_middle integration_comp">
    	<div class=""><h1>Integration with App name completed</h1>
        	<p>You can check & control the permission of app from <a href="appdetails">here</a>.</p>
        </div>
    
  </div>
</div>
<!--module container end here-->
<div class="clearfix"></div>
<?php $this->templates->basic_info_footer();?>
<script src="<?php echo base_url()."assets/microjs/addcontacts.js"; ?>"></script>
