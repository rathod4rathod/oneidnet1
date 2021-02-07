    <div style="margin-left:80px;" id="tab1">
        <p class="bold fs12 mat20">  BASIC INFORMATION  </p>
        <?php
        $this->load->module('generic');
        $this->generic->basicFormView($promotion_type, $basic_info="");
        ?>

        <div class=" mab10 mat10 form_width">
            <p class="label_name label_heading"><strong> Duration </strong></p>
            <div class="form_width_half">

                <p class="label_name"> Start  </p>
                <p> <input type="text"   id="on_campaignstart" class="oneshop_productfield_textbox_date" value=""> </p>

            </div>

            <div class="form_width_half1">
                <p class="label_name"> End  </p>
                <p> <input type="text" id="on_campaignend" class="oneshop_productfield_textbox_date" value=""> </p>

            </div>

        </div>

        <div class="fll  form_width">
            <p class="label_name"> Each day budget </p>
            <p> <input type="text" class="oneshop_productfield_textbox" id="onenetwork_budget" onblur="budget()" value=""> </p>
        </div>


        <div class=" form_width">
            <p class="label_name fll"> No of days </p>
            <p> <input type="text" class="oneshop_productfield_textbox" id="onenetwork_noofdays" readonly  value="" onblur="noofdays()"> </p>
        </div>

        <div class=" form_width">
            <p class="label_name fll"> Total Campaign Cost </p>
            <p> <input type="text" class="oneshop_productfield_textbox" id="onenetwork_eachday"   value="" readonly="readonly"> </p>
        </div>
        <div class=" form_width">
            <p class="label_name fll">Target Estimation Per Day</p>
            <p> <input type="text" class="oneshop_productfield_textbox" id="eachday_target_people"   value="" readonly="readonly"> </p>
        </div>
        <div class=" form_width">
            <p class="label_name fll">Total Targets</p>
            <p> <input type="text" class="oneshop_productfield_textbox" id="target_people"   value="" readonly="readonly"> </p>
        </div>

        <div class="clearfix"></div>
        <!--<div class="mat20 mar10"> <input type="button" value="SAVE" class="np_des_checkout_btn" id="basic_save"  name="button">  </div>-->
        <div class="mat20 mar10"> <input type="button" value="NEXT" class="np_des_checkout_btn" id="onenetwork_basicinfo"  name="button">  </div>

    </div>
