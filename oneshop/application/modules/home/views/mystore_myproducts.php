<?php
$this->load->module('templates');
$this->templates->os_Store_Header(  ); 
$this->templates->mystore_Menu(  ); 
$this->load->module("home");
//Imp $warn_msg=$this->home->displayWarn();
?>          

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_contentSection"> 
          <?php
          if($warn_msg!=""){
           echo "<h1 style='color:red;font-size:18px;'>$warn_msg</h1>";
          }
        ?>      
      <?php
      $this->load->module("products");
      $this->products->mystore_myproduct_search( );
      ?>
          
          
          
          
		<div class="oneshop_findProductsPage">
            <div class="oneshop_cartItemsPageHead">
            	My Store Products
            </div>
      
   <div id="products_more">
            <?php
            $starting_index=0;
            $ending_index=4;
                $this->products->myproduct_total_list();
            ?>
            
        </div>
            </div>            
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

        <?php
$this->templates->app_footer(  ); 
?>
    
  
    
<script>
var searchStr = "";
var find_category="";
var find_sub_ctegory="";
var starting_index=0;
var ending_index=8;
  $(document).ready(function(){
    getData(0, 8, searchStr);
  });
  
function getData(starting_index,ending_index,searchStr){
  $.ajax({
          type: 'POST',
          url : oneshop_url+ "/products/myproduct_total_list/",
          data: {search_data: searchStr,starting:starting_index,ending:ending_index},
          success: function(data) {
            $("#products_more").attr("id","products_search");
            if(starting_index==0){
              $("#products_search").html(data);
            }else{
              $("#products_search").append(data);
            }
           // console.log(data);          
            starting_index=starting_index+8;
            ending_index=ending_index+8;
          }

      });
}
function getDataByCategory(starting_index,ending_index,find_category,find_sub_ctegory,searchStr){
  
  $.ajax({
          type: 'POST',
          url : oneshop_url + "/products/findProductBycategory/",
          data: {search_data:searchStr,category: find_category,sub_category:find_sub_ctegory,starting:starting_index,ending:ending_index},
          success: function(data) {
        
            $("#products_more").attr("id","products_search");
            if(starting_index==0){
              $("#products_search").html(data);
            }else{
              $("#products_search").append(data);
            }
           // console.log(data);          
            starting_index=starting_index+8;
            ending_index=ending_index+8;
          }

      });
}
$("#find_myproduct").click(function(){
  searchStr=$("#p_search").val();
   find_category=$("#find_product_category").val();
  find_sub_ctegory=$("#find_product_sub_category").val();
  if(searchStr!='' &&find_category!=""&& find_sub_ctegory!=""){
     starting_index=0;
      ending_index=8;
     // alert("this is first"+searchStr);
    getDataByCategory(starting_index,ending_index,find_category,find_sub_ctegory,searchStr);
    
  }else if(searchStr!=""&&find_category!=""){
     starting_index=0;
      ending_index=8;
      find_sub_ctegory='';
     
      // alert("this is second"+searchStr);
    getDataByCategory(starting_index,ending_index,find_category,find_sub_ctegory,searchStr);
    
  }
 else if(searchStr!=''&&find_category=="")
  {
    //alert("this is third"+searchStr);
  starting_index=0;
  ending_index=8;
  getData(starting_index, ending_index, searchStr);
  }
  else if(find_category!=""&& find_sub_ctegory!=""){
  // alert("this is fourth"+searchStr);
      starting_index=0;
      ending_index=8;
      searchStr='';
    getDataByCategory(starting_index,ending_index,find_category,find_sub_ctegory,searchStr);
    
  }
   else if(find_category!=""&& find_sub_ctegory==""&&searchStr==""){
   //alert("this is related to category"+searchStr);
      starting_index=0;
      ending_index=8;
      searchStr='';
      find_sub_ctegory="";
    getDataByCategory(starting_index,ending_index,find_category,find_sub_ctegory,searchStr);
    
  }
  
});





$(window).scroll(function(){
  if( (($(window).scrollTop() + $(window).height()) >= $(document).height()   )  ) {
  
  if(searchStr==""&&find_category==""){
   // alert("srch and find");
      starting_index=starting_index+8;
      ending_index=ending_index+8;
      getData(starting_index, ending_index, searchStr);
  }else if(searchStr!=""){
    //alert(searchStr);
      starting_index=starting_index+8;
      ending_index=ending_index+8;
      getData(starting_index, ending_index, searchStr);
    }
    else if(find_category!=null){
      //alert(find_category);
       starting_index=starting_index+8;
      ending_index=ending_index+8;
      getDataByCategory(starting_index,ending_index,find_category,find_sub_ctegory);
    
    }
  }
});



</script>