<?php
/**
 * Manage Staffs View Page
 * Here we can manage all types of roles
 * ADMIN / SUPER / PRODUCT MANAGER / ORDER MANAGER
 */

//Getting URL Passed Segments Data
 $store_code = $this->uri->segment(2);
 $upd_status = $this->uri->segment(3);

//For display saved staff records
$storeObj = $this->load->module('stores');
$staffSavedArr =  $this->stores->getSavedStaffDetails($store_code);
if(count($staffSavedArr) > 0){
    $roleWiseUsersArr = array();
    foreach($staffSavedArr as $staffGetArr){
        if($staffGetArr["user_id_fk"] != 0){
            $userDetArr = array();
            $userDetArr["user_id"] = $staffGetArr["user_id_fk"];
            $userDetArr["email"] = $staffGetArr["email"];
            $userDetArr["user_fullname"] = $staffGetArr["user_full_name"];
            $userDetArr["staff_id"] = $staffGetArr["rec_aid"];
            $roleWiseUsersArr[$staffGetArr["role"]][] = $userDetArr;
        }
    }
}

//Check for browsing staff user is ADMIN role or not
$userID = $storeObj->get_UserId();
$adminStaffCnt = $storeObj->staffRoleCheck($userID,$store_code, "ADMIN");

//Check for browsing staff user is SUPER role or not
$superStaffCnt = $storeObj->staffRoleCheck($userID,$store_code, "SUPER");
//For store theme  selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);

 if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
 } ?>
<style type="text/css">
    
th, td{
    width: 50%;
    padding: 8px;
}

</style>

