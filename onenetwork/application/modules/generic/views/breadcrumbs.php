<?php
$moduleurl_arry=  explode("/", $module_url);
$arry_len=count($moduleurl_arry);
$parenturl=$moduleurl_arry[$arry_len-1];
$header_arry=explode("_",$promotion_type);
$header_str= ucwords(str_replace("_", " ", $promotion_type))." Promotions";
$title=  ucfirst($header_arry[1])." Promotions";
?>
<h1 class="normal fs24" style="width:880px; border-bottom:1px #ccc solid; padding:0 0 10px 0; line-height:32px;"> <?php echo $header_str;?> </h1>
<div style="width:880px; padding:0 0 5px 0; margin:20px 0 0 0; line-height:24px;" class="bold borderbottom">
    <span> <a href="<?php echo base_url().$moduleurl_arry[0];?>"> <?php echo ucwords($moduleurl_arry[0]);?> </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span> 
    <span> <a href="javascript:void(0)"> <?php echo $header_arry[0];?> </a> &nbsp;&nbsp;&gt;&nbsp;&nbsp; </span>
    <span> <a href="<?php echo base_url().$moduleurl;?>"> <?php echo $title;?> </a></span>
</div>
<p class="fs18 fll mat30 bgcolorc3 wi100pstg"> 
    <span class="fll"> <img  src="<?php echo base_url(); ?>assets/images/clickLogo.png" width="22" height="22"> </span> 
    <span class="fll mal10"> Complete your Campaign </span>  
</p>