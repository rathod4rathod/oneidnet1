<?php
$this->load->module('templates');
$this->templates->app_header(); 
$this->templates->os_mainmenu();
?>     
<link rel="stylesheet" href="<?php echo base_url().'assets/css/jquery-ui.css'?>">
<script src="<?php echo base_url().'assets/scripts/jquery-ui.js'?>"></script>
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_container_sectionnew">
	<div class="oneshop_container_middle_section mat10">
            <input type='hidden' id='hsearch_keywords' value=""/>
		<div class="oneshop_right_newcontainer mat15">
			<div class="oneshop_product_images mat10" style="padding-left:3px">
                            
			</div>
		</div>
		<div class="oneshop_left_newcontainer mat15 pab10" id="search_result">
                    <div class="mab10">
                        <div class="new_moduleSearchWrapper newwithCategory">
                            <!--<form id="ui_element">-->
                                <input type="hidden" value="">
                                <p></p>
                                <div class="newcategorySelection" id="search_prods">
                                    <img class="newmoduleSearchIcon" src="<?php echo base_url().'assets/images/searchIcon.png'?>">
                                </div>
                                <div class="fll" class="ui-widget">
<!--                                    <input type="text" placeholder="Find Products here..." class="product_searchField" id="search_text">-->
                                    
  <input id="products">
  <input type="hidden" id="products_id"/>
                                </div>
                                <span class="fll">
                                    <select class="search_products_select" id="search_by">
                                        <option value="find_products">Find Products</option>
                                        <option value="find_services">Find Services</option>                                        
                                    </select>
                                </span>
<!--                            </form>-->
                        </div>
                    </div>

<!--			<h2 class="mat20 borderbottom wi100pstg mab10 pab5 letterspacing fll"> Showing Result for <span class="red">" <?php echo $searchparam;?>"</span></h2>-->
                    <div id='prods_div_result'>
			<?php
                            $this->load->module('products');
                            $this->products->getrecentproducts(); 
                            //$this->products->products_search_result("","","","samsung");
			?> 
                    </div>
		</div>
	</div>
</div>
    

    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
<?php
$this->templates->app_footer(); 
?>

<script type="text/javascript">
    // function to search products
    $("#search_prods").click(function(){
        var search_term=$("#products_id").val();
        //var search_type=$("#search_by").val();
        //alert(search_term);
        $.ajax({
            type:"post",
            data:{search:search_term},
            url: oneshop_url+"/products/search_products_result",
            success:function(data){
               //alert(data);
               $("#prods_div_result").html(data);
            }
        });
    });    
    $(function() {
        $("#products").autocomplete({
            source: oneshop_url+'/products/autoSuggest',
            select: function (event, ui) {                
                $("#products_id").val(ui.item.label);                
            }
        });
    });
</script>