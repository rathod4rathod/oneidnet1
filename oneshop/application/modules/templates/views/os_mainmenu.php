<!--Oneshop Sub Header ends Here(vinod 19-05-2015)--> 
<?php
/* echo "<span style='color:#fff'>".$order_manager."</span><br>";
  echo "<span style='color:#fff'>".$product_manager."</span>"; */
?>
<div class="subHeader ">
    <div class="dropMenuWrapper clicknav">
        <div class="cssmenu">
            <ul>
                <li class='active has-sub'>
                    <a href='#'>
                        <span class="dropMenuHead">
                           <!-- <span class="dropMenuIcon"></span>-->
                            <i class="fa fa-navicon"></i>
                            <h4 class="menuTitle"></h4>
                        </span></a>
                    <ul>

                        <?php
                        echo "<li> <a href='" . base_url() . "home/following_stores'><img src='" . base_url() . "assets/images/storesactivity.png'/> <span>Stores I Follow</span></a></li>";
                        echo "<li><a href='" . base_url() . "home/usertimeline'><img src='" . base_url() . "assets/images/storesupdate.png'/> <span>Store Updates</span></a></li>";
                        echo "<li><a href='" . base_url() . "explorepeople/myfollowings'><img src='" . base_url() . "assets/images/following.png'/> <span>My Connections</span></a></li>";
                        echo "<li><a href='" . base_url() . "explorepeople/myfollowers'><img src='" . base_url() . "assets/images/follwers.png'/> <span>My Followers</span></a></li>";
                        echo "<li><a href='" . base_url() . "mycart/myCartView'><img src='" . base_url() . "assets/images/cart.png'/> <span>Cart Items</span></a></li>";
                        echo "<li><a href='" . base_url() . "paybook/myPaybook'><img src='" . base_url() . "assets/images/wallet.png'/> <span>Paybook</span></a></li>";
                        echo "<li><a href='" . base_url() . "home/getUserMessages'><img src='" . base_url() . "assets/images/storemsg.png'/> <span>Store Messages</span></a></li>";
                        echo "<li><a href='" . base_url() . "home/getUserActivities'><img src='" . base_url() . "assets/images/storesactivity.png'/> <span>My Activity</span></a></li>";
                        ?>


                    </ul>
                </li>

            </ul>
        </div>
    </div>

    <div class="subHeaderMenu navbar" style="float: left;">
        <ul>



          <li><a href="<?php echo base_url();?>home/frndsActivityLog"><img src="<?php echo base_url();?>assets/images/chronoline.png"/><h4>CHRONOLINE</h4></a></li>
                        


           <li class="<?php if (isset($selected_menu) && ($selected_menu == "explorepeople")) {
                            echo "menu_selected";
                        } ?>"> <a href="<?php echo base_url() . "explorepeople"; ?>"><img src="<?php echo base_url();?>assets/images/explore.png"/><h4>EXPLORE PEOPLE</h4></a></li>
                        
                        

           <li class="<?php if (isset($selected_menu) && ($selected_menu == "find_stores")) {
                echo "menu_selected";
            } ?>"> <a href="<?php echo base_url() . "home/find_stores"; ?>"><img src="<?php echo base_url();?>assets/images/findstore.png"/><h4>FIND STORE</h4></a></li>
            <?php /* <a href="<?php echo base_url()."search_products"; ?>"><li class="<?php if (isset($select_find_product)) { echo "selected_menu"; } ?>"><img src="<?php echo base_url() . "assets/" ?>images/30-30Trans.png" class="osoptions3"><h4>Find Product</h4></li></a> */ ?>
            <?php
            //if ($store_owner_id || preg_match("/\b1\b/i", $order_manager) || preg_match("/\b1\b/i", $store_manager)) { 
            if ($role != "END_USER") {
		$i=0;
                $stores_list = explode("~", $store_owner_id);
                ?>
                <li class="parent <?php if (isset($selected_menu) && ($selected_menu == "mystores")) {
                    echo "menu_selected";
                } ?>"> <a href="javascript:void(0)">
                   <img src="<?php echo base_url();?>assets/images/storesfollow.png"/><h4>MY STORE(S)</h4>                 
                </a>
  
      <!--<div class="cvdes_notification_drop">--><!--notification drop down start here-->
                    <ul class="submenu">
                        <!--<li>
                        <span class="notification_imagediv"> <img src="images/13.jpg" alt="icon"> </span> 
                        <a href="#">Iran is far ahead, it is a much more peaceful and secular country. </a>
                        </li>-->
                        <?php
                        /* foreach($stores_list as $list){
                          $stores_options=explode(":",$list);
                          $store_name=$stores_options[0];
                          $store_code=$stores_options[1];
                          $store_url=base_url()."store_home/".$store_code;
                          echo "<li><a href='".$store_url."'>".$store_name."</a></li>";
                          } */
			if($store_dtls!=0){
                        	foreach ($store_dtls as $storeInfo) {
                            		$store_url = base_url() . "store_home/" . $storeInfo["store_code"];
                            		echo "<li><a href='" . $store_url . "'>" . $storeInfo["store_name"] . "</a></li>";
					$i++;
                        	}
			}
                        ?>
                    </ul>

             <!-- </div>-->
                </li> 
                <?php
            }
            //if($order_manager=="yes" || $product_manager=="yes" ||$store_owner=="no"){
            //if($role!="END_USER" || $role!="ADMIN"){
            //}else{
            ?>
                        <!--<a href="<?php //echo base_url() . "create_store"; ?>"><li class="<?php //if (isset($select_create_store)) { echo "selected_menu"; } ?>"><img src="<?php echo base_url() . "assets/" ?>images/30-30Trans.png" class="cooptions4"><h4>Create Store</h4></li></a> -->
	   <?php
	   	//if($i==0){
	   ?>
           <li class="<?php if (isset($selected_menu) && ($selected_menu == "create_store")) {
                echo "menu_selected";
            } ?>"> <a href="<?php echo ONENETWORKURL. 'os_package'; ?>"><img src="<?php echo base_url();?>assets/images/createstore.png"/><h4>CREATE STORE </h4></a> </li>
	    <?php
		//}
	    ?>
            <li class="<?php if (isset($selected_menu) && ($selected_menu == "friends_stores")) {
                echo "menu_selected";
            } ?>"><a href="<?php echo base_url() . "stores/Friends_Stores"; ?>"><img src="<?php echo base_url();?>assets/images/friendstore.png"/><h4>FRIENDS STORE</h4></a></li>

