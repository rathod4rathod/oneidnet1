<script src="https://connect.facebook.net/en_US/all.js"></script>
<script>
  
  FB.init({
    appId:'693677854582315',
    cookie:true,
    status: true,
    xfbml:true
  });

  function FacebookInviteFriends(nlink)
  {
    FB.ui({
    method: 'send',
    link: nlink,
    redirect_uri:'https://www.oneidnet.com/',
    }, function(response){});
  }
  
  function nregister()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);
    // var scode = $storeid;

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
          // document.getElementById("invite-iframe").src = FacebookInviteFriends('https://www.oneidnet.com/registration/nregactivation?ref='+data);
          FacebookInviteFriends('https://www.oneidnet.com/registration/nregactivation?ref='+data);
      }
    });
  }

//   function PopupCenter(url, title, w, h) {  
//     // Fixes dual-screen position                         Most browsers      Firefox  
//     var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
//     var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
              
//     width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
//     height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
              
//     var left = ((width / 2) - (w / 2)) + 130;  
//     var top = ((height / 2) - (h / 2)) + 490;  
    
//     var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
  
//     // Puts focus on the newWindow  
//     if (window.focus) {  
//         newWindow.focus();  
//     }  
// } 

// function openWindow(url) {
//     var w = 1084, h = 470; // default sizes
//     if (window.screen) {
//         w = window.screen.availWidth * 79.5 / 100;
//         h = window.screen.availHeight * 64.5 / 100;
//     }

