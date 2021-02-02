<?php
$this->load->module("cookies");
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
//echo  $timezone;
?>

    	<div class="oneshop_container_sectionnew">
            
             
            

            <div class="oneshop_container_middle_section mat10">

    <div class="oneshop_left_newcontainer pab10">

    <div class="titlecontainer acenter">
    <div class="titledeco">
	<h4 class="title-text fkinlineblock black"> <?php echo $user_details[0]['profile_name']." profile " ?>  </h4>
	</div>
    </div>


<div class="np_des_company_specific_profile_imagewrap">
<form id="osdev_profile_pic_update_form">
<input type="file" name="profile_pic_update" id="osdev_profile_pic_update" style="cursor: pointer; position: absolute; width: 25px; height: 25px; margin: 5px; z-index: 110; margin-top: 186px;opacity: 0;">
                        <input type="hidden" name="current_profilepic" value="<?php if ($user_details[0]["profile_img"]) {
  echo $user_details[0]["profile_img"];
} else {
  echo "avatar.png";
} ?>" id="current_profilepic">
</form>
<p class="np_des_company_promises_imgbox">

<img src="<?php echo base_url() . "assets/"; ?>images/clickEditIconWhite.png" style="position: absolute; float: right; z-index: 100; margin:  5px; cursor: pointer; width: 25px; height: 25px;">

<?php
if ($user_details[0]["profile_img"]) { ?>
 <img src="<?php echo PROFILE_LOGO . "mi/" . $user_details[0]["profile_img"]; ?>" class="oneshop_ppProfilePic" id="osdev_user_pp">
  <?php
} else {
  ?>
<img src="<?php echo base_url() . "assets/"; ?>images/avatar.png" class="oneshop_ppProfilePic" id="osdev_user_pp">
          <?php
        }
        ?>
</p>

<form id="profile_cover_update_form">
                <input type="file" name="profile_banner" style="cursor: pointer; position: absolute; width: 25px; height: 25px; margin: 5px; z-index: 110; opacity: 0;" id="profile_cover_update">
                <input type="hidden" name="current_banner" value="<?php if ($user_details[0]["profile_cover_img"]) {
  echo $user_details[0]["profile_cover_img"];
} else {
  echo "banner.jpg";
} ?>" id="osdev_user_coverpic">
            </form>
<img src="<?php echo base_url() . "assets/"; ?>images/clickEditIconWhite.png" style="position: absolute; float: right; z-index: 100; margin:  5px; cursor: pointer;" width="25" height="25">

<p class="np_des_company_specific_profile_img">

 <?php if ($user_details[0]["profile_cover_img"]) {
                  ?>
                  <img src="<?php echo PROFILE_COVER . "orig/" . $user_details[0]["profile_cover_img"]; ?>" class="oneshop_coverPic" id="osdev_display_cover_pic">
                  <?php
                } else {
                  ?>
                  <img src="<?php echo base_url() . "assets/"; ?>images/banner.jpg" class="oneshop_coverPic" id="osdev_display_cover_pic">
  <?php
}
?>
</p>
</div>

<div class="np_des_company_profilename">
<?php echo $user_details[0]['profile_name']; ?>
</div>

 

<div class="wi100pstg mat20 fll">

<div class="click_tabs_wrap"> 
                <ul id="tabs">
      <li><a name="#tab1" href="#" id="current"> My Purchase History </a></li>
      <li><a name="#tab2" href="#"> Activity </a></li>
      <li><a name="#tab3" href="#"> Saved Products </a></li>
      <li><a name="#tab4" href="#">  Stores </a></li>    
  </ul>
</div>

<div id="content">
  
   

 
      <div id="tab1" style="display: block;">
<?php if($orderhistory[0]['order_aid']!="") {?>

      <h1 class="wi100pstg fs14 fll borderbottom pab5"> My Purchase History  </h1>
      
      <div class="fll wi100pstg mat10">
      
      
<div class="wi100pstg overflow">

<div class="flr mal15" style="margin-top:3px;">
<select name="privacy" class="oneshop_adminfilter" id="filtersearch">
<option value="">Select</option>
<option value="7">1 Week Ago</option>
<option value="15">15 Days Ago</option>
<option value="30">1 Month Ago</option>
<option value="90">3 Months Ago</option>
<option value="180">6 Months Ago</option>
<option value="365">1 Year Ago</option>


</select>
</div>
<!--<div class="flr">
<span class="fll mat5 mal20 green"><a href="#"> Select All </a>  </span> <span class="fll mat5 mal20 green"><a href="#"> Delete </a>  </span>
</div>-->

</div>




<div class="wi100pstg" id="tab1data">

		<div class="ttdes_flightsearch_topheadings_box fll">
        <div class="ttdes_flight_departure_box"> ORDER ID </div>
        <div class="ttdes_flight_arrival_box"> DATE </div>
        <div class="ttdes_flight_duration_box"> STATUS </div>
        </div>
        <?php  foreach ($orderhistory as $orderhistorydata){?>
        <div class="ttdes_flightsearch_history_content fll">
            <div class="ttdes_stores_orderid pat5"> <span style="margin-top:2px;" class="fll mar10"><input type="checkbox" style="display: none;"></span> <a class="blue" href="#"> <?php echo $orderhistorydata['order_code'];?> </a> </div>
        <div class="ttdes_stores_date pat5">
           <?php  $triggerOn = $orderhistorydata['time'];
                  $user_tz = $timezone;
                  $schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz) );
                  $schedule_date->setTimeZone(new DateTimeZone('UTC'));
                  $odate =  $schedule_date->format('M d Y  g:i A');
                  echo  $odate; // echoes 2013-04-01 22:08:00
