   <div class="oneshop_filter">
			<div class="oneshop_filterFields">
            <h5>Friend Store :</h5>
            	<input type="text" class="oneshop_mystoreField oneshop_friendStoreFields" placeholder="Find Store By Friend Name" id="frnd_name" value="">
              <?php
              $this->load->module("stores");
          $countries_str=$this->stores->getCountries();
          ?>
        <select id="fcountries" class="oneshop_mystoreField oneshop_friendStoreFields">
          <option value="0">Find by Country</option>
          <?php
          foreach($countries_str as $crows){
            echo "<option value=".$crows["country_id"].">".$crows["country_name"]."</option>";
          }
          ?>
        </select>
        <select id="states" class="oneshop_mystoreField oneshop_friendStoreFields">
            <option value="0">Find by state</option>          
        </select>
                <!--<input type="text" class="oneshop_mystoreField oneshop_filterFieldsText oneshop_friendStoreFields" placeholder="Find Store By Store Name" id="fstore_name">-->
                <!--<input type="text" class="oneshop_mystoreField oneshop_filterFieldsText oneshop_friendStoreFields" placeholder="Find Store By Package">-->
                <button class="oneshop_basicInfoBtn oneshop_storeFindBtn" id="ffind_store_btn">Find Store</button>
			</div> 
       <input type="hidden" name="hstore_count" id="hfstore_count" value="<?php echo $stores_count?>"/>
        </div>
<script type="text/javascript">
  var total_pages=$("#hfstore_count").val(); 
  var current_page    =   2;
  var loading         =   false;
  $("#ffind_store_btn").click(function(){
    var frnd_name=$("#frnd_name").val();
    var store_url=oneshop_url+"/friends_store/friends_store_search_result/";
    var country_id=$("#fcountries").val();
    var state_id=$("#states").val();
    if(frnd_name!=""){
      store_url=store_url+frnd_name;
    }
    $.ajax({
      url:store_url,
      type:"post",
      data:{search_val:frnd_name,stateid:state_id,countryid:country_id},
      success:function(data){   
        //alert(data);
        $("#fstores_search_result").html(data);                                
      },
      error:function(){
        alert("error function called");
      }                
    });
  });
$(window).scroll(function(){
        if( $(window).scrollTop() > 0 ){ //if we are scrolling down           
            if( ($(window).scrollTop() + $(window).height() >= $(document).height()  ) && (current_page <= total_pages) ) {
                   if( ! loading ){ 
                     var store_name=($("#frnd_name").val()!="")?$("#frnd_name").val():"default";
                     var state_id=$("#states").val();
                     //alert(store_name);
                     var store_url=oneshop_url+"/friends_store/friends_store_search_result/";
                     if(store_name!="default"){
                       store_url=store_url+store_name;
                     }
                     //alert(store_url);
                        loading = true;
                        $.ajax({
                            url:store_url,
                            type:"post",
                            data:{p:current_page,search_val:store_name,stateid:state_id},
                            success:function(data){                    
                              //alert(data);
                                $("#fstores_search_result").append(data);
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
   
  </script>