<?php
//}
?>



        </ul>
    </div>
</div>



<!--Oneshop NavigationBar starts Here(vinod 19-05-2015)-->
<div class="oneshop_navigationBar os_bckwdndfrwdwrap">
    <ul>
        <li id="os_backword_btn" title="Click to go back"><i class="fa fa-angle-left"></i></li>
        <li id="os_forward_btn"  title="Click to go forward"><i class="fa fa-angle-right"></i></li>
    </ul>
   <!-- <span class="oneshop_navigation"><h6 class="os_backword_btn" id="os_backword_btn"><< Backward |</h6 ><h6 class="os_forward_btn" id="os_forward_btn"> Forward >></h6></span>-->
</div>
<div class="clearfix"></div>
<!--Oneshop NavigationBar ends Here(vinod 19-05-2015)--> 
<style type="text/css">
    .notificationStyl{
        font-size:11px;
        float:right;
        margin:-3px 0px 0px 0px;
        border-radius:10px;
        height:15px;
        width:15px;
        position:absolute;
        background-color:red;          
    }
    #stores_options{
        width:200px;        
        position:absolute;
    }
    #stores_options ul li{
        list-style:none;
        border:1px solid red;
        float:left;
    }
</style>    

<script type="text/javascript">
    $(document).on("mouseover", ".osoptions5", function () {
        $("#stores_options").css("display", "block");
    });
    $(document).on("mouseout", ".osoptions5", function () {
        $("#stores_options").css("display", "none");
    });
    $('.cvdes_notification_btn, .cvdes_noti_icon').click(function ()
    {
        $('.cvdes_notification_drop').fadeToggle('slow');
    });


    $('.cvdes_notification_btn, .cvdes_noti_icon').blur(function ()
    {
        $('.cvdes_notification_drop').fadeOut('slow');

    });
</script>