?>


             </div>
        <div class="ttdes_flight_duration_box">
            <label><?php echo $orderhistorydata['status'];?></label>
         </div>
        </div>
        <?php } ?>




		</div>
     
      </div>


<?php } else { echo "No Orders";} ?>

      </div>
      
      <div id="tab2" style="display: none;">
      
      <h1 class="wi100pstg fs14 fll borderbottom pab5"> Activity  </h1>
      
      <div class="wi100pstg fll overflow mat10">

<div class="flr mal15" style="margin-top:3px;"> 
<select name="privacy" class="oneshop_adminfilter">
<option value="">Select Privacy</option>
<option value="Public">Public</option>
<option value="Private">Private</option>
</select> 
</div>
<div class="flr">
<span class="fll mat5 mal20 green"><a href="#"> Select All </a>  </span> <span class="fll mat5 mal20 green"><a href="#"> Delete </a>  </span>
</div>

</div>
      
      
       <div class="fll overflow mat20">
       
       <div class="click_fromdatetodate_wrap">
  <div class="fll"> <span class="fll mat5 mar10"> FILTER BY: </span> <span> 
  <select class="oneshop_specifiedselect_new">
<option>select </option>
            <option>order placed </option>
            <option>order cancelled </option
            <option>Store review </option>
            <option>product review </option>
            </select>
  </span> </div>
  </div>
  
   
<?php 

foreach($useractivity as $activity){

if($activity['type']=='PRODUCT_REVIEW'){
 ?>

<div class="store_activity_maindiv">
<div class="store_tumbnail">
<?php if($activity['image']!=''){ ?>
<a href="" title="<?php echo $activity['name'] ?>"><img src="<?php echo base_url() .'stores/'.$activity['code'].'/products/'.$activity['product_aid_fk'].'/li/'.$activity['image']?>"></a>
<?php }else{?>
<a href="" title="<?php echo $activity['name'] ?>"><img src="<?php echo base_url().'assets/images/noproduct.jpg'?>"></a>
<?php } ?>
</div>
<div class="store_searchText">
<div class="heading">
<a href=""><span class="historyHead fs14">  <?php echo"You have submitted the review for the  product : ". $activity['name'] ?></span></a>
</div>
<span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $activity['orderkey']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12"> <?php echo  ucfirst($activity['review_text']) ."</br>" ."Rating".": ". $activity['rating']."/ 5 "   ?> </div> <div class="historyDiscript mal5 fll"> </div> </div>
</div>
</div>
<?php }

else if($activity['type']=='STORE_REVIEW'){
 ?>

<div class="store_activity_maindiv">
<div class="store_tumbnail">
<?php if($activity['image']!=''){ ?>
<a href="" title="<?php echo $activity['name'] ?>"><img src="<?php echo base_url() .'stores/'.$activity['code'].'/logo/mi/'.$activity['image'] ?>" height="100" width="100"/></a>
<?php }else{?>
<a href="" title="<?php echo $activity['name'] ?>"><img src="<?php echo base_url().'assets/images/noproduct.jpg'?>"></a>
<?php } ?>
</div>
<div class="store_searchText">
<div class="heading">
<a href="" ><span class="historyHead fs14">  <?php echo"You have submitted the review for the  store : " .ucfirst($activity['name']);  ?></span></a>
</div>
<span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $activity['orderkey']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12"> <?php echo  ucfirst($activity['review_text']) ."</br>" ."Rating".": ". $activity['rating']."/ 5 "   ?>  </div> <div class="historyDiscript mal5 fll"> <?php //echo $activity['name']  ?> </div> </div>
</div>
</div>
<?php }

else if($activity['type']=='ORDER_PLACED'){
 ?>

<div class="store_activity_maindiv">
<div class="store_tumbnail"><img src="images/13.jpg"></div>
<div class="store_searchText">
<div class="heading">
<span class="historyHead fs14">  <?php echo"You have placed  an order with order no  ";?><a href=""><?php echo $activity['code']  ?></a></span>
</div>
<span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $activity['orderkey']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12">   </div> <div class="historyDiscript mal5 fll">  </div> </div>
</div>
</div>
<?php }
else if($activity['type']=='ORDER_CANCELLATION'){
 ?>

<div class="store_activity_maindiv">
<div class="store_tumbnail"><img src="images/13.jpg"></div>
<div class="store_searchText">
<div class="heading">
<span class="historyHead fs14">  <?php echo"You have cancelled  an order  with order no  ";?> <a href=""><?php echo $activity['code']  ?></a></span>
</div>
<span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $activity['orderkey']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12">  </div> <div class="historyDiscript mal5 fll"> </div> </div>
</div>
</div>
<?php }
} ?>




       
       
       </div>
         
          
      </div>
      
      
      
      <div id="tab3" style="display: none;">
      
      <h1 class="wi100pstg fs14 fll borderbottom pab5"> Saved Products  </h1>
      
      <div class="wi100pstg borderbottom pab10 fll overflow mat10">

