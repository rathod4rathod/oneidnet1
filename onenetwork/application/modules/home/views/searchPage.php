<?php
$this->load->module('templates');
$this->templates->header();
?>
<div class="codes_module_container_wrap"> <!--module_container start here-->
<div class="codes_wrapper-inner"><!--wrapper inner start here-->
<div class="isdes_nextbtn">&rsaquo;</div>
            <div class="isdes_prevbtn">&lsaquo;</div>            
            <div class="leftbar_slider_te"></div>
    <?php
  $this->templates->sliderTpl();
?><!--end slider-->      <div class="clearfix"></div>
<div class="codes_pagetitle">
<p>Companies List</p>
</div>
<div class="clearfix"></div>
<div class="co_searchbox">
<div class="left_co_search"><!--left search box start here-->
    <?php if($companiesData) {foreach($companiesData as $cdata){ ?>
        <!--company tthumb start here-->
         <a href="<?php echo base_url().'profile/companyProfile/'.$cdata['company_aid'];?>"><div class="codes_co_result_thumb"> 
          <p class="acenter wwp fs14 bold blue pat5"><?php echo $cdata['company_name']; ?></p>
         <p class="mat10"><img src="<?php if($cdata['logo_path']!=""){ echo base_url().'data/images/logo/mi/'.$cdata['logo_path'];}else{ echo base_url().'data/images/logo/mi/noimage.png';} ?>"></p>
         <p class="fs14 italic wwp pal5 mat5"> <?php echo $cdata['website']; ?></p>
         <p class="fs14  wwp pal5 mat5"><?php echo $cdata['enquiry_email']; ?></p>
         <p class="fs14  wwp pal5 mat5"><?php echo $cdata['company_phone']; ?></p>
         <p class="fs14  wwp pal5 mat5"><?php echo $cdata['landline_no']; ?></p>
             </div></a>
         <!--company thumb closed here-->
    <?php }}else{ ?>
         <div class="nodata"> No Data Found </div>
    <?php } ?>
 </div><!--left search box end here-->
<div class="right_co_search"><!--right search box start here-->
<img src="<?php echo base_url();?>assets/images/addone.jpg" alt="ad">
<img src="<?php echo base_url();?>assets/images/addtwo.jpg" alt="ad">
  </div><!--right search box end here-->
</div>
         <div class="clearfix"></div>
 <div class="clearfix"></div>   
</div> <!--module container closed here--> 
<?php
$this->load->module('templates');
$this->templates->footer();
?>
