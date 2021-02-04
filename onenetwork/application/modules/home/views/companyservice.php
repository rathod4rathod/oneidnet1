<?php // print_R($company_service); 
foreach($company_service as $company_serviceinfo){
    ?>
<div class="codes_userprofile_smallbox" id="serviceBox_<?php echo $company_serviceinfo["rec_aid"];?>">
    <a href="#" onclick="deleteService(<?php echo $company_serviceinfo["rec_aid"];?>);">
            <img src="<?php echo base_url();?>assets/images/edit_3.png" class="codes_editicon_userprofile"> </a>
    <a href="#" onclick="editservices(<?php echo $company_serviceinfo["rec_aid"];?>);">
        <img src="<?php echo base_url(); ?>assets/images/edit_1.png" class="codes_editicon_userprofile"></a>
    <p class="Black bold fs14 pat5 mat10 tt<?php echo $company_serviceinfo["rec_aid"];?>"><?php echo $company_serviceinfo["title"];?></p>            
    <p class="fs12 black pat5  des<?php echo $company_serviceinfo["rec_aid"];?>"><?php echo $company_serviceinfo["content"];?></p>
</div>
        <?php    
}?>

 <div class="co-ofc-popup" id="addservices" style="display: none;">
        <div class="popup-div">
        <div class="db-box-title pu-bb">
                <h5>SERVICES</h5>
                <div class="db-box-tools">
                    <a class="close top-info-btn" href="#">Close</a>
                </div>
            </div>
            <form role="form" class="pu-form">
                <div class="pu-fg">
                    <label for="m-whome" class="pu-label wi16 fll"> Title :</label>
                    <div class="wi75 fll">          
                        <input type="text" placeholder="Service Title" id="serviceTitle" class="pu-input">
                    </div>
                </div>
                <div class="pu-fg">
                    <label for="m-subject" class="pu-label wi16 fll"> Description :</label>
                    <div class="wi75 fll">
                        <textarea style="height: 50px;" class="pu-input" id="serviceDescription" placeholder="Service Description..." name="Address"></textarea>
                    </div>
                </div>
                
            </form>
            <div class="flr mar20 overflow mat30">
                <div class="db-box-tools">
                    <a class="top-info-btn" id="addmore_service_submit"> Add </a>
                </div>
            </div>

        </div>
    </div>



<div class="co-ofc-popup" id="serviceedit" style="display: none;">
    <div class="popup-div">

        <div class="db-box-title pu-bb">
            <h5>SERVICES</h5>
            <div class="db-box-tools">
                <a class="close top-info-btn" href="#">Close</a>
            </div>
        </div>
        <input type="hidden" id="serviceaid" value="">

        <form role="form" class="pu-form">
                <div class="pu-fg">
                    <label for="m-whome" class="pu-label wi16 fll"> Title :</label>
                    <div class="wi75 fll">          
                        <input type="text" placeholder="Service Title" id="serviceTitleedit" class="pu-input">
                    </div>
                </div>
                <div class="pu-fg">
                    <label for="m-subject" class="pu-label wi16 fll"> Description :</label>
                    <div class="wi75 fll">
                        <textarea style="height: 50px;" class="pu-input" id="serviceDescriptioneeidt" placeholder="Service Description..." name="Address"></textarea>
                    </div>
                </div>
        </form>


        <div class="flr mar20 overflow mat30">
            <div class="db-box-tools">
                <a class="top-info-btn" id="serviceeditupdate"> Update </a>
            </div>
        </div>

    </div>
</div>