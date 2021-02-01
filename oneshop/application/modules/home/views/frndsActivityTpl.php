<?php
//print_r($activity_data);
//$profile_img=base_url()."data/profile/mi/".$user_details[0]["profile_img"];
//$lprofile_url=base_url()."pprofile/profilepage/".$user_details[0]["user_id"];
if($chronoline_order != 0){
  // echo var_dump($chronoline_order);

for($i=0 ; $i < sizeof($chronoline_order) ; $i++){
    if($chronoline_order[$i]["STORE_REVIEW"] != 0){
      // foreach($chronoline_order as $srlist){
        $store_logo=base_url()."assets/images/default_store.png";
        if($chronoline_order[$i]["profile_image_path"]!=""){
          $store_logo=base_url()."stores/".$chronoline_order[$i]["store_code"]."/logo/mi/".$chronoline_order[$i]["profile_image_path"];
        }
        $profile_img=base_url()."assets/images/avatar.png";
        if($chronoline_order[$i]["profile_img"]!=""){
          $profile_img=base_url()."data/profile/mi/".$chronoline_order[$i]["profile_img"];
        }
        $lprofile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["user_id"];
        $store_url=base_url()."store_home/".$chronoline_order[$i]["store_code"];
      ?>
      <div class="following_boxstyles dx_des_mat30 fll">
          <div class="following_userimage fll"> <img src="<?php echo $profile_img?>"> </div>
          <div class="following_user_namebox fll">
              <p class="fs25"> <a href="<?php echo $lprofile_url?>"><?php echo ucwords($chronoline_order[$i]["profile_name"]);?></a> has given reviews to <span class="blue"><a href="<?php echo $store_url?>"> <?php echo ucwords($chronoline_order[$i]["store_name"])?></a> </span> </p>
          </div>
          <p class="flr gray"> <?php echo date("d M, Y H:i:s",strtotime($chronoline_order[$i]["t_stamp"]))?> </p>
          <div class="dealerpost-auctionname-wrap">
              <div class="dealerpost-dealerlogo fll">
                  <p class="dealerpost-dealerleftlogo" style="width: 80px; height: 80px;">
                      <img alt="logo" title="<?php echo ucwords($chronoline_order[$i]["store_name"])?>" class="wi100pstg" src="<?php echo $store_logo;?>" style='margin-right:10px'>
                  </p>
                    <div class="dealerpost-dealerleftlogo-rightcontent" style="float: right;margin: 2% 0 0 3%;width: 80%;">
                      <h2 class="normal black"> <?php echo ucwords($chronoline_order[$i]["store_name"])?> </h2>
                      <span class="bold"> <?php echo $chronoline_order[$i]["follower_count"]?> </span> <span> Following </span>
                    </div>
              </div>
          </div>
      </div>
      <?php
        // }
      }
    //echo"<pre>";print_r($prods_reviews_data); 
    if($chronoline_order[$i]["PRODUCT_REVIEW"] !=0){
      // foreach($chronoline_order as $prlist){
        $dbapi=$this->load->module("db_api");
        $store_code = $dbapi->select("store_code","oshop_stores","store_aid=".$chronoline_order[$i]["store_id_fk"]);
        $product_logo=base_url()."assets/images/default_product_40.png";
        if($chronoline_order[$i]["primary_image"]!=""){
          $product_logo=base_url()."stores/".$store_code[0]["store_code"]."/products/".$chronoline_order[$i]["product_aid"]."/mi/".$chronoline_order[$i]["primary_image"];
         }
        $profile_img=base_url()."assets/images/avatar.png";
        if($chronoline_order[$i]["profile_img"]!=""){
          $profile_img=base_url()."data/profile/mi/".$chronoline_order[$i]["profile_img"];
        }
        $lprofile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["user_id"];

        $product_url=base_url()."product_detail_view/".$store_code[0]["store_code"]."/".$chronoline_order[$i]["product_code"];
    ?>
      <div class="following_boxstyles dx_des_mat30 fll">
        <div class="following_userimage fll"> <img src="<?php echo $profile_img?>"> </div>
        <div class="following_user_namebox fll">
            <p class="fs25"> <a href="<?php echo $lprofile_url?>"><?php echo ucwords($chronoline_order[$i]["profile_name"]);?></a> has given reviews to <span class="blue"><a href="<?php echo $product_url?>"> <?php echo ucwords($chronoline_order[$i]["product_name"])?></a> </span> </p>
        </div>
        <p class="flr gray"> <?php echo date("d M, Y H:i:s",strtotime($chronoline_order[$i]["t_stamp"]))?> </p>
        <div class="dealerpost-auctionname-wrap">
            <div class="dealerpost-dealerlogo fll">
                <p class="dealerpost-dealerleftlogo" style="width: 80px; height: 80px;">
                    <img alt="logo" title="<?php echo ucwords($chronoline_order[$i]["product_name"])?>" class="wi100pstg" src="<?php echo $product_logo;?>" style='margin-right:10px'>
                </p>
                  <div class="dealerpost-dealerleftlogo-rightcontent" style="float: right;margin: 2% 0 0 3%;width: 80%;">
                    <h2 class="normal black"> <?php echo ucwords($chronoline_order[$i]["product_name"])?> </h2>
                  </div>
            </div>
        </div>
      </div>
    <?php
    // }
    }
    
    if($chronoline_order[$i]["SAVED_PRODUCT"] != 0){
      // echo var_dump($chronoline_order);
      // foreach($chronoline_order as $wlist){
        $dbapi=$this->load->module("db_api");
        $store_code = $dbapi->select("store_code","oshop_stores","store_aid=".$chronoline_order[$i]["store_id_fk"]);
       
        $product_logo=base_url()."assets/images/default_product_40.png";
        if($chronoline_order[$i]["primary_image"]!=""){
          $product_logo=base_url()."stores/".$store_code[0]["store_code"]."/products/".$chronoline_order[$i]["product_aid"]."/mi/".$chronoline_order[$i]["primary_image"];
        }
        $profile_img=base_url()."assets/images/avatar.png";
        if($chronoline_order[$i]["profile_img"]!=""){
          $profile_img=base_url()."data/profile/mi/".$chronoline_order[$i]["profile_img"];
        }
        $lprofile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["user_id"];
        $product_url=base_url()."product_detail_view/".$store_code[0]["store_code"]."/".$chronoline_order[$i]["product_code"];
    ?>
        <div class="following_boxstyles dx_des_mat30 fll">
          <div class="following_userimage fll"> <img src="<?php echo $profile_img?>"> </div>
          <div class="following_user_namebox fll">
              <p class="fs25"> <a href="<?php echo $lprofile_url?>"><?php echo ucwords($chronoline_order[$i]["profile_name"]);?></a> added the product <span class="blue"><a href="<?php echo $product_url?>"> <?php echo ucwords($chronoline_order[$i]["product_name"])?></a> </span> to wishlist </p>
          </div>
          <p class="flr gray"> <?php echo date("d M, Y H:i:s",strtotime($chronoline_order[$i]["t_stamp"]))?> </p>
          <div class="dealerpost-auctionname-wrap">
              <div class="dealerpost-dealerlogo fll">
                  <p class="dealerpost-dealerleftlogo" style="width: 80px; height: 80px;">
                      <img alt="logo" title="<?php echo ucwords($chronoline_order[$i]["product_name"])?>" class="wi100pstg" src="<?php echo $product_logo;?>" style='padding-right:10px'>
                  </p>
                    <div class="dealerpost-dealerleftlogo-rightcontent" style="float: right;margin: 2% 0 0 3%;width: 80%;">
                      <h2 class="normal black"> <?php echo ucwords($chronoline_order[$i]["product_name"])?> </h2>
                    </div>

  <!--                <div class="dealerpost-dealerleftlogo-rightcontent">
                      <h2 class="normal black"> <?php echo ucwords($wlist["product_name"])?> </h2>
                      <p class="fs12 fll mat5 wi100pstg black"><span class="bold"> <?php echo $wlist["follower_count"]?> </span> <span> Following </span> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <a href="#" class="blue"> Follow </a> </p>
                  </div>-->
              </div>
          </div>
        </div>
    <?php
      // }
    }
    if($chronoline_order[$i]["USER_FOLLOWS"] !=0){
      // foreach($chronoline_order as $ulist){
        $profile_logo=base_url()."assets/images/avatar.png";
        $uprofile_logo=base_url()."assets/images/avatar.png";
        if($chronoline_order[$i]["profile_img"]!=""){
          $profile_logo=base_url()."data/profile/mi/".$chronoline_order[$i]["profile_img"];
        }
        if($chronoline_order[$i]["f_userimg"]!=""){
          $uprofile_logo=base_url()."data/profile/mi/".$chronoline_order[$i]["f_userimg"];
        }

        $profile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["user_id"];

        $fprofile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["f_userid"];
    ?>
        <div class="following_boxstyles dx_des_mat30 fll">
          <div class="following_userimage fll"> <img src="<?php echo $profile_logo?>"> </div>
          <div class="following_user_namebox fll">
              <p class="fs25"> <a href="<?php echo $profile_url?>"><?php echo ucwords($chronoline_order[$i]["profile_name"]);?></a> following <a href="<?php echo $fprofile_url?>"><span class="blue"> <?php echo ucwords($chronoline_order[$i]["f_username"])?> </span></a> </p>
          </div>
          <p class="flr gray"> <?php echo date("d M, Y H:i:s",strtotime($chronoline_order[$i]["t_stamp"]))?> </p>
          <div class="dealerpost-auctionname-wrap">
              <div class="dealerpost-dealerlogo fll">
                  <p class="dealerpost-dealerleftlogo" style="width: 80px; height: 80px;">
                      <img alt="logo" title="<?php echo ucwords($chronoline_order[$i]["f_username"])?>" class="wi100pstg" src="<?php echo $uprofile_logo;?>">
                  </p>
                  <div class="dealerpost-dealerleftlogo-rightcontent" style="float: right;margin: 2% 0 0 3%;width: 80%;">
                    <h2 class="normal black"> <?php echo ucwords($chronoline_order[$i]["f_username"])?> </h2>
                    <span class="bold" style='margin-left:10px'></span> <span> Following </span>
                  </div>
              </div>
          </div>
        </div>
    <?php
      // }
    }
    if($chronoline_order[$i]["STORE_FOLLOWS"] !=0){
      // foreach($chronoline_order as $strlist){
        $store_logo=base_url()."assets/images/default_store.png";
        if($chronoline_order[$i]["profile_image_path"]!=""){
          $store_logo=base_url()."stores/".$chronoline_order[$i]["store_code"]."/logo/mi/".$chronoline_order[$i]["profile_image_path"];
        }
        $profile_logo=base_url()."assets/images/avatar.png";
        if($chronoline_order[$i]["profile_img"]!=""){
          $profile_logo=base_url()."data/profile/mi/".$chronoline_order[$i]["profile_img"];
        }
        $profile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["user_id"];
        $store_url=base_url()."store_home/".$chronoline_order[$i]["store_code"]."/";
    ?>
        <div class="following_boxstyles dx_des_mat30 fll">
          <div class="following_userimage fll"> <img src="<?php echo $profile_logo?>"> </div>
          <div class="following_user_namebox fll">
              <p class="fs25"> <a href="<?php echo $profile_url?>"><?php echo ucwords($chronoline_order[$i]["profile_name"]);?></a> following <a href="<?php echo $store_url?>"><span class="blue"> <?php echo ucwords($chronoline_order[$i]["store_name"])?></span></a>  </p>
          </div>
          <p class="flr gray"> <?php echo date("d M, Y H:i:s",strtotime($chronoline_order[$i]["t_stamp"]));?> </p>
          <div class="dealerpost-auctionname-wrap">
              <div class="dealerpost-dealerlogo fll">
                  <p class="dealerpost-dealerleftlogo" style="width: 80px; height: 80px;">
                      <img alt="logo" title="<?php echo ucwords($chronoline_order[$i]["store_name"])?>" class="wi100pstg" src="<?php echo $store_logo;?>">
                  </p>
                    <div class="dealerpost-dealerleftlogo-rightcontent" style="float: right;margin: 2% 0 0 3%;width: 80%;">
                      <h2 class="normal black"> <?php echo ucwords($chronoline_order[$i]["store_name"])?> </h2>
                      <span class="bold"> <?php echo $chronoline_order[$i]["follower_count"]?> </span> <span> Following </span>
                    </div>
              </div>
          </div>
        </div>
    <?php
      // }
    }
    if($chronoline_order[$i]["STORE_CREATED"] !=0){
      // foreach($chronoline_order as $strlist){
      $store_logo=base_url()."assets/images/default_store.png";
      //echo $_SERVER["DOCUMENT_ROOT"]."/oneshop/stores/".$slist["store_code"]."/logo/mi/".$slist["profile_image_path"];
      if($chronoline_order[$i]["profile_image_path"]!=""){
        $store_logo=base_url()."stores/".$chronoline_order[$i]["store_code"]."/logo/mi/".$chronoline_order[$i]["profile_image_path"];
      }
      $profile_img=base_url()."assets/images/avatar.png";
      if($chronoline_order[$i]["profile_img"]!=""){
        $profile_img=base_url()."data/profile/mi/".$chronoline_order[$i]["profile_img"];
      }
      $profile_url=base_url()."pprofile/profilepage/".$chronoline_order[$i]["user_id"];
      $store_url=base_url()."store_home/".$chronoline_order[$i]["store_code"];
    ?>
    <div class="following_boxstyles dx_des_mat30 fll">
      <div class="following_userimage fll"> <img src="<?php echo $profile_img?>"> </div>
        <div class="following_user_namebox fll">
            <p class="fs25"> <a href="<?php echo $profile_url?>"><?php echo ucwords($chronoline_order[$i]["profile_name"]);?></a> created store <span class="blue"><a href="<?php echo $store_url?>"> <?php echo ucwords($chronoline_order[$i]["store_name"])?></a> </span> </p>
        </div>
        <p class="flr gray"> <?php echo date("d M,Y H:i:s",strtotime($chronoline_order[$i]["registered_on"]))?> </p>
        <div class="dealerpost-auctionname-wrap">
            <div class="dealerpost-dealerlogo fll">
                <p class="dealerpost-dealerleftlogo" style="width: 80px; height: 80px;">
                    <img alt="logo" title="<?php echo ucwords($chronoline_order[$i]["store_name"])?>" class="wi100pstg" src="<?php echo $store_logo;?>">
                </p>

                <div class="dealerpost-dealerleftlogo-rightcontent" style="float: right;margin: 2% 0 0 3%;width: 80%;">
                    <h2 class="normal black"> <?php echo ucwords($chronoline_order[$i]["store_name"])?> </h2>
                    <p class="fs12 fll mat5 wi100pstg black"><span class="bold"> <?php echo $chronoline_order[$i]["follower_count"]?> </span> <span> Following </span> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; <a href="#" class="blue"> Follow </a> </p>
                </div>
            </div>
        </div>
      </div>
    <?php
      // }
    }
  }
}
else{
  echo "0";
}

?>
