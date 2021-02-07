<?php  //paybook subheader  
?>
 <div class="oisdes_subheader_cont_wrapper">
        <div class="oisdes_topmenu_rightbox">
          <ul>
            <li id="oneidnet_myaccount" ><a  class="<?php if (isset($is_oneidnet_myaccounttab_active)) {   echo 'current';
        }else{}  ?>" > Dashboard </a></li>
            <li id="oneidnet_cards"><a    class="<?php if(isset($is_oneidnet_cardstab_active)) {   echo 'current';
        }else{}  ?>"> My Saved Cards</a></li>
            <li id="oneidnet_transaction"><a  class="<?php if(isset($is_oneidnet_pentranstab_active)) {   echo 'current';
        } else{} ?>">Pending Transactions  </a></li>
            <li id="oneidnet_transactionhistory"><a  class="<?php if(isset($is_oneidnet_transhistory_active)) {   echo 'current';
        } else{} ?>"> Transaction History </a></li>
            <li id="oneidnet_paymenthistory"><a class="<?php if(isset($is_oneidnet_payment_active)) {   echo 'current';
        } else{} ?>"> Payment History </a></li>
            </ul>
        </div>
      </div>
      
      <script src="<?php echo base_url().'assets/microjs/paybook.js'?>"></script>
 
 <?php //popup for cards ?>
 
 <div class="oneshop_addcardpopup">
<div class="paybook_listview_pop">
<p class="oneshop_addcardclose" id="oneidnet_addclose">X</p>
<div class="fll np_des_mab20 np_des_mat10 wi100pstg">
<h1 class="fs14 bold"> Add New Card   </h1>
</div>




<div class="paybook_data_scroll">



<div class="Table-popup">

                          
                     <div class="group np_des_wi420 np_des_mat25 fll">
                <input type="text" class="np_des_wi420" id="card_nameadd" value="" onfocus="removeerror(this.id)"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   Card Name   </label>
              </div>
                      <div class="group np_des_wi420 fll">
                <input type="text" class="np_des_wi420" id="card_numberadd" value="" onfocus="removeerror(this.id)" required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   Card Number  </label> 
                 </div>   
                                <div class="group np_des_wi420  fll">
                <input type="text" class="np_des_wi420" id="name_oncardadd" value="" required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>  Name on the Card  </label>
              </div>


                               
             
              
                
                              
                               
	<div class="group fll">
                <input type="text" style="width:120px;"  id="card_cvvadd"  value="" onfocus="removeerror(this.id)"  required>
                <span class="highlight"></span> <span class="bar"></span>
                <label>   CVV  </label>
              </div>


<div class="group fll" style="margin-top:-10px; margin-left:35px;">
                <p class="np_des_mab2 fs11 np_des_mab10"> Expiration Date </p>
                <select class="oneshop_select_newfield_with_border fll"  onchange="removeerror(this.id)" id="card_expirymonthadd" style="width:125px;">
                  <option value=""> Month </option>
                 <?php  for($i=1;$i<=12;$i++){?>
                  <option value="<?php  echo $i ;?>"  ><?php  echo $i ;?></option>
                 <?php } ?>
                </select>
                
                <select class="oneshop_select_newfield_with_border os_des_mal15 fll" onchange="removeerror(this.id)"  id="card_expiryyearadd" style="width:125px;">
                  <option value=""> Year</option>
                  <?php  for($j=2016;$j<=2100;$j++){?>
                 <option value="<?php  echo $j;?>" ><?php  echo $j ;?></option>
                   <?php } ?>
                </select>
              </div>
                                

                                
                                
                                
                                
                                
              
              
              <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10"> Card Use</p>
                <select class="oneshop_select_newfield_with_border" id="card_useadd" onchange="removeerror(this.id)" >
					<option value="">select</option>
                  <option value="BUSINESS"  >Business</option>
                 <option value="PERSONAL" >Personal </option>
                   <option value="OFFSHORE" >Offshore</option>
                   <option value="GOVERNMENTAL" >Government</option>
                    
                </select>
              </div>
              
              
                          <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10">  Card Type  </p>
                <select class="oneshop_select_newfield_with_border" id="card_typeadd" onchange="removeerror(this.id)" >
                  <option value="">Select</option>
                  <option value="VISA"  >Visa</option>
                  <option value="MASTERCARD"   >Master card</option>
                  <option value="JCB"  >JCB</option>
                  <option value="AMEX"  >American Express</option>
                  <option value="WESTERN_UNION"  >Western Union</option>
                  <option value="CIRRUS"   >Cirrus</option>
                  <option value="DISCOVER"  >Discover</option>
                  <option value="MAESTRO"   >Maestro</option>
                  
                </select>
              </div>
              
              
                          <div class="group np_des_wi420 fll">
                <p class="fs14 np_des_mab2 np_des_mab10"> Usage </p>
                <select class="oneshop_select_newfield_with_border" id="card_usageadd" onchange="removeerror(this.id)" >
                  <option value=""> Select </option>
                  <option value="NATIONAL" >National </option>
                  <option value="INTERNATIONAL"  >International </option>
                </select>
              </div>
   
                          
                            <div class="flr np_des_mab10 mat5" style="margin-right:28px;">
                <input type="button" value="Save"  id="oneid_addcardsave"  class="button_new os_des_mal10 flr">
                <input type="button" value="Cancel"  id="oneid_addcardcancel"  class="button_new os_des_mal10 flr">
              </div>
                            

	
<div id="sucess_msg1" style="display:none;color:green">
		Card is successfully added to your Paybook Account!
                </div>   

	
                        </div>


</div>

</div>



</div>
 

