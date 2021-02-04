<form id="addcarddetails">
<div class="oneshop_paybookpopup" id="addcard_div">            
    <h1 class="borderbottom wi100pstg normal pab5 mab10 lspacing"> Card Details </h1>
    <div class="oneshop_paymenttype_wrap"  id="addcards_div">   
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose Type : </span> 
                <select name="scope_type" class="oneshop_specifiedselect_new" id="scope_type">
                    <option value="">--Select--</option>
                    <option value="NATIONAL">  National </option>
                    <option value="INTERNATIONAL"> International  </option>
                </select> </p>
                </br> </br> </br>
                <span style="color:red" id="scope_type_error" ></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Number : </span> 
                <input type="text" name="card_no" id="card_no" placeholder="Enter 16 digit card number" maxlength="20"/>
                <span style="color:red" id="card_no_error" ></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Choose Usage Type : </span> 
                <select name="privacy" class="oneshop_specifiedselect_new" id="usagetype">
                    <option value="">--Select--</option>
                    <option value="BUSINESS">  Business </option>
                    <option value="PERSONAL"> Personal  </option>
                    <option value="OFFSHORE"> Offshore  </option>
                    <option value="INSTITUTIONAL"> Institutional  </option>
                    <option value="GOVERNMENTAL"> Governmental  </option>
                </select> </p>
                </br> </br> </br>
                <span style="color:red" id="usagetype_error" ></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Type : </span> 
                <select name="card_type" class="oneshop_specifiedselect_new" id="card_type">
                    <option value="">--Select--</option>
                    <option value="VISA">  Visa </option>
                    <option value="MASTERCARD"> Master Card </option>
                    <option value="JCB"> Jcb  </option>
                    <option value="AMEX"> Amex  </option>
                    <option value="WESTERN_UNION"> Western Union  </option>
                    <option value="CIRRUS"> Cirrus  </option>
                    <option value="DISCOVER"> Discover  </option>
                    <option value="MAESTRO">Maestro</option>
                </select> </p>
                </br> </br> </br>
                <span style="color:red" id="card_type_error" ></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Card Name : </span> 
                <input type="text" name="card_name" id="card_name" placeholder="Card Name" maxlength="30"/>
                
                <span style="color:red" id="card_name_error" ></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Name on card : </span> 
                <input type="text" name="name_on_card" id="name_on_card" placeholder="Name on card" maxlength="50"/>
                <span style="color:red" id="name_on_card_error"></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> CVV : </span> 
                <input type="text" name="cvv" id="cvv" placeholder="CVV" style="width:60px" maxlength="6"/>
                <span style="color:red" id="cvv_error"></span>
        </div>
        <div class="fll wi100pstg pab5 mab10">
            <p class="overflow fll"><span class="fll mar10 lh20"> Expriry Date : </span> 
                <input type="text" name="expiry_year" id="expiry_year" placeholder="e.g. xxxx" style="width:50px" maxlength="4"/> / <input maxlength="2" type="text" name="expiry_month" id="expiry_month" placeholder="e.g.xx" style="width:30px"/>
                <span style="color:red" id="expiry_year_error"></span>
        </div>

        <div class="oneshop_paybook_yesorno_buttons mat20 clearfix" id="svprgs" style="display:none;">
            <img src="<?php echo base_url();?>assets/images/loading_bar.gif" width="150">
        </div>
        <div class="oneshop_paybook_yesorno_buttons mat20 clearfix">
            <input type="button" value="Save" class="np_des_checkout_btn" name="button" id="save_card"> 
            <input type="button" value="Cancel" class="np_des_checkout_btn" name="button" id="paybook_no_btn"> 
        </div>
    </div>
</div>
</form>