<?php
$this->load->module('templates');
$this->templates->header();
?>
<link href="<?php echo base_url();?>assets/css/pagination.css" rel="stylesheet" />
<style>
 .codes_wrapper-inner {
  background: rgba(108, 122, 137, 0.7);
  width: 900px;
   margin: 0 auto; 
  padding-bottom: 10px;
}
.codes_upgradepackage_wrap {
   width: 880px;
  /* margin: 10px; */
  padding: 10px;
  overflow: hidden;
  display: block;
  background: rgba(225,225,225,0.1);
}
.codes_upgraderight {
  width: 250px;
  float: left;
}
</style>
<div class="codes_module_container_wrap"> <!--module_container start here-->
<div class="codes_wrapper-inner"><!--wrapper inner start here-->
<!--home slider start here-->
<div class="codes_upgradepackage_wrap">
<input type="hidden" id="arrData" value="<?php echo $arr;?>">
<script>
$(document).ready(function(){
jobChangePagination('0');    
});
</script>
<div class="codes_upgradeleft">
</div>
<div class="codes_upgraderight">
<img alt="ad" src="<?php echo base_url(); ?>assets/images/addtwo.jpg">
</div>
</div>
   <div class="clearfix"></div>   
</div> <!--module container closed here--> 
<!--home slider closed here-->
<?php
$this->load->module('templates');
$this->templates->footer();
?>
