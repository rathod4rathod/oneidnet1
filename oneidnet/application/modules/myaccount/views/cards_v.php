<div class="paybook_listview_pop">
<p class="oneshop_currencyConvertorCloseBtn_two">X</p>
<div class="fll np_des_mab20 np_des_mat10 wi100pstg">
<h1 class="fs14 bold">  <?php echo ucfirst($carddata[0]['card_name']) ."  Edit Form "?>   </h1>
</div>




<div class="paybook_data_scroll">



<div class="Table-popup">
	
                     <div class="group np_des_wi420 np_des_mat25 fll">
                <input type="text" class="np_des_wi420" id="card_name"  onfocus="removeerror(this.id)"value="<?php echo $carddata[0]['card_name']?>"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   Card Name   </label>
              </div>     
                                
                                <div class="group np_des_wi420  fll">
                <input type="text" class="np_des_wi420" id="name_oncard" value="<?php echo $carddata[0]['name_as_on_card']?>" required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>  Name on the Card  </label>
              </div>


                               <div class="group np_des_wi420 fll">
                <input type="text" class="np_des_wi420" id="card_number" onfocus="removeerror(this.id)" value="<?php echo $carddata[0]['card_number']?>"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   Card Number  </label>
              </div>
              
                 
              
                              
                               
	<div class="group fll">
                <input type="text" style="width:120px;"  id="card_cvv"  onfocus="removeerror(this.id)"  value="<?php echo $carddata[0]['cvv_number']?>"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   CVV  </label>
              </div>


<div class="group fll" style="margin-top:-10px; margin-left:35px;">
                <p class="np_des_mab2 fs11 np_des_mab10"> Expiry </p>
                <select class="oneshop_select_newfield_with_border fll"  id="card_expirymonth" style="width:125px;" onchange="removeerror(this.id)" >
                  <option value=""> Month </option>
                 <?php  for($i=1;$i<=12;$i++){?>
                  <option value="<?php  echo $i ;?>" <?php if($carddata[0]['expiry_month']==$i){ echo "selected='selected'" ; }?> ><?php  echo $i ;?></option>
                 <?php } ?>
                </select>
                
                <select class="oneshop_select_newfield_with_border os_des_mal15 fll" id="card_expiryyear" style="width:125px;" onchange="removeerror(this.id)" >
                  <option value=""> Year</option>
                  <?php  for($j=2016;$j<=2100;$j++){?>
                 <option value="<?php  echo $j;?>" <?php if($carddata[0]['expiry_year']==$j){ echo "selected='selected'" ; }?> ><?php  echo $j ;?></option>
                   <?php } ?>
                </select>
              </div>
                                

                                
                                
                                
                                
                                
               <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10"> Card  Scope </p>
                <select class="oneshop_select_newfield_with_border" id="card_usage" onchange="removeerror(this.id)" >
                  <option value=""> select </option>
                  <option value="NATIONAL" <?php if($carddata[0]['usage_scope']=='NATIONAL'){ echo "selected='selected'" ; } ?> >National </option>
                  <option value="INTERNATIONAL" <?php if($carddata[0]['usage_scope']=='INTERNATIONAL'){ echo "selected='selected'" ; } ?> >InterNational </option>
                </select>
              </div>
              
              <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10"> Card Use</p>
                <select class="oneshop_select_newfield_with_border" id="card_use" onchange="removeerror(this.id)" >
					<option value="">select</option>
                  <option value="BUSINESS" <?php if($carddata[0]['usage_purpose']=='BUSINESS'){ echo "selected='selected'" ; } ?>  >Business</option>
                 <option value="PERSONAL" <?php if($carddata[0]['usage_purpose']=='PERSONAL'){ echo "selected='selected'" ; } ?>>Personal </option>
                   <option value="OFFSHORE"<?php if($carddata[0]['usage_purpose']=='OFFSHORE'){ echo "selected='selected'" ; } ?> >Offshore</option>
                   <option value="GOVERNMENTAL"<?php if($carddata[0]['usage_purpose']=='GOVERNMENTAL'){ echo "selected='selected'" ; } ?> >Government</option>
                  
                </select>
              </div>
              
              
                          <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10">  Card Type  </p>
                <select class="oneshop_select_newfield_with_border" id="card_type" onchange="removeerror(this.id)" >
                  <option value="">select</option>
                  <option value="VISA" <?php if($carddata[0]['card_type']=='VISA'){ echo "selected='selected'" ; } ?>  >Business</option>
                  <option value="MASTERCARD" <?php if($carddata[0]['card_type']=='MASTERCARD'){ echo "selected='selected'" ; } ?>  >Master card</option>
                  <option value="JCB" <?php if($carddata[0]['card_type']=='JCB'){ echo "selected='selected'" ; } ?>  >Jcb</option>
                  <option value="AMEX" <?php if($carddata[0]['card_type']=='AMEX'){ echo "selected='selected'" ; } ?>  >Amex</option>
                  <option value="WESTERN_UNION" <?php if($carddata[0]['card_type']=='WESTERN_UNION'){ echo "selected='selected'" ; } ?>  >Western Union</option>
                  <option value="CIRRUS" <?php if($carddata[0]['card_type']=='CIRRUS'){ echo "selected='selected'" ; } ?>  >Cirrus</option>
                  <option value="DISCOVER" <?php if($carddata[0]['card_type']=='DISCOVER'){ echo "selected='selected'" ; } ?>  >Discover</option>
                  <option value="MAESTRO" <?php if($carddata[0]['card_type']=='MAESTRO'){ echo "selected='selected'" ; } ?>  >Maestro</option>
                  
                </select>
              </div>
              
              
                         
   
                          
                            <div class="flr np_des_mab10 mat5" style="margin-right:28px;">
                <input type="button" value="Save"  id="oneid_updatecardsave" cardid ="<?php echo $carddata[0]['card_id'] ?>" class="button_new os_des_mal10 flr">
                <input type="button" value="Cancel"  id="oneid_cardcancel"  class="button_new os_des_mal10 flr">
              </div>
                            
<div id="sucess_msg" style="display:none;color:green">
		Data submited sucessfully
                </div>   

	

                        </div>


</div>

</div>
