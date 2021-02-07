<div class="oneshop_paybookpopup">    
    <form method="post" name="payment_form" id="payment_form">
        <h1 class="borderbottom wi100pstg normal pab5 mab10 lspacing"> PAYBOOK </h1>
        <p class="acenter mat30 fs25"> Amount INR <span class="red"><?php echo $payment;?>/-</span> Will be Deducted from Your Account</p>
        <p class="acenter mat10 fs14">  Are you Sure Want to Proceed ? </p>
        <div class="oneshop_paybook_yesorno_buttons">
            <input type="button" name="button" class="paybook_btn" id="paybook_yes_btn" value="Yes">
            <input type="button" name="button" class="paybook_btn" id="paybook_no_btn" value="No">
        </div>

        <div class="oneshop_paymenttype_wrap"  id="cards_div" style="display:none;">

            <div class="fll wi100pstg pab5 mab10">
                <p class="overflow fll"><span class="fll mar10 lh20"> Choose payment Type : </span> <select name="usage_type" class="oneshop_specifiedselect_new" id="usage_type">
                        <option value="Business"> Business  </option>
                        <option value="Personal">  Personal </option>
                        <option value="Offshore"> Offshore </option>
                        <option value="Governmental"> Governmental  </option>
                    </select> </p>

                <span class="flr"><input type="button" name="button" class="np_des_addaccess_btn mal10" value="+ New" id="newcard_btn"></span>
            </div>


            <p class="bold fs14 pab5 borderbottom wi100pstg"> Cards to Choose for Payment </p>


            <div class="fll oneshop_paymenttype_leftbox" id="cards_list_div">
                <div class="fll overflow wi100pstg">
                    <?php 
                    if($card_details!=0) foreach($card_details as $card_details_info){{
                        ?>
                            <p class="fll mar10 paybok_field"><?php echo $card_details_info["card_number"]; ?></p>
                    <p class="lh26 fll pat5" style="width:150px;"> Card Name : <?php echo $card_details_info["card_name"]; ?>  </p>
                    <p class="lh26 fll pat5" style="width:150px;"> <input type="radio" name="promotionpayment" id="promotionpayment"  value="<?php echo $card_details_info["card_number"]; ?>"/>  </p>
                            <?php
                    }}else{
                        ?>
                    <input type="button" value="Add New Card" class="np_des_checkout_btn"    id="newcard_btn"> 
                            <?php
                    }?>
                    
                </div>


            </div>        
            <div class="oneshop_paybook_yesorno_buttons mat20 clearfix">
                <input type="button" value="Confirm to Pay" class="np_des_checkout_btn" name="button" id="confirm_pay"> 
            </div>

        </div>
</form>
    </div>    