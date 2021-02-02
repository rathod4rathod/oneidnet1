<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//for theme selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
?>    
<style type="text/css">
    
th, td{
   /* width: 50%;*/
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
            <div class="hd_heading" style="margin: 0 0 0 53px;">
                <h1>Create Promotion, Sales etc...<span></span></h1>
            </div>
                <form id="store_promos" method="post">
                    <!-- <div class="oneshop_fieldsbox" style="width: 100%"> -->
                            <table>
                                <tr>
                                    <td>
                                        <div>
                                            <div> Promotion Type </div>
                                            <select class="oneshop_nosize input" id="promo_type" onchange="removeerror(this.id)" >
                                                <option value="">--Select Promo type--</option>
                                                <option value="Sale">Sale</option>
                                                <option value="Promotion">Promotion</option>
                                                <option value="Weekend Sales">Weekend Sales</option>
                                            </select>
                                        </div>  
                                    </td> 
                                    <td>
                                        <div id="order_no_div">
                                            <div> Title  </div>
                                            <div> <input type="text" class="oneshop_nosize input" placeholder="Enter Title" id="promo_title"> </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2">
                                    <div>
                                        <div> Message  </div>
                                        <div class="fll"> <textarea class="oneshop_setspecified_textareabox input" style="width:440px;" id="promo_msg" onfocus="removeerror(this.id)" placeholder="Enter Message of Promotion" ></textarea> </div>
                                        <p class="wi100pstg fs11 clearfix gray">( <span id="count_span">250</span> Max Chacters ) </p>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div>
                                            <div> Promo Image (optional)  </div>
                                            <div class="fll"> <input type="file" class="input" name="promo_img"> </div>
                                            <p class="wi100pstg fs11 clearfix gray"></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <div>
                                        <div> Time Duration (Start - End Date)  </div>
                                            <div> 
                                            <input type='text' id="fromDate" class="input" style="width: 45%" placeholder="From Date">
                                            &nbsp;
                                            <input type='text' id="endDate" class="input" style="width: 45%" placeholder="End Date">
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                <tr> 
                                <td colspan="2" style="float: left;">
                                    <div id="error_msg"></div>
                                    <p class="flr clearfix"><input type="button" name="button" class="np_des_addaccess_btn" value="Submit" id="call_submit"> </p>
                                 </td>           
                             </tr>
                        </table>
                </form>
    </div>
    <div class="oneshop_right_newcontainer pab10" style="width: 50%;float: right;padding-top: 20px;">
         <div class="hd_heading">
            <h1>Store Promo Records<span></span></h1>
        </div>
            <table id="recordListing" style="width: 100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 20%;">Type</th>    
                        <th style="width: 20%;">Title</th>  
                        <th>End Date</th>                      
                        <th></th>
                        <th></th>                   
                    </tr>
                </thead>
            </table>
    </div>
</div>  
<!--Oneshop Content ends Here(vinod 19-05-2015)-->

<?php
$this->templates->app_footer();
?>
<script type="text/javascript" src="<?php echo base_url().'assets/microjs/pprofile.js'?>"></script>
<link rel="stylesheet" href="<?php echo base_url() . "assets/" ?>css/jquery-ui.css">
<script src="<?php echo base_url() . "assets/" ?>scripts/jquery-ui.js"></script> 
<script type="text/javascript">
$(function () {
    $("#fromDate").datepicker();
    $("#endDate").datepicker();
});
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
</script> 
