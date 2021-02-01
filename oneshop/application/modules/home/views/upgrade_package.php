<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//var_dump($stores_data);
//echo $stores_data["price"];
$hstyl="";
$pstyl="";
$bstyl="";
switch ($stores_data["package_name"]){
  case "Basic":
    $bstyl="checked=true";
  break;
  case "Premium":
    $pstyl="checked=true";
  break;
  case "Hyper":
    $hstyl="checked=true";
  break;
}
$expire_date=$stores_data['expired_on'];
//echo $expire_date;
$expire_dt_arry=explode(" ",$expire_date);
$current_date=date("Y-m-d");
$date1=strtotime($current_date);
$date2=strtotime($expire_dt_arry[0]);
$dateDiff=abs($date1-$date2);
$fullDays=floor($dateDiff/(60*60*24));
$custom=$stores_data['package_id']."~".$store_id;
?> 
<style type="text/css">
.divTable { width: 600px; float: left;    left: 50%; display: table; margin: 40px 0 0 150px;}
.divTableRow {width: 600px; float: left; display: table-row; background-color: #eee; border-top:  solid 1px #aaa;}
.divTableCell{ padding: 10px 0 0 0; text-align: center; width:  200px; height: 35px; border-left: solid 1px #aaa;display: table-cell;  font: 16px Arial; color: #333;}
</style>
<div class="oneshop_contentSection">
  <?php
    if($fullDays>3){
      echo "<h2 style='text-align:center;'>Your package is active.Would you like to upgrade your package?</h2>";
    }
  ?>
<div class="oneshop_Header">    
  <h5>Select your package: </h5>
  <input type="radio" id="upgrade_package" class="upgrade_radioBtnlass" name="package_type" value="Basic" <?php echo $bstyl;?>>Basic
  <input type="radio" id="upgrade_package" class="upgrade_radioBtnClass" name="package_type" value="Premium" <?php echo $hstyl;?>>Premium
  <input type="radio" id="upgrade_package" class="upgrade_radioBtnClass" name="package_type" value="Hyper" <?php echo $hstyl;?>>Hyper
</div>

<div class="divTable" id="table_package">
    <input type="hidden" id="hstore_aid" name="hstore_aid" value="<?php echo $store_id?>"/>
    <div class="divTableRow">
        <div class="divTableCell">
            <b>Package</b>
        </div>
        <div class="divTableCell">
            <b>Space used</b>
        </div>
        <div class="divTableCell">
         <b>Amount</b>
        </div>        
    </div>
    <div id="table_row_data" class="divTableRow">        
      <div class="oneshop_upgradePackageResultRow">
          <input type="hidden" id="pckg_id" value="<?php echo $stores_data['package_id'];?>"/>
        <div class="oneshop_upGradePackageResultField" id="tblfield_1"><?php echo $stores_data["package_name"];?> </div>
        <div class="oneshop_upGradePackageResultField" id="tblfield_2"><?php echo $stores_data["space_storage"]." GB";?></div>
        <div class="oneshop_upGradePackageResultField" id="tblfield_3"><?php echo $stores_data["price"];?></div>
      </div>
    </div>
  <div class="oneshop_UpGradePackage">
	<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="sravya.n526-facilitator@gmail.com"><!--  sravya.n526@gmail.com  /  sravya.n526-facilitator@gmail.com merchant account details-->
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="amount" value="100">
      <input type="hidden" name="quantity" value="1">
      <input type="hidden" name="custom" value="<?php echo $custom;?>">
      <input type="hidden" name="return" value="<?php echo base_url().'home/upgradePkg'?>">
      <input type="hidden" name="notify_url" value="paypal/ipn.php">
      <input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
    <button class="oneshop_basicInfoBtn oneshop_upGradePackageBtn" >Proceed</button>	
	</form>
  </div>
</div>

</div>
<?php
$this->templates->app_footer();
?>
