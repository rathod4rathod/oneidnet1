<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.tokeninput.js'?>"></script>
<link rel="stylesheet" href="<?php echo base_url().'assets/css/token-input.css'?>" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url().'assets/css/token-input-facebook.css'?>" type="text/css" />
<div style="margin-left:80px;" id="tab2" class="audience_div">
    <form id="audiencelab_form" name="audiencelab_form">
    <input type="hidden" name="hinterests_val" id="hinterests_val" value=""/>
    <input type="hidden" name="hlanguages_val" id="hlanguages_val" value=""/>
    <input type="hidden"  name="hpages_val" id="hpages_val" value=""/>
    <input type="hidden" name="hnationality_val" id="hnationality_val" value=""/>
    <input type="hidden" name="hlocation_val" id="hlocation_val" value=""/>    
    <p class="bold fs12 mat20">  AUDIENCE LAB  </p>
    <div class="audience_lab">
        <div class="fll form_width">
            <p class="label_name"> Age </p>
            <p> <select  class="flight_searchfield_adult_and_childcontainer" id="age" name="age">
                    <option value="">--Select--</option>
                    <option value="Any">Any</option>
                    <option value="15-20">15-20</option>
                    <option value="21-35">21-35</option>
                    <option value="36-50">36-50</option>
                    <option value="51-70">51-70</option>
                    <option value="71+">71+</option>
                </select> </p>
                <p id="age_error"></p>
        </div>
        <div class="fll form_width">
            <p class="label_name mat20 fll"> Gender </p>
            <p> <select  class="flight_searchfield_adult_and_childcontainer" name="gender" id="gender">
                    <option value="">--Select--</option>
                    <option value="MALE">Male</option>
                    <option value="FEMALE">Female</option>
                    <option value="Any">Any</option>
                </select>
            </p>
            <p id="gender_error"></p>
        </div>
        <div class="fll form_width">
            <p class="label_name mat20 fll"> Relation Status </p>
            <p> <select class="flight_searchfield_adult_and_childcontainer" name="marital_status" id="marital_status">
                    <option value="">--Select--</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Any">Any</option>
                </select>
            </p>
        </div>
        <div class="fll form_width">
            <p class="label_name mat20 fll" style="width:300px">Interest </p>
            <p> 
                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                <!--<div style="height:80px;border:1px solid red;">-->
                <select id="tokenize" name="tokenize" multiple="multiple" class="tokenize-sample">
                    <?php
                    $interests = array('Airport', 'Attractions/Things to Do', 'Automotive', 'Bar', 'Book Store', 'Business Services', 'Church/Religious Organization', 'Club', 'Computers', 'Concert Venue', 'electronics', 'Event Planning/Event Services', 'Food/Grocery', 'Furniture', 'Health/Medical/Pharmacy', 'Home Improvement', 'Hospital/Clinic', 'Hotel', 'Museum/Art Gallery', 'Outdoor Gear/Sporting Goods', 'Pet Services', 'Professional Services', 'Real Estate', 'Restaurant/Cafe', 'Shopping/Retail', 'Spas/Beauty/Personal Care', 'Sports/Recreation/Activities', 'Tours/Sightseeing', 'Transportation', 'Community/Government', 'Album', 'Movie', 'Movie Theater', 'Music Award', 'Performance Art', 'Radio Station', 'TV Channel', 'TV Network', 'TV Show', 'TV/Movie Award', 'Aerospace/Defense', 'Automobiles and Parts', 'Bank/Financial Institution', 'Biotechnology', 'Chemicals', 'Community Organization', 'Computers/Technology', 'Consulting/Business Services', 'Engineering/Construction', 'Farming/Agriculture', 'Government Organization', 'Health/Medical/Pharmaceuticals', 'Industrials', 'Insurance Company', 'Internet/Software', 'Legal/Law', 'Middle school', 'Media/News/Publishing', 'Mining/Materials', 'Non-Governmental Organization (NGO)', 'Non-Profit Organization', 'Political Organization', 'Political Party', 'Training Institution', 'College', 'School', 'Telecommunication', 'University', 'Actor/Director', 'Artist', 'Athlete', 'Author', 'Business Person', 'Chef', 'Coach', 'Comedian', 'Dancer', 'Doctor', 'Editor', 'Government Official', 'Journalist', 'Lawyer', 'Monarch', 'Musician/Band', 'News Personality', 'photographer', 'Politician', 'Producer', 'Teacher', 'Writer', 'Appliances', 'Baby Goods/Kids Goods', 'Bags/Luggage', 'Camera/Photo', 'Cars', 'Clothing', 'Commercial Equipment', 'Drugs', 'Electronics', 'Food/Beverages', 'Games/Toys', 'Health/Beauty', 'Home Decor', 'Household Supplies', 'Jewelry/Watches', 'Kitchen/Cooking', 'Movies/Music', 'Musical Instrument', 'Office Supplies', 'Pet Supplies', 'Product/Service', 'Software', 'Vitamins/Supplements', 'Wine/Spirits', 'Music', 'Sports', 'Book');
                    for ($i = 0; $i < count($interests); $i++) {
                        ?>
                        <option value="<?php echo $interests[$i]; ?>">
                            <?php echo $interests[$i] ?>
                        </option>
                    <?php }
                    ?>
                </select>
                <!--</div>-->
            </p>
        </div>
        <div class="fll form_width">
            <p class="label_name mat20 fll" style="width:300px">Pages </p>
            <p> 
                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                <!--<div style="height:80px;border:1px solid red;">-->
                <select id="pages" name="pages" multiple="multiple" class="tokenize-sample">
                    <option value=""></option>
                </select>
                <!--</div>-->
            </p>
        </div>
        <div class="fll form_width">
            <p class="label_name mat20 fll" style="width:300px">Languages known </p>
            <p> 
                <!--<textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>--> 
                <!--<div style="height:80px;border:1px solid red;">-->
                <select id="languages" name="languages" multiple="multiple" class="tokenize-sample">
                    <?php
                    foreach ($languages as $lang_info) {
                        ?>
                        <option value="<?php echo $lang_info["language_id"]; ?>">
                            <?php echo $lang_info["language_name"] ?>
                        </option>
                    <?php }
                    ?>
                </select>
                <!--</div>-->
            </p>
        </div>