<div class="flr mal15" style="margin-top:3px;"> 
<select name="privacy" class="oneshop_adminfilter">
<option value="">Select Privacy</option>
<option value="Public">Public</option>
<option value="Private">Private</option>
</select> 
</div>
<div class="flr">
<span class="fll mat5 mal20 green"><a href="#"> Select All </a>  </span> <span class="fll mat5 mal20 green"><a href="#"> Delete </a>  </span>
</div>

</div>
          
    	<div class="fll overflow mat20" >
        <?php if($savedproducts[0]['rec_aid']!=''){ foreach($savedproducts as $savedproduct){ ?>
    <div class="oneshop_pro_saved_products_wrap">
    <div class="oneshop_proimagebox"> 
<?php if($savedproduct['primary_image']!=''){ ?>
    <img src="<?php echo base_url().'stores/'.$savedproduct['store_code'].'/products/'.$savedproduct['product_aid'].'/mi/'. $savedproduct['primary_image']?>"> 
<?php }else{ ?>
<img src="<?php echo base_url().'assets/images/noproduct.jpg'?>">
<?php } ?>
    </div>
    <div class="oneshop_product_ratebg_box">
    <p class="aleft"> <?php echo  $savedproduct['product_name'] ?> </p>
    <p class="bold fs14 aleft"><?php echo  $savedproduct['cost_price'] ?> </p>
    </div>
    </div>
<?php }}else{
echo "No Products";
} ?>
    
   
    
        
        
        </div>
    
          
          
      </div>
      
      
      
      
      <div id="tab4" style="display: none;">
      
      <h1 class="wi100pstg fs14 fll borderbottom pab5"> Stores  </h1>
      
      <div class="wi100pstg borderbottom pab10 fll overflow mat10">

<div class="flr mal15" style="margin-top:3px;"> 
<select name="privacy" class="oneshop_adminfilter">
<option value="">Select Privacy</option>
<option value="Public">Public</option>
<option value="Private">Private</option>
</select> 
</div>
<div class="flr">
<span class="fll mat5 mal20 green"><a href="#"> Select All </a>  </span> <span class="fll mat5 mal20 green"><a href="#"> Delete </a>  </span>
</div>

</div>
      
      
      <div class="fll wi100pstg mat20">
           
    
    <div class="fll mab10" >
    <ul style="float:left; list-style:none; width:620px;">
<?php 
if($friendstores[0]['store_aid']!=''){
foreach($friendstores as $store){
//echo "<pre>";print_r($friendstores);
if($store['profile_image_path']!=''){
?>
 <li class="mar5" style="float:left;"> <img src="<?php echo base_url().'stores/'. $store['store_code'].'/logo/mi/'.$store['profile_image_path'] ?>"></li>
 <?php }else{ ?>
<li class="mar5" style="float:left;"><img src="<?php echo base_url().'assets/images/noproduct.jpg'?>"></li>
<?php } ?>  
<?php }


 }else{ echo "No Stores ";}?>
    </ul>
    </div>
           
    </div>
        
      </div>
      
      
      
      
  </div>

</div>
 
 
    
    
    
	</div>
    
    
  
<div class="oneshop_right_newcontainer">


           
<div class="oneshop_product_images mat10">
            
           
            
            
            
            
            </div>
</div>
    
            
           
             
            
            
            
            </div>
        	                  
            </div>          
        </div>
    <!--Oneshop Content ends Here(vinod 19-05-2015)-->            

    <!--Oneshop Footer starts Here(vinod 19-05-2015)-->
    	<?php $this->templates->app_footer(); ?>
    <!--Oneshop Footer ends Here(vinod 19-05-2015)-->            
	</div>
</div>




   <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

  <script>
    function resetTabs(){
        $("#content > div").hide(); //Hide all content
        $("#tabs a").attr("id",""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

    (function(){
        $("#content > div").hide(); // Initially hide all content
        $("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content > div:first").fadeIn(); // Show first tab content
        
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
            if ($(this).attr("id") == "current"){ //detection for current tab
             return       
            }
            else{             
            resetTabs();
            $(this).attr("id","current"); // Activate this
            $($(this).attr('name')).fadeIn(); // Show content for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
          if (myUrlTab == myUrlTabName + i) {
              resetTabs();
              $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
              $(myUrlTab).fadeIn(); // Show url tab content        
          }
        }
    })()
  </script>   






</body>
</html>

<script>
    $('#filtersearch').change(function(){
       var days=this.value;
      $.ajax({
            type: "POST",
            url: oneshop_url+ "/home/filter_orderhistory",
            data: {days: days},
            success: function (data)
            {
                //alert(data);
                $('#tab1data').html(data);
//console.log(data);
  //          alert(data);



            }
        });
    });
</script>