//     window.open(url,'popUpWindow','width='+w+',height='+h);
// }

  function nregisterwhatsapp()
  {
    // var username = "OIN" + generateRandomString(3);
    // var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var whatsappapi = "https://api.whatsapp.com/send?text=";
       var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = whatsappapi + baselink + resdata;
       window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        // window.open(burl,'popUpWindow','width=' + (parseInt(window.innerWidth) * 0.3) + ',height=' + (parseInt(window.innerHeight) * 0.3) + ',toolbar=0,menubar=0,location=0,status=0,scrollbars=1,resizable=0,left=0,top=0');
      }
    });
  }

  function nregistertwitter()
  {
    // var username = "OIN" + generateRandomString(3);
    // var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var twitterapi = "https://twitter.com/messages/compose?text=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = twitterapi + baselink + resdata;
        // document.getElementById("invite-iframe").src = burl;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }
  
  function nregisterviber()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var viberapi = "viber://forward?text=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = viberapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }

  function nregisterlinkedin()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var linkedinapi = "https://www.linkedin.com/sharing/share-offsite/?url=";
       var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
       var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = linkedinapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }

  function nregisterskype()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var skypeapi = "https://web.skype.com/share?url=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = skypeapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }

  function nregistergmail()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var gmailapi = "http://mail.google.com/mail/u/0/?view=cm&fs=1&su=Access%20Oneidnet%20Now&bcc=enter%20friend%20email%20here&body=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = gmailapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }

    function nregisteroutlook()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var outlookapi = "https://outlook.live.com/owa/?path=/mail/action/compose&to=&subject=Access%20Oneidnet%20Now&body=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = outlookapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }

  function nregisteryahoo()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var yahooapi = "https://compose.mail.yahoo.com/?to=&subject=Access%20Oneidnet%20Now&body=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = yahooapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }

  function nregisteraol()
  {
    var username = "OIN" + generateRandomString(3);
    var pass = generateRandomString(6);

    $.ajax({
      type: 'POST',
      url:  oneshop_url+'/stores/newregister',
      // data:{ username:username,pass:pass},

      success: function (data) {
        // alert(data);
        var aolapi = "https://mail.aol.com/webmail-std/en-us/ComposeMessage?to=&subject=Access%20Oneidnet%20Now&body=";
        var baselink = encodeURIComponent('https://www.oneidnet.com/registration/nregactivation?ref=');
        var resdata = encodeURIComponent(data).replace("%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A%0D%0A","");
        var burl = aolapi + baselink + resdata;
        window.open(burl,'popUpWindow','height=465,width=1084,left=130,top=450,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
      }
    });
  }
    // http://mail.google.com/mail/u/0/?view=cm&fs=1&su=SUBJECT&body=BODY


  function generateRandomString(length) {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
   
  for (var i = 0; i < length; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
   
  return text;
}
</script>
<!-- <script type="text/javascript" src="https://platform.linkedin.com/in.js">/*
    api_key: 78xgd6i9svsc9a
    onLoad: onLinkedInLoad
    authorize: true
*/</script>
 
<script type="text/javascript">

 function onLinkedInLoad() {
     // Listen for an auth event to occur
     IN.User.authorize(onLinkedInAuth);
 } 

function onLinkedInAuth() {
        alert('call2');
        IN.API.Raw("/companies/000000/updates")
        .method("GET")
        .result(function(res) {
           document.write(JSON.stringify(res));});
        }

</script> -->

<div class="store_mainwrap"> <?php if($store_details[0]['is_active']==1){ ?>
 <?php } ?>
<div class="oneshop_left_newcontainer pab10">

          <div class="hd_heading">
              <h1 style="margin-top:0px;"> HOME  <span></span></h1>
            </div>
    <?php if($store_details[0]['is_active']==1){ ?>

    <div class="wi100pstg fll">
      <div id="fb-root"></div>
      <a href="#" onclick="nregister();">
        <img width="9%" src="https://oneshop.oneidnet.com/assets/images/fb-invite.png">
      </a>
      <!-- <iframe  id="invite-iframe" width="100%" height="100%" frameborder="0" allowfullscreen></iframe> -->
      <a href="#" onclick="nregisterwhatsapp();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/wa-invite.png"></a>
      <a href="#" onclick="nregistertwitter();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/tw-invite.png"></a>
      <a href="#" onclick="nregisterviber();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/vb-invite.png"></a>
      <a href="#" onclick="nregisterlinkedin();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/li-invite.png"></a>
      <a href="#" onclick="nregisterskype();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/sk-invite.png"></a>
      <a href="#" onclick="nregistergmail();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/gm-invite.png"></a>
      <a href="#" onclick="nregisteroutlook();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/ol-invite.png"></a>
      <a href="#" onclick="nregisteryahoo();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/yh-invite.png"></a>
      <a href="#" onclick="nregisteraol();"><img width="9%" src="https://oneshop.oneidnet.com/assets/images/ao-invite.png"></a>
      <!-- <script type="IN/Login"></script> -->
    <div class="packagedat_admin">
    <p class="bold fll"> STORE OVERVIEW </p>
<!--    <p class="flr mat5"><span class="fll mar10 lh20"> Filter: </span> <select class="oneshop_adminfilter" name="privacy">
    <option value="">Select Privacy</option>
    <option value="Public">Public</option>
    <option value="Private">Private</option>
    </select> </p>-->
    </div>

    <div class="packagedat_admin_store fll">
    <p class="oneshop_leftimg_box fll"> <img src="<?php echo base_url()."assets/images/13.jpg";?>"> </p>
    <p class="oneshop_leftimg_box_content fll"> Total Orders </p>
    <div class="flr">
    <p class="fll oneshop_overview_countbox"> <?php echo $order_count;?> </p>
    </div>
    </div>
    <div class="packagedat_admin_store fll">
    <p class="oneshop_leftimg_box fll"> <img src="<?php echo base_url()."assets/images/13.jpg";?>"> </p>
    <p class="oneshop_leftimg_box_content fll"> Total Cancellations </p>
    <div class="flr">
    <p class="fll oneshop_overview_countbox"> <?php echo $cancels_count;?> </p>
    </div>
    </div>
    <div class="packagedat_admin_store fll">
    <p class="oneshop_leftimg_box fll"> <img src="<?php echo base_url()."assets/images/13.jpg";?>"> </p>
    <p class="oneshop_leftimg_box_content fll"> Total Followers </p>
    <div class="flr">
    <p class="fll oneshop_overview_countbox"> <?php echo $followers_cnt;?> </p>
    </div>
    </div>
<!--    <div class="packagedat_admin_store fll">
    <p class="oneshop_leftimg_box fll"> <img src="<?php echo base_url()."assets/images/13.jpg";?>"> </p>
    <p class="oneshop_leftimg_box_content fll"> VCOM Requests </p>
    <div class="flr">
    <p class="fll oneshop_overview_countbox"> 50 </p>
    </div>
    </div>-->
      <div class="packagedat_admin_store fll">
        <p class="oneshop_leftimg_box fll"> <img src="<?php echo base_url()."assets/images/13.jpg";?>"> </p>
        <p class="oneshop_leftimg_box_content fll"> Total Products </p>
        <div class="flr">
        <p class="fll oneshop_overview_countbox"> <?php echo $products_count?> </p>
        </div>
      </div>
      <div class="packagedat_admin_store fll">
        <p class="oneshop_leftimg_box fll"> <img src="<?php echo base_url()."assets/images/13.jpg";?>"> </p>
        <p class="oneshop_leftimg_box_content fll"> Total Staff </p>
        <div class="flr">
        <p class="fll oneshop_overview_countbox"> <?php echo $staff_count?> </p>
        </div>
      </div>
    </div>

    <div class="wi100pstg mat20 fll">

    <div class="packagedat_admin">
    <p class="bold fll"> TODAY'S ACTIVITIES </p>
<!--    <p class="flr mat5"><span class="fll mar10 lh20"> Filter: </span> <select class="oneshop_adminfilter" name="privacy">
    <option value="">Select Privacy</option>
    <option value="Public">Public</option>
    <option value="Private">Private</option>
    </select> </p>-->
    </div>
    <?php
         $store_id = $store_details[0]["store_aid"];
         $this->load->module('stores');
         $acivityArr =  $this->stores->getRecentActivitys($store_id);
         $total=0;
         if($acivityArr["today_reviews"] > 0){
           $today_reviews=$acivityArr["today_reviews"];
             foreach($today_reviews as $review_list){
             ?>
                <div class="packagedat_admin_store fll">
                    <p class="oneshop_product_commenttext_here fll">
                       <span class="bold"><?php echo date("m/d/Y H:i:s",strtotime($review_list["commented_on"]));?> </span>&nbsp;
                        <?php echo $review_list["review_text"]; ?>
                        <br/>
                        <?php if($actRow["rating"] > 0){?>
                            <span class="bold">Rating: </span>&nbsp;<?php echo $review_list["rating"]; ?>
                        <?php }?>
                    </p>
                </div>
             <?php
             }
         }else{
           $total=$total+0;
         }
          if($acivityArr["cancellations"] > 0){
            $today_cancellations=$acivityArr["cancellations"];
            foreach($today_cancellations as $cancel_list){
              $str=  ucfirst($cancel_list["profile_name"])." cancelled the product ".ucfirst($cancel_list["product_name"]);
         ?>
          <div class="packagedat_admin_store fll">
              <p class="oneshop_product_commenttext_here fll">
                 <span class="bold"><?php echo date("m/d/Y H:i:s",strtotime($actRow["rating_on"]));?> </span>&nbsp;
                  <?php echo $str; ?>
              </p>
          </div>
        <?php
           }
          }else{
           $total=$total+0;
         }
        if(count($acivityArr["products_added"]) > 0){
          $products_added=$acivityArr["products_added"];
          foreach($products_added as $plist){
            $pstr=  "<b>".ucfirst($plist["profile_name"])."</b> added the product <b>".ucfirst($plist["product_name"])."</b>";
        ?>
          <div class="packagedat_admin_store fll">
            <p class="oneshop_product_commenttext_here fll">
               <span class="bold"><?php echo date("m/d/Y H:i:s",strtotime($plist["added_on"]));?> </span>&nbsp;
                <?php echo $pstr; ?>
            </p>
          </div>
        <?php
          }
        }else{
           $total=$total+0;
         }
         if($total==0){
           echo '<div class="packagedat_admin_store fll">
            <p class="oneshop_product_commenttext_here fll">
                No activities
            </p>
          </div>';
         }
    ?>
    </div>
    
   <div class="wi100pstg mat20 fll">

    <div class="packagedat_admin">
    <p class="bold fll"> TODAY'S ORDERS </p>
    </div>
    <?php
//         $store_code = $store_details[0]["store_code"];
//         $storeObj = $this->load->module('stores');
//         $storeOrdersArr =  $this->stores->getOrdersByStoreCode($store_code);

//Edited By Mitesh -> today order redirection;
    if($acivityArr["today_orders"] > 0){
      $today_orders=$acivityArr["today_orders"];
      $order_url=  base_url()."order_view?order_id=";
      foreach($today_orders as $ordRow){
        $order_view = $order_url.base64_encode(base64_encode($ordRow['order_code']));
        // echo $order_view;
        $str=  "<b>".ucfirst($ordRow["profile_name"])."</b> has ordered Product <b>".ucfirst($ordRow["product_name"])."</b>";
      ?>
<!--         <div class="packagedat_admin_store fll">
             <p class="oneshop_product_commenttext_here fll">
                <span class="bold">Order Date:<?php echo date("M d, Y H:i:s",strtotime($ordRow["time"]));?> </span><br/>
                 <span class="bold">Order Code: </span>&nbsp;<?php echo $ordRow["order_code"]; ?><br/>
                 <span class="bold">Order Status: </span>&nbsp;<?php echo $ordRow["status"]; ?><br/>
                 <span class="bold">Order Amount: </span>&nbsp;<?php echo $ordRow["total_amount"]; ?>
             </p>
         </div>-->
        <div class="packagedat_admin_store fll">
          <p class="oneshop_product_commenttext_here fll">
           <a href="<?php echo $order_view;?>" class="blue"><?php echo $str; ?>&nbsp;</a>
          </p>
        </div>
      <?php
      }
    }
    else{
      echo '<div class="packagedat_admin_store fll">
          <p class="oneshop_product_commenttext_here fll">
              No Orders
          </p>
        </div>';
    }
    ?>
    </div>


    <div class="wi100pstg fll mat30">

    <div class="packagedat_admin">
        <p class="bold"> PACKAGE DETAILS <a href="<?php echo base_url().'packages/getPackageHistory';?>" style="float:right">See all</a></p>
    </div>
            <div class="oneshop_product_images mat10 mal20">
                <div class="wi100pstg mab10 fll">
                    <div> Package Name  </div>
                    <?php 
                      $sprice = $store_details[0]["price"] / 100;
                    ?>
                    <div class="fll"><strong><?php echo $store_details[0]["package_name"]."($".$sprice.")";?></strong></div>
                </div>
                <?php

                 if($store_details[0]["period_in_months"] < 12 )
                     $dispPackPeriod = $store_details[0]["period_in_months"]." Month(s)";
                 else if($store_details[0]["period_in_months"] == 12)
                     $dispPackPeriod = "1 Year";
                 ?>
                <div class="wi100pstg mab10 fll">
                    <div> Package Term  </div>
                    <div class="fll"><strong><?php echo $dispPackPeriod;?></strong></div>
                </div>
            </div>  

            <?php
            if( $store_details[0]["delivery_mode"] == "BOTH"){
                $delivery_mode = "Pay Before Delivery & Cash on Delivery";
            }else if( $store_details[0]["delivery_mode"] == "PBD"){
                $delivery_mode = "Pay Before Delivery";
            }else if( $store_details[0]["delivery_mode"] == "COD"){
                $delivery_mode = "Cash on Delivery";
            }
            ?>
            <div class="oneshop_product_images mat10 mal40">
                <div class="wi100pstg mab10 fll">
                    <div> Delivery Method  </div>
                    <div class="fll"><strong><?php echo $delivery_mode;?></strong></div>
                </div>
                <?php
                //Formatted wise expired date display
                if($store_details[0]["expired_on"] != ""){
                    $expire_date_on = date("M d, Y H:i:s", strtotime($store_details[0]["expired_on"]));
                }
                ?>
                <div class="wi100pstg mab10 fll">
                    <div> Expiration Date  </div>
                    <div class="fll"><strong><?php echo $expire_date_on;?></strong>
                    </div>
                </div>
            </div>
        <?php
        //echo $store_details[0]["expired_on"]."-".$renewed_on;
        $currdate = new DateTime(date("Y-m-d h:i:s"));
        $expire_on= new DateTime($store_details[0]["expired_on"]);
        $renewed_on = $store_details[0]["renewed_on"];
        $diff = date_diff($currdate,$expire_on);
        // echo $expire_on."-".$renewed_on;
        $oneshop_url = base_url() . 'packages/upgradePackage';
        $prm = "/" . "ug" . "/" . bin2hex($store_details[0]["store_code"]);
        $buy_new_url = ONENETWORKURL."os_package?type=ug&str=".bin2hex($store_details[0]["store_code"]);
        $ug_renew_url= $oneshop_url . '/' . $store_details[0]["current_package_id_fk"].$prm;
        if($diff->format('%R%a') < 15 && $diff->format('%R%a') > 0){
        ?>
          <p class="bold red"> Your Current Plan is About to Expire in <?php echo $diff->format('%a');?> Days</p>
          <p class="flr clearfix"><input type="button" value="Renew" id="renew_btn" class="np_des_addaccess_btn" name="button"> </p>
        <?php
        }
        else if($diff->format('%R%a') < 0){
        ?>
        <p class="bold red"> Your Plan is Expired </p>
          <p class="flr clearfix"><input type="button" value="Buy New Plan" id="upgrade_pkg_btn" class="np_des_addaccess_btn" name="button"> </p>
        <?php
        }else {?>
          <p class="flr clearfix"><input type="button" value="Buy New Plan" id="upgrade_pkg_btn" class="np_des_addaccess_btn" name="button"> </p>
        
        <?php
        }
        ?>

    </div>


<?php }else{ ?>
<div class="oneshop_container_middle_section mat10">             

<DIV class="wi48 fll">
<p style="width:150px; padding:50px 0 0px 0; margin:0 auto;"><img src="<?php echo base_url().'assets/images/maintenance.png'?>" style="text-align:center; margin:0 auto;" width="120" height="129"></p>
<h1 class="acenter normal mat20" style="margin-bottom:50px;"> Under Maintenance </h1>

</DIV>

<DIV class="wi48 fll" style="margin-bottom:50px;">
<p style="width:150px; padding:50px 0 0px 0; margin:0 auto;"><img src="<?php echo base_url().'assets/images/available.jpg'?>" width="129" height="130" style="text-align:center; margin:0 auto;"></p>
<h1 class="acenter normal mab10"> This store will shortly unavailable at your service </h1>
<p class="acenter">Renew your store to active  </p>

<p style="margin:0 auto; text-align:center; padding:50px 0 0 0;"><a class="btn btn-primary btn-large" href="#"> Renew</a></p>

</DIV>

</div>
            
<?php } ?></div>
<div class="oneshop_right_newcontainer">
     <?php
                $this->load->module("suggestions");
                $this->suggestions->getStoreSuggestions();
                $this->suggestions->getProductSuggestions();
            ?>          
</div>
</div>

<script type="text/javascript">
  $("#upgrade_pkg_btn").click(function(){
    var pkg_url='<?php echo $buy_new_url?>';
    window.location.href=pkg_url;
  });
  $("#renew_btn").click(function(){
    var pkg_url='<?php echo $ug_renew_url?>';
    window.location.href=pkg_url;
  });
</script>