
<?php
$this->load->module('templates');
$this->templates->app_header(); 
$this->templates->os_mainmenu();
?>     
    
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_container_sectionnew">
	<div class="oneshop_container_middle_section mat10">
		<?php $this->templates->os_oneshopheader();?>
		<div class="oneshop_right_newcontainer mat15" style="float:left;">
			<div class="oneshop_product_images mat10">
				<h5 class="black mab10 bold"> Set Specifications </h5>
				<div class="wi100pstg mat15 mab10 fll">
					<form id="filter_product">
						<input type="hidden" value="" id="osdev_filters" name="osdev_filters">
						
						<input type="hidden" value="<?php echo $catid; ?>" id="osdev_category" name="osdev_category">
						<input type="hidden" value="<?php echo $subcatid; ?>" id="osdev_subcatid" name="osdev_subcatid">
						<input type="hidden" value="<?php echo $itemid; ?>" id="osdev_itemid" name="osdev_itemid">
						<?php
							$this->load->module('products');
							$this->products->getfilterSpecifications($catid,$subcatid,$itemid); 
						?>
					</form> 
				</div>
			</div>
		</div>
		<div class="oneshop_left_newcontainer mat15 pab10" id="search_result" style="float:right;">
			<div class="fll mab10">
				<div class="new_moduleSearchWrapper newwithCategory">
					<form id="ui_element">
						<input type="hidden" value="">
						<p></p>
						<div class="newcategorySelection">
							<img class="newmoduleSearchIcon" src="<?php echo base_url().'assets/images/searchIcon.png'?>">
						</div>
						<span class="fll">
							<input type="text" placeholder="Find here..." class="new_moduleSearchField">
						</span>
					</form>
				</div>
			</div>

			<h2 class="mat20 borderbottom wi100pstg mab10 pab5 letterspacing fll"> Showing Result for <span class="red">" <?php echo $searchparam;?>"</span></h2>
			
			<?php
				$this->load->module('products');
				$this->products->products_search_result($catid,$subcatid,$itemid,$searchparam); 
			?> 
		</div>
	</div>
</div>
    

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
<script src="<?php echo base_url() . "application/modules/home/microjs/" ?>filterproducts.js"></script>
<?php
$this->templates->app_footer(  ); 
?>
<script type="text/javascript">
    $(document).ready(function(){
        var search_prod_val='<?php echo $searchparam?>';
        $("#searchparam").val(search_prod_val);
    });
    
    </script>
