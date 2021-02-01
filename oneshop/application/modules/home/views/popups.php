<?php
$this->load->module("templates");
$this->templates->app_header();
?>

    <!--Oneshop Content starts Here(vinod 19-05-2015)-->
    	<div class="oneshop_container_sectionnew">
        	
            <div class="oneshop_container_middle_section mat10">
             
            
              
            <div class="oneshop_paybookpopup">
            
            <h1 class="borderbottom wi100pstg normal pab5 mab10 lspacing"> PAYBOOK </h1>
            
            

            
           <p class="acenter mat30 fs25"> Amount INR <span class="red"> 99,9,009 /- </span> Will be Deducted from Your Account</p>
           <p class="acenter mat10 fs14">  Are you Sure Want to Proceed ? </p>
            
            
            <div class="oneshop_paybook_yesorno_buttons">
            <input type="button" name="button" class="paybook_btn" value="Yes">
            <input type="button" name="button" class="paybook_btn" value="No">
            </div>
            
            <div class="oneshop_paymenttype_wrap" style="display:none;">
            
            <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose payment Type : </span> <select name="privacy" class="oneshop_specifiedselect_new">
<option value="">  Governmental </option>
<option value="Public"> Institutional </option>
<option value="Private"> Personal Expense  </option>
</select> </p>

 <span class="flr"><input type="button" name="button" class="np_des_addaccess_btn mal10" value="+ New"></span>
</div>


 <p class="bold fs14 pab5 borderbottom wi100pstg"> Cards to Choose for Payment </p>
 
 	
    	<div class="fll oneshop_paymenttype_leftbox">
        
         <div class="fll overflow wi100pstg">
         <p class="fll mar10"> <input type="text" placeholder="Card 1 ( x x x x x)" class="paybok_field"> </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         </div>
         
         <div class="fll overflow wi100pstg">
         <p class="fll mar10"> <input type="text" placeholder="Card 1 ( x x x x x)" class="paybok_field"> </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         </div>
         
         <div class="fll overflow wi100pstg">
         <p class="fll mar10"> <input type="text" placeholder="Card 1 ( x x x x x)" class="paybok_field"> </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         </div>
         
         <div class="fll overflow wi100pstg">
         <p class="fll mar10"> <input type="text" placeholder="Card 1 ( x x x x x)" class="paybok_field"> </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : Never  </p>
         </div>
        
        </div>
        
        <div class="oneshop_paybook_yesorno_buttons mat20 clearfix">
           <input type="button" value="Confirm to Pay" class="np_des_checkout_btn" name="button"> 
            </div>
        
            </div>
            
            </div>
            
            
            
            
            
            <div class="oneshop_paybookpopup">
            
           
            <h1 class="acenter normal mat20"> You Dont's Have Any Paybook Account   </h1>
           <p class="acenter mat10 mab10 fs14">  Click Here to Pay Using <a href="#" class="blue">Paybook </a> </p>
            
            
            
            </div>
            
            
            
            <div class="oneshop_paybook_success_popup">
            <p class="oneshop_paybook_stick">&nbsp;</p>
            
            <h1 class="acenter normal mat20"> Payment Success !   </h1>
            <p class="acenter mat20 fs14 bgcolor3">  Your Transaction id is <span class="bold mal5"> ID00001 </span>  </p>
            <p class="acenter mat30 fs14"> Amount INR <span class="red"> 99,9,009 /- </span> has been debited from Your Account</p>
            <div class="overflow mat30" style="width:240px; margin:0 auto;"><span class="fll"><img src="Images/smile.png" width="39" height="40"></span> <p class="fll fs25 normal mat10 mal10"> Thanks for Shopping   </p> </div>
            
            <p class="acenter mat20"> <a href="#" class="banner_borderbottom"> Rate to us </a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" class="banner_borderbottom"> Write to us </a> </p>
            </div>
            
            
            
            
            
            
        	                  
            </div>          
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            
<?php
$this->templates->app_footer();
?>