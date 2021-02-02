<div class="oneshop_filter">
    <div class="oneshop_filterFields">
        <!--<form action="stores/displayStores">-->
        <input type="hidden" name="hstore_cnt" id="hstore_cnt" value="<?php echo $stores_count; ?>"/>
        <h5>Find Store :</h5>
        <span style="display: none;"> <?php
            $countries_str = $this->stores->getCountries();
            ?></span>
        <span style="display: none;"> <?php
            $categories_str = $this->stores->getCategories();
            ?></span>
        <input type="text" class="oneshop_mystoreField oneshop_friendStoreFields" id="findstore_name" placeholder="Find Store By Name" value="">
        <select id="store_categ" class="oneshop_mystoreField oneshop_friendStoreFields">
            <option value="">Find By Category</option>
            <option value="Category">Category</option>
            <option value="Country">Country</option>
            <option value="City">City</option>
            <option value="Services">Services</option>
        </select>
        <div id="sub_filter">
            <select id="sub_select" class="oneshop_mystoreField oneshop_friendStoreFields">
                <option value="">Find Store</option>          
            </select>
        </div>
        <div id="city_div" style="display:none;">
            <div class="ui-widget">
                <input id="city_txt" onkeyup="getlocation(this.value)" class="oneshop_mystoreField oneshop_friendStoreFields">
                <input type="hidden" id="hcity_id" value=""/>
           </div>
            <div class="suggestionDivContainer"  id="div_noCityFound"  style="display:none">
                        <span style="padding: 5px; color: #E00F0F;">No City with this name available</span>
                    </div>
                    <div class="suggestionDivContainer" id="cityContainer" style="display:none">
                        <ul style="list-style-type: none;" id="citySelectorUL">
                            <li class='pad3' onclick="setlocation(this.id )" id="cityJSON1"></li>
                            <li class='pad3' onclick="setlocation(this.id )"  id="cityJSON2"></li>
                            <li class='pad3' onclick="setlocation(this.id )"  id="cityJSON3"></li>
                            <li class='pad3' onclick="setlocation(this.id )" id="cityJSON4"></li>                                                               
                        </ul> 
                    </div> 
<!--            <input type="text" id="city_txt" name="city_txt" class="oneshop_mystoreField oneshop_friendStoreFields"/>-->
        </div>
        <div id="stores_suggestions" style="display:none;">
            <ul style="list-style: none;"></ul>
        </div>         
        <button class="oneshop_basicInfoBtn oneshop_storeFindBtn" id="find_store_btn">Find Stores</button>
        <!--</form>-->
    </div> 
</div> 
<script>
	function	setlocation(id){
	
	var citynmae = $('#'+id).text() ;
	
	
	   $('#city_txt').val(citynmae);    
        $('#cityContainer').css({display:'none'});   
	}
function getlocation(cityName){ 
	
	if( cityName.length >= 2 ) {

		 callAJAX(oneshop_url + '/stores/getCityName', {kw:cityName},
               function( data ){
				   
         var cities = $.parseJSON($.trim(data));
        
           if (cities===null) {
              $('#city_txt').val('');
			  $('#div_noCityFound').css({display:'block'});  
                $('#cityContainer').css({display:'none'});                 
            } else {
						 $('#cityContainer').css({display:'block'});
      
                $('#div_noCityFound').css({display:'none'}); 
                $( '#cityJSON1' ).text( cities[0] );
                $( '#cityJSON2').text( cities[1] );
                $( '#cityJSON3').text( cities[2] );
                $( '#cityJSON4').text( cities[3] ); 
			}  
           
        }, function(){

        }, function(){

        } );    
		
	}else {
        $('#cityContainer').css({display:'none'});
    }
    
	
	
	}
</script>
