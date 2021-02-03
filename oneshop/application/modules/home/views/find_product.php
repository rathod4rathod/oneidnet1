
<?php
$this->load->module('templates');
$this->templates->app_header(); 
$this->templates->os_mainmenu();
$store_code = $this->uri->segment(2);
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
			<div class="oneshop_product_images mat10">
				
				<div class="wi100pstg mat15 mab10 fll">
					<form id="filter_product">
						<input type="hidden" value="" id="osdev_filters" name="osdev_filters">						
						<input type="hidden" value="<?php echo $catid; ?>" id="osdev_category" name="osdev_category">
						<input type="hidden" value="<?php echo $subcatid; ?>" id="osdev_subcatid" name="osdev_subcatid">
						<input type="hidden" value="<?php echo $itemid; ?>" id="osdev_itemid" name="osdev_itemid">
						<h5 class="black mab10 bgcolor wi100pstg borderbottom bold">Discounts</h5>
						<input type="hidden" id="osdev_discount" name="discount" value="">
						<input class="filterCheck" type="checkbox" name="osdev_discount" value="1 - 10"> 1 - 10 %<br/>
						<input class="filterCheck" type="checkbox" name="osdev_discount" value="11 - 20"> 11 - 20 %<br/>
						<input class="filterCheck" type="checkbox" name="osdev_discount" value="21 - 30"> 21 - 30 %<br/>
						<input class="filterCheck" type="checkbox" name="osdev_discount" value="31 - 40"> 31 - 40 %<br/>
						<input class="filterCheck" type="checkbox" name="osdev_discount" value="41 - 50"> 41 - 50 %<br/>
						<?php
						// if($catid)
						// {
							$this->load->module('products');
							$this->products->getfilterSpecifications($catid,$subcatid,$itemid); 

						// }
						?>
					</form> 
				</div>
			</div>
		</div>
		<?php if($catid != '') {?>
					<div class="moduleSearchWrapper withOutCategory" style="float: left;margin-left: 49px;width: 30%">
                        <i id="search_btn" class="fa fa-search click_searchIcon moduleSearchIcon" aria-hidden="true"></i>
                            <!--<img id="search_btn" class="moduleSearchIcon click_searchIcon" src="https://oneshop.oneidnet.com//assets/images/searchIcon.png">-->
                        <span class="moduleSearchBarField">
                            <input type="text" class="input" style="width: 86%" placeholder="Search Products Here..." id="searchparam" name="searchparam" value="">

                            <!-- <div class="searchSuggessions" style="display: none;">
                                <ul name="search" class="click_suggesionsList">
									
                                </ul>
                            </div> -->
                        </span>
                    </div>
                <?php } else {
                	?>
                    <div class="moduleSearchWrapper withOutCategory" style="float: left;margin-left: 49px;border: 0.01px solid;">
                        <i id="search_btn" class="fa fa-search click_searchIcon moduleSearchIcon" aria-hidden="true"></i>
                            <!--<img id="search_btn" class="moduleSearchIcon click_searchIcon" src="https://oneshop.oneidnet.com//assets/images/searchIcon.png">-->
                        <span class="moduleSearchBarField">

                            <span class="moduleSearchBarField">
                                <select id="click_search" class="sb_select categorySelectionField">
                                    <option value="Category">Category</option>
                                    <option value="Scategory">Sub Category</option>
                                </select>

                            </span>
                            <input type="text" placeholder="Search Product here...." id="searchparam1" name="searchparam1" class="moduleSearchField click_searchField">
                            <div class="searchSuggessions" style="display: none;">
                                <ul name="search" class="click_suggesionsList">

                                </ul>
                            </div>
                        </span>
                    </div>
                <?php }?>
			<!-- <strong style="font-size: 15px">Search Product : </strong>
			<input type="text" class="input" style="width: 50%" placeholder="Search Products Here..." id="searchparam" name="searchparam" value=""> -->
			<input type="hidden" name="store" id="store" value="<?php echo $store_details[0]["store_aid"]?>">
			<input type="hidden" name="cid" id="cid" value="<?php echo $catid?>">
			<input type="hidden" name="scid" id="scid" value="<?php echo $subcatid?>">
			<input type="hidden" name="itid" id="itid" value="<?php echo $itemid?>">
			<br />
			<br />
			<br />
		<div class="oneshop_left_newcontainer mat15 pab10" id="search_result" style="float:right; display: none;">

		</div>
		<div class="oneshop_left_newcontainer mat15 pab10" id="all_result" style="float:right;">
			<?php 
			if($catid != ""){
				$this->load->module('products');
				$this->products->products_search_result($catid,$subcatid,$itemid,'',$store_details[0]["store_aid"]);
			}else
			{
				$this->load->module('products');
				$this->products->products_search_result('','','','',$store_details[0]["store_aid"]);
			}
			
			?>
		</div>
	</div>
</div>
    

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
<script src="<?php echo base_url() . "application/modules/home/microjs/" ?>filterproducts.js"></script>
<script type="text/javascript">
	
    $("#searchparam").change(function(){
        var search_val=$("#searchparam").val();
        var store_code=$("#store").val();
        var category_id=$("#cid").val();
        var subcategory_id=$("#scid").val();
        var item_id=$("#itid").val();

        if(search_val.trim()!=""){
            $.ajax({
                type:"post",
                url: oneshop_url+"/products/products_search_result/"+category_id+"/"+subcategory_id+"/"+item_id+"/"+search_val+"/"+store_code,
                success:function(data){

                	document.getElementById("all_result").style.display = "none";
                	document.getElementById("search_result").style.display = "block";
                	$("#search_result").append(data);
                }
            });           
        }
        else{
            document.getElementById("search_result").style.display = "none";
            document.getElementById("search_result").innerHTML = "";
            document.getElementById("all_result").style.display = "block";
            return false;
        }
    });	

    $("#searchparam1").change(function(){
        var search_val=$("#searchparam1").val();
        var store_code=$("#store").val();

        if(search_val.trim()!=""){
            $.ajax({
                type:"post",
                url: oneshop_url+"/products/products_search_result/NULL/NULL/NULL/"+search_val+"/"+store_code,
                success:function(data){

                	document.getElementById("all_result").style.display = "none";
                	document.getElementById("search_result").style.display = "block";
                	$("#search_result").append(data);
                }
            });           
        }
        else{
            document.getElementById("search_result").style.display = "none";
            document.getElementById("search_result").innerHTML = "";
            document.getElementById("all_result").style.display = "block";
            return false;
        }
    });	

</script>
<?php
$this->templates->app_footer(  ); 
?>
