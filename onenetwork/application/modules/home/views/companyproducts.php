<?php // echo "<pre>";print_r($company_products);  echo "</pre>";?>

<?php // print_R($company_service); 
foreach($company_products as $company_serviceinfo){
    ?>
<div class="codes_userprofile_smallbox" id="productBox_<?php echo $company_serviceinfo["rec_aid"];?>">
    <a href="#" onclick="deleteProduct(<?php echo $company_serviceinfo["rec_aid"];?>);">
            <img src="<?php echo base_url();?>assets/images/edit_3.png" class="codes_editicon_userprofile"> </a>
    <a href="#" onclick="editproducts(<?php echo $company_serviceinfo["rec_aid"];?>);">
        <img src="<?php echo base_url(); ?>assets/images/edit_1.png" class="codes_editicon_userprofile"></a>
    <p class="Black bold fs14 pat5 mat10 ptt<?php echo $company_serviceinfo["rec_aid"];?>"><?php echo $company_serviceinfo["name"];?></p>            
    <img src="<?php echo base_url()."assets/primages/".$company_serviceinfo["image_path"];?>" width="100" class="pimg<?php echo $company_serviceinfo["rec_aid"];?>"">    
    <p class="fs12 black pat5  pdes<?php echo $company_serviceinfo["rec_aid"];?>">
    
            <?php echo $company_serviceinfo["content"];?></p>
</div>
        <?php    
}?>

 <div class="co-ofc-popup" id="cmpnyaddproduct" style="display: none;">
        <div class="popup-div">
        <div class="db-box-title pu-bb">
                <h5>PRODUCTS</h5>
                <div class="db-box-tools">
                    <a class="close top-info-btn" href="#">Close</a>
                </div>
            </div>
            <form id="addcmpyproduct" role="form" class="pu-form">
                <div class="pu-fg">
                    <label for="m-whome" class="pu-label wi16 fll"> Title :</label>
                    <div class="wi75 fll">          
                        <input type="text" placeholder="Service Title" id="producttitle" name="producttitle" class="pu-input">
                    </div>
                </div>
                <div class="pu-fg">
                    <label for="m-subject" class="pu-label wi16 fll"> Description :</label>
                    <div class="wi75 fll">
                        <textarea style="height: 50px;" class="pu-input" id="productdescription" placeholder="Service Description..." name="productdescription"></textarea>
                    </div>
                </div>
                <div class="pu-fg">
                    <label for="m-subject" class="pu-label wi16 fll"> Product Image :</label>
                    <div class="wi75 fll">
                        <input type="file" name="prdimage" id="prdimage" class="pu-input">
                        <!--<textarea style="height: 50px;" class="pu-input" id="" placeholder="Service Description..." name="Address"></textarea>-->
                    </div>
                </div>
            <div class="flr mar20 overflow mat30">
                <div class="db-box-tools">
                    <!--<a class="" id=""> Add </a>-->
                    <input type="submit" value="Add" id="productaddsubmit" class="top-info-btn">
                </div>
            </div>    
            </form>
            

        </div>
    </div>



<div class="co-ofc-popup" id="prdtupdatepp" style="display: none;">
    <div class="popup-div">

        <div class="db-box-title pu-bb">
            <h5>Edit Product</h5>
            <div class="db-box-tools">
                <a class="close top-info-btn" href="#">Close</a>
            </div>
        </div>
        

        <form role="form" id="updateproduct" class="pu-form">
            <input type="hidden" id="productaid" name ="prdaid" value="">
                <div class="pu-fg">
                    <label for="m-whome" class="pu-label wi16 fll"> Title :</label>
                    <div class="wi75 fll">          
                        <input type="text" placeholder="Service Title" id="productTitleedit" name="productTitleedit" class="pu-input">
                    </div>
                </div>
                <div class="pu-fg">
                    <label for="m-subject" class="pu-label wi16 fll"> Description :</label>
                    <div class="wi75 fll">
                        <textarea style="height: 50px;" class="pu-input" id="productDescriptioneeidt" placeholder="Service Description..." name="productDescriptioneeidt"></textarea>
                    </div>
                </div>
            <div class="pu-fg">
                    <label for="m-subject" class="pu-label wi16 fll"> Product Image :</label>
                    <div class="wi75 fll">
                        <input type="file" name="prdimageupdate" id="prdimageupdate" class="pu-input">
                      
                    </div>
                </div>
            <div class="flr mar20 overflow mat30">
            <div class="db-box-tools">
                <input type="submit" value="Update" id="cmpnprdtupdate"  class="top-info-btn" >
                <!--<a class="top-info-btn" id=""> Update </a>-->
            </div>
        </div>
        </form>


        

    </div>
</div>