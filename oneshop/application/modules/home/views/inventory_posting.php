<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//for theme selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
?>    
<style>
    .table-bordered {
    border: 1px solid #ddd;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
.table-bordered>thead>tr>th {
    padding: 8px;
    border: 1px solid #ddd;
}
.table-bordered>tbody>tr>td{
    padding: 8px;
    border: 1px solid #ddd;
}
.table>tbody>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
}
th {
    text-align: left;
}
</style>
<!--Oneshop Content starts Here(Raviteja 19-05-2015)-->
<form id="add_inventory" method="post">
	<input type="hidden" value="<?php echo $store_code; ?>" id="store_code" name="store_code">
	<div class="oneshop_container_sectionnew">
        <div class="oneshop_banner_stip_newbox click_importantNotifications">
            <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
            <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
                <?php $this->templates->os_oneshopheader("add-inventorys"); ?>
            </div>
            <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
        </div> 
        <div class="clearfix"></div>
          	<div class="store_mainwrap"> 	
                <div class="hd_heading"><h2>Add Inventory <span></span> </h2></div>
                <div class="oneshop_container_middle_section mat15">
			        <div class="oneshop_left_newcontainer mat15" style="width: 51% !important;">
                        <?php
                        if($warn_msg!=""){
                        echo "<h1 style='color:red;font-size:18px;'>$warn_msg</h1>";
                        }
                        ?>
                        <div class="oneshop_fieldsbox">
                            <label> Product Name  </label>
                            <div class="wi100pstg select" id="product_div">
                                <select class="oneshop_selectbox_field" name="idproduct" id="osdev_Product">
                                    <option value="">--Select Product--</option>
                                    <?php foreach ($productlist as $productlistdata) { ?>
                                        <option value='<?php echo $productlistdata['product_aid'] ?>'><?php echo $productlistdata['product_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_ProductError"> Please Enter Product Name  </p>
                        </div>
                        <div class="oneshop_fieldsbox">
                            <label> QTY  </label>
                            <div class="wi100pstg">
                                <input type="text" placeholder="QTY" name="qty" id="osdev_qty" class="input">
                            </div>
                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_qtyError"> Please Enter QTY </p>
                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_validqtyError"> Please Enter Valid QTY </p>
                        </div>
                        <div class="oneshop_fieldsbox">
                            <label> Cost Price  </label>
                            <div class="wi100pstg">
                                <input type="text" placeholder="Retail Price" name="costprice" id="osdev_CostPrice" class="input">
                            </div>
                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_CostPriceError"> Please Enter Cost Price </p>
                        </div>
                        <div class="oneshop_fieldsbox">
                            <label> Type </label>
                            <div class="wi100pstg select" id="type_div">
                                <select class="oneshop_selectbox_field" name="type" id="osdev_Type">
                                    <option value="">--Select Type--</option>
                                    <option value='debit'>Debit</option>
                                    <option value='credit'>Credit</option>
                                </select>
                            </div>
                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_SubCategoryError"> Please Enter Type </p>
                        </div>
                        <div class="oneshop_fieldsbox">
                            <label> Remarks  </label>
                            <div class="wi100pstg"> <textarea class="input" name="remark" id="osdev_Remark"></textarea></div>
                            <p class="wi100pstg fs11 red clearfix jsError" id="osdev_RemarkError"> Please Enter Remark</p>
                        </div>
                        <div style="display:none" id="inventory_add_loading"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'?>"/></div>
					    <div style="color:green;display:none" id="product_add_suc">Inventory Added Successfully! </div>
                        <div class="oneshop_fieldsbox">
                            <div class="wi100pstg">
                                <input type="submit" name="button" class="np_des_addaccess_btn" id="inventory_save_btn" value="Save">
                                <input type="button" name="button" class="np_des_addaccess_btn" id="inventory_reset_btn" value="Reset">
                            </div>
                        </div>
			        </div> 
                </div>
			</div> 
	    </div> 
</form>
<div class="oneshop_right_newcontainer productimg_wrap" style="float: right;margin-top: -33rem;margin-right: 10rem;width: 35% !important;">
<div class="wi100pstg mat20 fll">

<div class="click_tabs_wrap"> 
    <ul id="tabs">
        <li><a name="#tab1" href="#" id="current"> Details </a></li>
        <li><a name="#tab2" href="#"> Summary </a></li>

    </ul>
</div>

<div id="content">
    <div id="tab1" style="display: block;">
        <div class="fll wi100pstg mat10">
            <div class="wi100pstg overflow">
            </div>
            <div class="wi100pstg" id="activity_tpl_div">
                <table  class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>PRODUCT CODE</th>
                        <th>PRODUCT NAME</th>
                        <th>QTY</th>
                        <th>PRICE</th>
                        <th>TYPE</th>
                    </tr>
                </thead>
                <tbody class="table-hover" id="detailData">
                        
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="tab2" style="display: none;">
        <h1 class="wi100pstg fs14 fll borderbottom pab5"> Summary   </h1>
        <div class="fll wi100pstg mat10">
            <div class="wi100pstg overflow">
            </div>
            <div class="wi100pstg" id="activity_tpl_div">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th class="text-left">ID</th>
                    <th class="text-left">PRODUCT CODE</th>
                    <th class="text-left">PRODUCT NAME</th>
                    <th class="text-left">QTY</th>
                    <th class="text-left">PRICE</th>
                        </tr>
                    </thead>
                    <tbody  id="summaryData">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
</div>
<!--Oneshop Content ends Here(vinod 19-05-2015)-->

<?php
$this->templates->app_footer();
?>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/pprofile.js'?>"></script>
<script type="text/javascript">
  $.get(oneshop_url+"/products/productdetails",function(data){
    $("#detailData").html(data);
});

$.get(oneshop_url+"/products/productsummarydata",function(data){
    $("#summaryData").html(data);
});
  </script> 
