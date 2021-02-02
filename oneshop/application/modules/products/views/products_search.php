<div class="oneshop_filter">
        <div class="oneshop_filterFields">
            <h5>Find Product :</h5>            
            	<input type="text" class="oneshop_mystoreField oneshop_filterFieldsText" style="width:200px" id="findproduct_name" placeholder="Find Product By Name">
                <!--<input type="text" class="oneshop_mystoreField oneshop_filterFieldsText" placeholder="Find Product By Cost">-->
        <select id="category" class="oneshop_mystoreField oneshop_friendStoreFields">
            <option value="">Filter by Category</option>
            <option value="Electronics">Electronics</option>
            <option value="Fashion Accessories">Fashion Accessories</option>
            <option value="Clothing">Clothing</option>
            <option value="Home & Kitchen">Home & Kitchen</option>
        </select>        
       <select id="subcategory" style="width:190px;height:36px;display:none;"></select>
                <button class="oneshop_basicInfoBtn oneshop_storeFindBtn" id="find_products_btn">Find Product</button>
			</div>
    <input type="hidden" id="hproducts_cnt" name="hproducts_cnt" value="<?php echo $products_count?>"/>
</div>   

<script type="text/javascript">
  var total_pages=$("#hproducts_cnt").val(); 
  var current_page    =   1;
  var loading         =   false;   
  //Pavani on 01-06-2015
    /*$("#findstore_name").keyup(function(){
        var store_name=$(this).val();
        if(store_name.length>=2){
            $.ajax({
              type:"post",
              data:{search_val:store_name},
              url:"stores/displaySearch/stores",
              success:function(data){                
                var result=data.trim();
                var options="";
                if(result.indexOf("~")!=-1){
                  var osdev_a_search=result.split("~");
                  //alert(osdev_a_search.length);
                  for(var i=0;i<osdev_a_search.length;i++){
                    var osdev_a_search_item=osdev_a_search[i].split(":");
                    var store_url="http://localhost/oneshop/home/mystore_profile_page/"+osdev_a_search_item[0];
                    var store_link="link_"+osdev_a_search_item[0];
                    options+="<li><a href='"+store_url+"' id='"+store_link+"'>"+osdev_a_search_item[1]+"</a></li>";
                  }
                  $("#stores_suggestions").css("display","");
                  $("#stores_suggestions ul").html(options);
                }
              }
            });
        }
    });*/
  $("#find_products_btn").click(function(){
    var prod_name=$("#findproduct_name").val();    
    var category_val=$("#category").val();
    var subcategory_val=$("#subcategory").val();
    //alert(prod_name);
    var prod_url= oneshop_url+"/products/products_search_result/find/"+prod_name+"/";    
    $.ajax({
      url:prod_url,
      type:"post",
      data:{search_val:prod_name,category_name:category_val,subcategory_name:subcategory_val},
      success:function(data){        
        //alert(data);
        $("#products_search_result").html(data);                                
      },
      error:function(){
        alert("error function called");
      }                
    });
  });
  
  $(window).scroll(function(){
    if( $(window).scrollTop() > 0 ){ //if we are scrolling down          
      if( ($(window).scrollTop() + $(window).height() >= $(document).height()  ) && (current_page <= total_pages) ) {
        //alert("window function");
        if(!loading ){ 
          var prod_name=$("#findproduct_name").val();
          var category_val=$("#category").val();
          var subcategory_val=$("#subcategory").val();
          var prods_url= oneshop_url+"/products/products_search_result/find/";
          if(prod_name!=""){
            prods_url=prods_url+prod_name;
          }
          loading = true;
          $.ajax({
            url:prods_url,
            type:"post",
            data:{p:current_page,search_val:prod_name,category_name:category_val,subcategory_name:subcategory_val},
            success:function(data){                    
              $("#products_search_result").append(data);
              current_page++;                                
              loading = false;
            },
            error:function(){
              alert("error function called");
            }                
          });
        }
      }
    }
  });
$("#category").change(function(){
      var category_val=$(this).val();
      if(category_val!=""){
        var subcategories=new Array();
        subcategories["Electronics"]=["Mobiles","Laptops","Tablets","Mobile Accessories","Television","Cameras","Computer accessories","Audio/video","Beauty & Personal care","Network components","Software & Games"];
        subcategories["Fashion Accessories"]=["Footwear","Wallets","Sunglasses","Fragrances","Belts","Makeup Kit","Hats, Caps & Scarfs"];
        subcategories["Clothing"]=["Men","Women","Kids wear"];
        subcategories["Home & Kitchen"]=["Wall decor","Dining","Kitchen Appliances"];
        var a_subitems=subcategories[category_val];      
        var options_str="<option value=''>Filter by Subcategory</option>";
        for(var i=0;i<a_subitems.length;i++){
          options_str+="<option>"+a_subitems[i]+"</option>";
        }
        if(options_str!=""){
          $("#subcategory").css("display","").html(options_str);
        }
      }
      //alert(options_str);
    });
  </script>