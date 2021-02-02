<div class="oneshop_filter">
    <div class="oneshop_filterFields">
        <!--<form action="stores/displayStores">-->
        <input type="hidden" name="hstore_cnt" id="hstore_cnt" value="<?php echo $stores_count; ?>"/>
        <h5>Find Store :</h5>

        <span style="display: none;"> <?php
            $countries_str = $this->stores->getCountries();
            ?></span>
         <input type="text" class="oneshop_mystoreField oneshop_friendStoreFields" id="findstore_name" placeholder="Find Store By Name" value="">
        <select id="store_categ" class="oneshop_mystoreField oneshop_friendStoreFields">
            <option value="categories">Find By Category</option>
            <option value="Country">Country</option>
            <option value="City">City</option>
            <option value="Friends">Friends</option>

            <?php
            //foreach($countries_str as $crows){
            // echo "<option value=".$crows["country_id"].">".$crows["country_name"]."</option>";
            //}
            ?>
        </select>  
       
        <select id="sub_cities" class="oneshop_mystoreField oneshop_friendStoreFields">
            <option value="0">Find Store</option>          
        </select>
        <select id="cities"  style="display: none;"class="oneshop_mystoreField oneshop_friendStoreFields">
            <option value="0">Find By City</option>          
        </select>
        <div id="stores_suggestions" style="display:none;">
            <ul style="list-style: none;"></ul>
        </div>         
        <button class="oneshop_basicInfoBtn oneshop_storeFindBtn" id="find_store_btn">Find Stores</button>
        <!--</form>-->
    </div> 
</div>  
<script type="text/javascript">
    //Search store based on country,city wise
    $("#find_store_btn").click(function () {
        var store_name = $("#findstore_name").val();
        var sub_cat = $("#store_categ").val();
       // alert(sub_cat);
        if (sub_cat == "Country") {
            var country_id = ($("#sub_cities").val() != 0) ? $("#sub_cities").val() : 0;
            //alert(country_id);
            // var country_id=($("#store_categ").val()!=0)?$("#store_categ").val():0;    
            $.ajax({
                url: oneshop_url + "/stores/setStoreSearchCountry_Info/",
                type: "post",
                data: {search_val: store_name, country_id: country_id},
                success: function (data) {
                  //  alert(data);
                    $("#store_search_result").html(data);
                },
                error: function () {
                    console.log("Something went wrong");
                }
            });
        } else if (sub_cat == "Friends") {
            var friend_id = $("#sub_cities").val();
           // alert(friend_id)
            $.ajax({
                url: oneshop_url + "/stores/setStoreSearchFriend_Info/",
                type: "post",
                data: {search_val: store_name, country_id: friend_id},
                success: function (data) {
                    //alert(data);
                    $("#store_search_result").html(data);
                },
                error: function () {
                    console.log("Something went wrong");                    
                }
            });
        }
    });

    //onchange event for Country,City selection
    $("#store_categ").change(function () {
        var countries_val = $(this).val();
        //alert(countries_val);
        if (countries_val == "Country") {
            $.ajax({
                type: "post",
                url: oneshop_url+ "/stores/getCountries/",
                success: function (data) {
                    //alert(data);
                    var result = data.trim();
                    var options = "<option>Select Country</option>" + result;
                    $("#sub_cities").html(options);
                }
            });
        }
        else if (countries_val == "Friends") {
            $.ajax({
                type: "post",
                url: oneshop_url + "/stores/getFriend_Info/",
                success: function (data) {
                    //alert(data);
                    var result = data.trim();
                    var options = "<option>Select Friend</option>" + result;
                    $("#sub_cities").html(options);
                }
            });
        }else if (countries_val == "City") {            
             var options = "<option readonly='readonly'>Cities Unavailable</option>" ;
             $("#sub_cities").html(options);              
             $('#sub_cities').attr('disabled', true);
             
                 }
    });
</script>