<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("mystores");
$store_code=$this->uri->segment(2);
//For store theme  selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png';
 }else{
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png';
     }
     //end store theme  selected
//User check wheather Admin or normal user check
if($staff_details[0]["cnt"]!=0){
  $userType=1;
}
else{
  $userType=0;
}
?>
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<?php  if($store_details[0]['is_active']==1) {
  ?>
  <style type="text/css">

body {
  font-family: Arial, Helvetica, sans-serif;
}


.img-radius {
    z-index: 20;
    top: 5px;
    left: 5px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  padding: 20px;
}

.title {
  color: grey;
  font-size: 10px;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 22.9%;
  padding: 0 10px;
  margin-top: 15px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
/*.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding-top: 16px;
  padding-bottom: 16px;
  text-align: left;
  background-color: #f1f1f1;
}*/

hr.dotted {
  margin-top: 6px;
  border-top: 1px dashed #828282;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}


table, th, td {
  border-collapse: collapse;
}

th, td {
  padding: 15px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
  </style>
  <style type="text/css">
    .heading {
  font-size: 15px;
  margin-right: 15px;
  font-weight: 600;
  margin-top: 4px;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 100%;
  margin-top: 10px;
}

.middle {
  float: left;
  width: 100%;
  margin-top: 10px;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  /* Hide the right column on small screens */
  .right {
    display: none;
  }
}
  </style>
<div class="oneshop_container_sectionnew" style="margin: 0 0 100px;">
  <div class="oneshop_banner_stip_newbox click_importantNotifications" style="padding-bottom: 0px;">
    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> >
        <?php $this->templates->os_oneshopheader("store_staff"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div>

    <!-- <div class="clearfix">&nbsp;</div> -->
    <?php
        if( $userType == 0 )
        {//Normal User
          $prods_cnt=$this->products->getStoreProductsCnt($store_code);
          $this->load->module("db_api");
          $store_query = "SELECT * FROM oshop_stores WHERE store_code = '" . $store_code . "'";
          $store_res = $this->db_api->custom($store_query);
          $ss_query = "SELECT os.*,iws.img_path FROM oshop_staff as os INNER JOIN iws_profiles as iws ON iws.profile_id = os.user_id_fk WHERE store_id_fk = '" . $store_res[0]['store_aid'] . "'";
          $ss_res = $this->db_api->custom($ss_query);
    ?>
    <div class="" style="margin:0 4%;width:92%;display:table;">
    <div class="oneshop_left_newcontainer pab10 minheight700" id="list_products" style="width: 65%;margin-top: 0px;padding-top: 0px;">
        <div class="hd_heading">
          <h1>About Us <span></span></h1>
          <table style="width: 100%;">
            <tr>
              <td colspan="2">
                <p class="ajustify">
                  <?php if($store_res[0]["store_about"] != ""){ 
                    echo $store_res[0]["store_about"]; 
                  }else{ ?> 
                      <div class="notfound">
                          <p><i class="fa fa-ban"></i> No data found</p>
                      </div>
                  <?php } ?>
                </p>
              </td>
              </tr>
              <tr style="background-color: #ffffff;">
                <td colspan="2">
                  <h1>About Store <span></span></h1>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <strong>Store Location : </strong>
                  <span><?php echo $store_res[0]["address"] ?></span>
                </td>
              </tr>
              <tr>
                <td style="width: 50%;">
                  <strong>Store Type : </strong> 
                  <span><?php echo $store_res[0]["store_category"] ?></span>               
                </td>
                <td style="width: 50%;">
                  <strong>Store Currency : </strong>   
                  <span><?php echo $store_res[0]["currency"] ?></span>              
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Store Contact Details For Any Queries : </strong>
                </td>
                <td>
                  <strong>Contact Number : </strong>
                  <span><?php echo $store_res[0]["enquiry_number"] ?></span>
                  <br />
                  <strong>Email Id : </strong>
                  <span><?php echo $store_res[0]["enquiry_email"] ?></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Services Provide By This Store : </strong>
                </td>
                <td>
                  <span><?php echo $store_res[0]["services"] ?></span>
                </td>
              </tr>
              <tr>
                <td>
                  <strong>Delivery Type : </strong>
                  <?php if($store_res[0]["delivery_mode"] == "Both") {?>
                  <span>Delivery & Pickup Both</span>
                <?php }else{?>
                  <span><?php echo $store_res[0]["delivery_mode"] ?></span>
                <?php }?>
                </td>
                <td>
                  <strong>Payment Type : </strong>
                  <?php if($store_res[0]["payment_mode"] == "PBD") {?>
                  <span>Pay Before Delivery</span>
                <?php }?>
                </td>
              </tr>
          </table>
        </div>
    </div>
    <div class="oneshop_right_newcontainer" style="width: 28%;">
      <?php 
        $this->load->module("db_api");
        $store_query = "SELECT * FROM oshop_stores WHERE store_code = '" . $store_code . "'";
        $store_res = $this->db_api->custom($store_query);
        $review = "SELECT * FROM oshop_store_reviews WHERE store_id_fk='".$store_res[0]['store_aid']."'";
        $review_res = $this->db_api->custom($review);
        $reavg = "SELECT COUNT(*) AS reviews,AVG(rating) AS ratings FROM oshop_store_reviews WHERE store_id_fk='".$store_res[0]['store_aid']."'";
        $reavg_res = $this->db_api->custom($reavg);
        // echo var_dump($reavg_res);
      ?>
      <div style="box-sizing: border-box;border: solid #ececec;padding: 15px;"> 

        <span class="heading"><?php echo number_format($reavg_res[0]['ratings'],1)?> Out Of 5</span>
        <input type="hidden" id="str" onclick="stars(<?php echo number_format($reavg_res[0]['ratings'],1);?>)" value="display" trigger>  
        <div id="srating">
        </div>
        <p style="font-size: 13px;"><?php echo $reavg_res[0]['reviews']?> Global Ratings.</p>
        <hr style="border:3px solid #f1f1f1">

        <div class="row">
          <?php 
            for($i=0; $i < sizeof($review_res); $i++){
              $str = "str".$i;
              $srat1 = "srating".$i;
              $srat = "'srating".$i."'";
          ?>
          <script>
            jQuery(function(){
               jQuery('#<?php echo $str?>').click();
            });
          </script>
            <div class="middle">
                <input type="hidden" id="<?php echo $str;?>" onclick="stars1(<?php echo number_format($review_res[$i]['rating']);?>,<?php echo $srat;?>)">
                <div id="<?php echo $srat1;?>">
                </div>
            </div>
            <br />
            <div class="side">
              <p style="overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;"><?php echo $review_res[$i]['review_text'];?></p>
            </div>
            <br />
            <hr style="border:1px solid #f1f1f1;">
          <?php 
              if($i == 4){  ?> 
                <a href="<?php echo base_url().'store_reviews/'.$store_code?>"><span style="float: right;">View More</span></a>
              <?php } } ?>
        </div>
      </div>
      <br />
      <br />
        <a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_self"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

    </div>
  </div>
  <div style="margin: 2px 4% 0 4%;width:92%;">
        <div class="hd_heading">
          <h1 style="width: 90%;margin: 9px 44px;">Store Staff List<span></span><a href="<?php echo site_url("storestaff")."/".$store_code;?>"><i class="fa fa-arrow-circle-right" style="float: right;"></i></a></h1>

          <div class="row">
            <?php
             if($ss_res){
              $i = 1;
              foreach ($ss_res as $ssres) {
                $srole = explode("_", $ssres['role']);
              ?>

           <div class="column">
              <div class="card">
                <?php if($ssres['img_path'] != ""){
                  $imgpath = base_url().'data/profile/mi/'.$ssres['img_path'];
                }
                else
                {
                  $imgpath = "https://bootdey.com/img/Content/avatar/avatar7.png";
                }
                ?>
                <img src="<?php echo $imgpath?>" class="img-radius" alt="John" style="width:50%">
                <h3><?php echo $ssres['f_name']." ".$ssres['l_name']?></h3>
                <p class="title"><?php echo $srole[0]?> <?php echo $srole[1]?></p>
                <hr class="dotted">
                <br />
                <span style="text-align: left;"><strong>Working in Store : </strong>From <?php echo $ssres['w_since']?> Month</span>
                <br />
                <br />
                <p style="text-align: left;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 3;-webkit-box-orient: vertical;"><?php echo $ssres['bio'] ?></p>
              </div>
            </div>
          <?php if($i++ == 8){break;}} } else { ?>
              <div class="notfound">
                <p><i class="fa fa-ban"></i> No data found </p>
              </div>
            <?php } ?>
          </div>
        </div>

         <!--  <?php if ($i++ == 4) {?>
              <div class="column">
                  <div class="card">
                      <h1>View More</h1>
                  </div>
              </div><?php break;}?> -->
      <div style="margin: 57px 0 0 0;">
        <div class="titlecontainer acenter">
          <div class="hd_heading">
            <h1 style="width: 90%;margin: 9px 44px;">Products <span></span><a href="<?php echo site_url("product_search")."/".$store_code;?>"><i class="fa fa-arrow-circle-right" style="float: right;"></i></a></h1>
          </div>
          <input type="hidden" id="hstore_products_cnt" value="<?php echo $prods_cnt?>"/>
        </div>
        <div id="list_products_div"></div>
      </div>
    </div>
    <?php }else if( $userType == 1 ){//Admin User
      //echo "else of if condtion";
                $this->load->module("stores");
                $this->stores->home_store($store_details[0]["store_aid"]);
        }
    ?>

</div>
<?php }?>
<!--Oneshop Content ends Here(Anil 11-01-2016)-->

<?php
$this->templates->app_footer();
?>
<?php
  $this->load->module('oshop_popup');
  $this->oshop_popup->sendStoremessage($store_code);
?>
<script type="text/javascript">
    jQuery(function(){
       jQuery('#str').click();
    });
    jQuery(function(){
       jQuery('#str1').click();
    });
    function stars(ratings){
        if(ratings > 1 && ratings < 2){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star-half-o checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
          // document.getElementById("str").style.display = 'none';
        }
        else if(ratings > 2 && ratings < 3){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star-half-o checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings > 3 && ratings < 4){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star-half-o checked"></span><span class="fa fa-star"></span>';
        }
        else if(ratings > 4 && ratings < 5){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star-half-o checked"></span>';
        }
        else if(ratings == 1){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 2){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 3){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 4){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 5){

          document.getElementById("srating").innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        }
      }

      function stars1(ratings,sratings){
        if(ratings == 1){

          document.getElementById(sratings).innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 2){

          document.getElementById(sratings).innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 3){

          document.getElementById(sratings).innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 4){

          document.getElementById(sratings).innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span>';
        }
        else if(ratings == 5){

          document.getElementById(sratings).innerHTML = '<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>';
        }
      }

  var starting_index = 0;
  var prods_cnt=0;
  var next_connection_flag= true;
  dataLoading();
  function dataLoading() {
    var store_code='<?php echo $store_code?>';
    $.ajax({
        type: "POST",
        url: oneshop_url+ "/products/getStoreProducts/"+store_code,
        data: {p: starting_index},
        success: function (data) {
          //alert(data);
         $("#list_products_div").append(data);
        }
    });
    starting_index = starting_index + 1;
    prods_cnt=starting_index*9;
    var hprods_cnt=$("#hstore_products_cnt").val();
    if(prods_cnt>=hprods_cnt){
      next_connection_flag=false;
    }
  }
  $(window).on('scroll',function () {
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
      if(next_connection_flag){
        dataLoading();
      }
      /*else{
        $("#list_products_div").append("<div>No more products to show</div>");
      }*/
    }
  });
</script>