<div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("store_staff"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 


<div class="store_mainwrap">
<div class="oneshop_left_newcontainer pab10" style="width: 40%">
 <div class="hd_heading">
            	<h1>Add Staff<span></span></h1>
            </div>
        
        <?php if($upd_status == 1){?>
        <span style="color:red;" id="status_disp_span"><strong>Saved Successfully</strong></span>
        <?php }?>
        <form id="store_staff_settings" method="post">
                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url();?>">
                <input type="hidden" name="store_code" id="store_code" value="<?php echo $store_code;?>">
                <input type="hidden" name="suser_id" id="suser_id" value="">
                 <div id="admin_staff_dyn">
                    <div class="oneshop_fieldsbox" style="width: 100%">
                        <div class="wi100pstg mab5"> Store Administrators </div>
                        <?php
                         if(count($roleWiseUsersArr["ADMIN"]) > 0){
                            foreach($roleWiseUsersArr["ADMIN"] as $adminUsrArr){?>
                            <div class="wi100pstg" title="<?php  echo $adminUsrArr["user_fullname"];?>">
                                <span id="saved_span_<?php echo $adminUsrArr["user_id"];?>" style="display:inline;">
                                    <strong><?php echo $adminUsrArr["email"];?></strong>
                                </span>
                                <span id="saved_span_input_<?php echo $adminUsrArr["user_id"];?>" style="display:none;">
                                    <input type="text" class="oneshop_productfield_textbox" name="super_<?php echo $adminUsrArr["user_id"];?>" id="admin_<?php echo $adminUsrArr["user_id"];?>" value="<?php echo $adminUsrArr["email"];?>">
                                </span>
                                <?php 
                                if($adminStaffCnt > 0)
                                {
                                ?>
                                    <span class="flr blue" id="edit_span_<?php echo $adminUsrArr["user_id"];?>" style="display:inline;"> <a href="javascript:edit_staff('admin','<?php  echo $adminUsrArr["user_id"];?>');"> Edit </a> </span>
                                    <span class="flr blue" id="link_save_span_<?php echo $adminUsrArr["user_id"];?>" style="display:none;"> <a href="javascript:save_staff('admin','<?php  echo $adminUsrArr["user_id"];?>','<?php echo $adminUsrArr["staff_id"]; ?>');"> Update </a> 
                                    </span>
                                    &nbsp;&nbsp;<span class="flr blue" id="link_cancle_span_<?php echo $adminUsrArr["user_id"];?>" style="display:none;"> <a href="javascript:cancle_staff('admin','<?php  echo $adminUsrArr["user_id"];?>');"> Cancle </a> 
                                    </span>
                                <?php 
                                    }
                                ?>
                                <br/>
                                <br/>    
                            </div>
                        <?php
                            }
                         }
                        ?>
                    </div>
                 </div> 

                 <div id="add_staff_dyn">
                    <div class="oneshop_fieldsbox" style="width: 100%">
                        <!-- <div class="wi100pstg mab5" style="font-size: 15px;"> <strong> Add Staff </strong> </div> -->
                        <table>
                            <tr>
                            <td>
                                <!-- <div class="wi100pstg"> -->
                                <input type="text" class="wi100pstg" style="width: 32%;padding: 11px 10px;height: auto;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;" placeholder="Enter First Name" name="add_fname" id="add_fname"><p id='staff_err_0' class='wi100pstg fs11 red clearfix'></p>
                            </td>&nbsp;
                            <td>
                                <input type="text" class="wi100pstg" style="width: 32%;padding: 11px 10px;height: auto;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;" placeholder="Enter Last Name" name="add_lname" id="add_lname"><p id='staff_err_1' class='wi100pstg fs11 red clearfix'></p>
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <select id="add_position" class="wi100pstg" name="add_position" style="width: 35.5%;padding: 11px 10px;height: auto;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;">
                                    <option value="">Select Responsibility</option>
                                    <option value="SUPER">Super User</option>
                                    <option value="ORDER_MANAGER">Order Manager</option>
                                    <option value="PRODUCT_MANAGER">Product Manager</option>
                                    <option value="ASSISTANT_MANAGER">Assistant Manager</option>
                                    <option value="GENERAL_MANAGER">General Manager</option>
                                    <option value="DEPARTMENT_MANAGER">Department Manager</option>
                                    <option value="WAREHOUSE_SUPERVISOR">Warehouse Supervisior</option>
                                    <option value="STOCKMAN">Stock Man</option>
                                    <option value="SALESMAN">Sales Man</option>
                                    <option value="PACKAGER">Packager</option>
                                    <option value="ADMIN_TECH">Admin Tech</option>
                                    <option value="SUPPORT_TECH">Support Tech</option>
                                    <option value="MATERIAL_HANDLER">Material Handler</option>
                                    <option value="CLERK">Clerk</option>
                                    <option value="DRIVER">Driver</option>
                                    <option value="HOUSE_KEEPER">House Keeper</option>
                                    <option value="SECURITY">Security</option>
                                    <option value="RECORDS_CLERK">Records Clerk</option>
                                    <option value="COUNCIL">Council</option>
                                </select><p id='staff_err_2' class='wi100pstg fs11 red clearfix'></p>
                            </td>
                            <td>
                                <input type="text" class="wi100pstg" style="width: 32%;padding: 11px 10px;height: auto;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;" placeholder="username@oneidnet.com" name="add_mail" id="add_mail"><p id='staff_err_3' class='wi100pstg fs11 red clearfix'></p>
                            </td>
                            <br />

                            <tr>
                                <td colspan="2">
                                <textarea type="text" class="wi100pstg" placeholder = "Store Location" name="add_sloc" id="add_sloc" style="width: 70%;padding: 11px 10px;height: 50px;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;" ></textarea><p id='staff_err_4' class='wi100pstg fs11 red clearfix'></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                <textarea type="text" class="wi100pstg" placeholder = "Brief Bio" name="add_sbio" id="add_sbio" style="width: 70%;padding: 11px 10px;height: 70px;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;" ></textarea><p id='staff_err_5' class='wi100pstg fs11 red clearfix'></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <label style="margin-top: 10px;">Working in Store : (Number of Years & Months)</label>
                                </td>
                                <td style="display: inline-flex;width: 100%">
                                <input type="text" id="staff_wy" name="staff_wy" style="width: 25%;padding: 11px 10px;height: auto;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;margin-right: 8px;" placeholder="Number of Years"><p id='staff_err_6' class='fs11 red clearfix'></p>
                                <input type="text" id="staff_wm" name="staff_wm" style="width: 25%;padding: 11px 10px;height: auto;border: 1px solid #dedede;font: 400 14px catriel!important;border-radius: 0;font-family: Raleway-Regular;float: right;" placeholder="Number Of Months"><p id='staff_err_7' class='fs11 red clearfix'></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <?php if($adminStaffCnt > 0){?>
                    <div id="add_staff" class="flr mab10" style="margin-right:150px;">
                        <input type="submit" class="np_des_addaccess_btn" id="save_staff_detail" value="Save">
                        <span id="add_load" style="display:none;"><img src="<?php echo base_url();?>/assets/images/procs.gif" width="30px" height="30px"></span>
                    </div>
                <?php }?>                  
        </form>
        
    </div>
    <div class="oneshop_right_newcontainer pab10" style="width: 50%;padding-top: 20px;">
         <div class="hd_heading">
            <h1>Staff Record<span></span></h1>
        </div>
            <table id="recordListing" style="width: 90%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Staff Name</th>    
                        <th>Responsibility</th>                     
                        <th></th>
                        <th></th>                   
                    </tr>
                </thead>
            </table>
    </div>
</div>  
<script type="text/javascript">

    var dataRecords = $('#recordListing').DataTable({
        "processing":true,
        "serverSide":true,              
        "order":[],
        "ajax":{
            url: oneshop_url+"/stores/staff_list",
            type:"POST",
        },
        "columnDefs":[
            {
                "targets":[1, 2, 3, 4],
                "orderable":false,
            },
        ],
            "pageLength": 10
    });
    //Edit Staff function @ update level
    function edit_staff(stype,userid){        
        $("#saved_span_"+userid).css("display", "none");
        $("#saved_span_input_"+userid).css("display", "inline");
        $("#edit_span_"+userid).css("display", "none");
        $("#link_cancle_span_"+userid).css("display", "inline");        
        $("#link_save_span_"+userid).css("display", "inline");
    }
    function cancle_staff(stype,userid){        
        $("#saved_span_"+userid).css("display", "block");
        $("#saved_span_input_"+userid).css("display", "none");
        $("#edit_span_"+userid).css("display", "block");
        $("#link_cancle_span_"+userid).css("display", "none");
        $("#link_save_span_"+userid).css("display", "none");
        $("#"+stype+"_"+userid).val($("#saved_span_"+userid).find("strong").html());
    }

    $("#recordListing").on('click', '.delete', function(){
        var id = $(this).attr("id");        
        // var action = "deleteRecord";
        if(confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url:oneshop_url+"/stores/valid_staff_remove",
                type:"POST",
                data:{id:id},
                success:function(data) {  
                    if($.trim(data) == "DELETED"){                  
                        dataRecords.ajax.reload();
                    }
                }
            })
        } else {
            return false;
        }
    });

    $("#recordListing").on('click', '.update', function(){
        var id = $(this).attr("id");
        $.ajax({
            url:oneshop_url+"/stores/get_staff_record",
            method:"POST",
            data:{id:id},
            dataType:"json",
            success:function(data){
                $('#add_fname').val(data.f_name);
                $('#add_lname').val(data.l_name);
                $('#add_position').val(data.role);              
                $('#add_mail').val(data.email);
                $('#add_sloc').val(data.sloc);              
                $('#add_sbio').val(data.sbio);
                $('#staff_wy').val(data.syear);              
                $('#staff_wm').val(data.smonth);           
                $('#suser_id').val(data.user_id_fk);
                document.getElementById("add_mail").readOnly = true;
                $('#action').val('updateRecord');
                $('#save_staff_detail').val('Update');
            }
        })
    });
    
    //Delete Staff Option
    function delete_staff(stype,userid){
        
//    var uemail = $("#"+stype+"_"+userid).val();
      var uemail = $("#saved_span_"+userid).find("strong").html();
      var store_code = $.trim($("#store_code").val());
      if( confirm("Are you sure, you want to remove this user "+uemail+"?") ){
          $.ajax({
                type: 'POST',
                url: oneshop_url+"/stores/valid_staff_remove",
                data: { staff_email:uemail, store_code : store_code, profile_save_id:userid} ,
                success: function (data) {
                     if($.trim(data) == "DELETED"){
                         location.reload();
                     }
                }
          });
      }
    }
    
    //Save Staff Function @ update level
    function save_staff(stype,userid,staffid){
        //Update link disable
        $("#link_save_span_"+userid).css("display",'none');
        // $("#link_dummy_save_span_"+userid).css("display",'inline');
        var uemail = $("#"+stype+"_"+userid).val();
        
        if (is_Empty(uemail) != true || isValid_Email(uemail) != true) {
            $("#"+stype+"_"+userid).addClass("redfoucusclass");            
            //Update link disable
            $("#link_save_span_"+userid).css("display",'none');
            // $("#link_dummy_save_span_"+userid).css("display",'inline');
            $("#"+stype+"_"+userid).focus();
        }else{
            $("#"+stype+"_"+userid).attr('readonly', true);
            $("#"+stype+"_"+userid).removeClass("redfoucusclass");
            
            var baseurl = $.trim($("#baseurl").val());
            var store_code = $.trim($("#store_code").val());
            var validArr = new Array();
            $.ajax({
                type: 'POST',
                url: oneshop_url+"/stores/valid_staff_checking",
                data: { order_emails:uemail, store_code : store_code, profile_save_id:userid} ,
                success: function (data) {
                    

                    if($.trim(data) == "INVALID_USER" || $.trim(data) == "EXISTING_STAFF_USER"){
                        $("#"+stype+"_"+userid).addClass("redfoucusclass");
                        $("#"+stype+"_"+userid).attr('readonly', false);
                        $("#link_save_span_"+userid).css("display",'inline');
                        // $("#link_dummy_save_span_"+userid).css("display",'none');                        
                        var res=data.replace(/_/g, " "); 
                        alert(res);
                    }else{
                        if($.trim(data) == "VALID_UPDATE" ){
                           $("#"+stype+"_"+userid).attr('readonly', false);
                           //Update link enable
                            $("#link_save_span_"+userid).css("display",'inline');
                            // $("#link_dummy_save_span_"+userid).css("display",'none');
                        }
                        else if($.trim(data) == "VALID"){                            
                            if(confirm("Would You Like To Give "+stype+" Privileges")==true){
                                validArr[0] = uemail;
                            $.ajax({
                                type: 'POST',
                                url: oneshop_url+"/stores/valid_staff_update",
                                data: { emails: validArr, store_code : store_code, role_type:stype, staff_id:staffid } ,
                                success: function (data) {
                                    if($.trim(data) == "STAFF_UPDATED"){
                                        location.reload();
                                    }else{
                                        alert(data);
                                    }
                                }
                            });    
                            }else{
                                $("#"+stype+"_"+userid).attr('readonly', false);
                           //Update link enable
                            $("#link_save_span_"+userid).css("display",'inline');
                            // $("#link_dummy_save_span_"+userid).css("display",'none');
                            }                            
                        }
                    }
                }
            });
            
        }
    }
    
</script>
 <?php if($upd_status == 1){?>
        <script type="text/javascript">
            function display_status_hide(){
                $("#status_disp_span").hide('slow');
              }
                 setTimeout(display_status_hide, 2000);
        </script>
 <?php }?>
</script>
<script type="text/javascript" src="<?php echo base_url() . "/application/modules/stores/microjs/"; ?>store_staff.js"></script>