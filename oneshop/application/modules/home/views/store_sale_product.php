
<?php
$this->load->module('templates');
$this->templates->app_header(); 
$this->templates->os_mainmenu();
$store_code = $this->uri->segment(3);
// echo var_dump($store_code);
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if ($theme_selected != '') {
    $sideimage = base_url() . '/assets/images/store_banners/' . $theme_selected . '.png';
    $midimage = base_url() . '/assets/images/store_banners/mid' . $theme_selected . '.png';
} else {
    $sideimage = base_url() . '/assets/images/store_banners/1.png';
    $midimage = base_url() . '/assets/images/store_banners/mid1.png';
}
?>     
    
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_container_sectionnew">
	 <div class="oneshop_banner_stip_newbox click_importantNotifications">

            <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
            <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
                <?php $this->templates->os_oneshopheader("home"); ?>
            </div>
            <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
        </div> 
    <!-- <div class="clearfix">&nbsp;</div> -->
		<div class="oneshop_right_newcontainer mat15" style="float:left;margin-left: 23px;">
            <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad1.jpg" class="hotel_news_imgbox"></a>
                        <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>
		</div>
		<!-- <div class="moduleSearchWrapper withOutCategory" style="float: left;margin-left: 49px;width: 30%">
            <i id="search_btn" class="fa fa-search click_searchIcon moduleSearchIcon" aria-hidden="true"></i>
            <span class="moduleSearchBarField">
                <input type="text" class="input" style="width: 86%" placeholder="Search Products Here..." id="searchparam" name="searchparam" value="">
            </span>
        </div> -->
		<input type="hidden" name="store" id="store" value="<?php echo $store_details[0]["store_aid"]?>">
			<br />
			<br />
			<br />
		<div class="oneshop_left_newcontainer mat15 pab10" id="search_result" style="float:right; display: none;">

		</div>
		<div class="oneshop_left_newcontainer mat15 pab10" id="all_result" style="float:right;">
			<?php 
            // echo var_dump($product);
                for($i=0; $i < sizeof($product); $i++){
        			$this->load->module('products');
        			$this->products->products_sale_search_result('',$product[$i],$store_details[0]["store_aid"]);
                }
			?>
		</div>
	</div>
</div>
    

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->
<script type="text/javascript">

    // $("#searchparam").change(function(){
        // var search_val=$("#searchparam").val();
        // var store_code=$("#store").val();

        // if(search_val.trim()!=""){
        //     $.ajax({
        //         type:"post",
        //         url: oneshop_url+"/products/products_sale_search_result/"+search_val+"/NULL/"+store_code,
        //         success:function(data){

        //         	document.getElementById("all_result").style.display = "none";
        //         	document.getElementById("search_result").style.display = "block";
        //         	$("#search_result").append(data);
        //         }
        //     });           
        // }
        // else{
        //     document.getElementById("search_result").style.display = "none";
        //     document.getElementById("search_result").innerHTML = "";
        //     document.getElementById("all_result").style.display = "block";
        //     return false;
        // }
    // });	

</script>
<?php
$this->templates->app_footer(  ); 
?>
