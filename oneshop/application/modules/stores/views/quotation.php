<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->mystore_Menu();
?>
<style type="text/css">
.divTable { width: 600px; float: left;    left: 50%; display: table; margin: 40px 0 0 150px;}
.divTableRow {width: 600px; float: left; display: table-row; background-color: #eee; border-top:  solid 1px #aaa;}
.divTableCell{ padding: 10px 0 0 0; text-align: center; width:  200px; height: 35px; border-left: solid 1px #aaa;display: table-cell;  font: 16px Arial; color: #333;}
</style>
<div class="oneshop_contentSection">
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
        <div class="oneshop_upGradePackageResultField" id="tblfield_1"><?php echo $package_name;?> </div>
        <div class="oneshop_upGradePackageResultField" id="tblfield_2"><?php echo $storage." GB";?></div>
        <div class="oneshop_upGradePackageResultField" id="tblfield_3"><?php echo $amount;?></div>
      </div>
    </div>
  <div class="oneshop_UpGradePackage">
    <form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="sravya.n526-facilitator@gmail.com"><!--  sravya.n526@gmail.com  /  sravya.n526-facilitator@gmail.com merchant account details-->
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="quantity" id="quantity" value="1">
      <input type="hidden" name="custom" value="<?php echo $store_id; ?>">
      <input type="hidden" name="amount" value="10">
      <input type="hidden" name="return" value="<?php echo base_url().'stores/buyStores'?>">
      <input type="hidden" name="notify_url" value="paypal/ipn.php">
      <input type="hidden" name="cancel_return" value="<?php echo base_url().'home/cancel'?>">
      <button class="oneshop_basicInfoBtn">Make payment</button>
    </form>
  </div>
</div>
</div>
<?php
$this->templates->app_footer();
?>