    <div style="margin-left:80px;" id="tab1">
        <form method="post" name="basicinfo_form" id="basicinfo_form" >
        <p class="bold fs12 mat20">  BASIC INFORMATION  </p>
         <div class="fll  form_width">
            <p class="label_name">  Name </p> 
            <p> <input type="text"  class="oneshop_productfield_textbox" name="onenetwork_campagin" id="onenetwork_campagin"  ></textarea> </p>
        </div>
         <div class="fll  form_width">
            <p class="label_name">  Compaign text </p> 
            <p> <textarea  class="oneshop_productfield_textbox"  name ="onenetwork_text" id="onenetwork_text" rows="10" cols="20" maxlength="70"  ></textarea> </p>
        </div>

        <div class=" mab10 mat10 form_width">
            <p class="label_name label_heading"><strong> Duration </strong></p>
            <div class="form_width_half">

                <p class="label_name"> Start  </p>
                <p> <input type="text"  name="on_campaignstart" id="on_campaignstart" class="oneshop_productfield_textbox_date" value=""> </p>

            </div>

            <div class="form_width_half1">
                <p class="label_name"> End  </p>
                <p> <input type="text" name="on_campaignend" id="on_campaignend" class="oneshop_productfield_textbox_date" value=""> </p>

            </div>

        </div>

       <!-- <div class="fll  form_width">
            <p class="label_name"> Each day budget </p>
            <p> <input type="text" class="oneshop_productfield_textbox" id="onenetwork_budget" onblur="budget()" value=""> </p>
        </div>-->


        <div class=" form_width">
            <p class="label_name fll"> Duration </p>
            <p> <input type="text" class="oneshop_productfield_textbox" name="onenetwork_noofdays" id="onenetwork_noofdays" readonly  value="" onblur="noofdays()"> </p>
        </div>

       

        <div class="clearfix"></div>
        <!--<div class="mat20 mar10"> <input type="button" value="SAVE" class="np_des_checkout_btn" id="basic_save"  name="button">  </div>-->
        <div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn" id="onenetwork_basicinfo"  name="button">  </div>
</form>
    </div>