<!--        <div class="fll form_width">
            <p class="label_name mat20 fll" style="width:300px">Nationality </p>
            <p>
                <textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea>
                <div style="height:80px;border:1px solid red;">
                <select  id="nationality" name="nationality" multiple="multiple" class="tokenize-sample">
                    <?php
                    foreach ($nationality_list as $nationality_info) {
                        ?>
                        <option value="<?php echo $nationality_info["nationality"]; ?>">
                            <?php echo $nationality_info["nationality"] ?>
                        </option>
                    <?php }
                    ?>
                </select>
                </div>
            </p>
        </div>-->
        <!--                                        <div class="fll form_width">
                                                    <p class="label_name mat10 fll"> Location </p>
                                                    <p> <textarea style=" resize: none;" maxlength="70" cols="54" rows="4"></textarea> </p>
                                                </div>-->
        <div class="fll form_width">
            <p class="label_name mat10 fll">Choose Area Type: </p>
            <p>
                <input type="radio" name="cloation" value="World wide"> World wide
                <input type="radio" name="cloation" value="Country"> Country
                <input type="radio" name="cloation" value="State"> State
                <input type="radio" name="cloation" value="City"> City
            </p>
            <p id="onlocation_error" style="color:red;"></p>
        </div>
        <div class="fll form_width" id="locationdisplay" style="display:none">
            <p class="label_name mat10 fll"> Location </p>
            <p>
                <input type="text" id="campaignlocation" name="campaignlocation">                                            
            </p>
            <p id="locationdisplay_error" style="color:red;"></p>
        </div>
<!--        <div class="fll form_width">
            <p class="label_name">Potential Reach(Impression) </p>
        </div>-->
        <div class="fll form_width" id="daily_reach">
            <p class="label_name"><strong>Total Targets </strong></p>
            <p id="daily_reach_cnt">0 </p>
        </div>
<!--        <div class="fll form_width">
            <p class="label_name"> Total Reach </p>
        </div>-->
    </div>
    <div class="mat20 mar10"> 
        <input type="button" value="NEXT" class="np_des_checkout_btn" name="button" id="audience_btn"> 
    </div>
    </form>
</div>
