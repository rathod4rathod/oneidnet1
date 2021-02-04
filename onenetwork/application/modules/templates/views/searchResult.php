<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("packages");
//print_r($search_result);
?>
<div class="clr">&nbsp;</div>
<div class="new_wrapper">
    <div class="db-container fll" style="height:470px">
      <div class="wi100pstg fll mab15 mat30">
          <h2 class="fs18 wi100pstg  pab10 mab30"> Search results by '<?php echo $search_term;?>' </h2>
          <?php
          if($search_result["promotions_result"]!=0){
            $promotions_result=$search_result["promotions_result"];
            foreach($promotions_result as $plist){
              $promotion_url=base_url()."campaignDV?promo_id=".  base64_encode(base64_encode($plist["promo_code"]));
          ?>
            <div class="wi100pstg pab10 mab15 fll overflow borderbottom">
                <div class="db-user-profile-leftbox-leftimg">
    <!--                <img width="50" height="50" class="db-user-profile-img-leftimagenew" src="<?php echo base_url() . 'assets/images/ProductPromotion.png'; ?>">-->
                </div>
                <div class="db-user-profile-right-div-image-contentright-div">
                    <h2 class="mab10"> <a href="<?php echo $promotion_url?>"><?php echo $plist["promo_name"]?></a> </h2>
    <!--                <p>914 translation by H. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat </p>-->
                </div>
            </div>
          <?php
            }
          }
          if($search_result["gma_result"]!=0){
            $gma_result=$search_result["gma_result"];
            foreach($gma_result as $plist){
              //$gma_url=base_url()."campaignDV?promo_id=".  base64_encode(base64_encode($plist["promo_code"]));
          ?>
            <div class="wi100pstg pab10 mab15 fll overflow borderbottom">
                <div class="db-user-profile-leftbox-leftimg">
    <!--                <img width="50" height="50" class="db-user-profile-img-leftimagenew" src="<?php echo base_url() . 'assets/images/ProductPromotion.png'; ?>">-->
                </div>
                <div class="db-user-profile-right-div-image-contentright-div">
                    <h2 class="mab10"> <a href="javascript:void(0)"><?php echo $plist["campaign_name"]?></a> </h2>
    <!--                <p>914 translation by H. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat </p>-->
                </div>
            </div>
          <?php
            }
          }
          if($search_result["packages_result"]!=0||$search_result["packages_result"]!=""){
            //$pkgs_result=ltrim($search_result["packages_result"],",");
            $pkgs_arry=explode("~", $search_result["packages_result"]);
            //print_r($pkgs_arry);
            for($i=0;$i<count($pkgs_arry);$i++){
              $option=explode(":",$pkgs_arry[$i]);
              if($option[0]=="os_package"){
                $pkgs_url=base_url()."os_package";
              }else{
                $pkgs_url=base_url()."os_package/copackages";
              }
             ?>
             <div class="wi100pstg pab10 mab15 fll overflow borderbottom">
                <div class="db-user-profile-leftbox-leftimg">
    <!--                <img width="50" height="50" class="db-user-profile-img-leftimagenew" src="<?php echo base_url() . 'assets/images/ProductPromotion.png'; ?>">-->
                </div>
                <div class="db-user-profile-right-div-image-contentright-div">
                    <h2 class="mab10"> <a href="<?php echo $pkgs_url?>"><?php echo $option[1]?></a> </h2>
    <!--                <p>914 translation by H. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Rackham itation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat </p>-->
                </div>
            </div>
          <?php
            }
          }
          if($search_result["promotions_result"]!=0||$search_result["gma_result"]!=0||$search_result["packages_result"]!=0||$search_result["packages_result"]!=""){
            echo "No result(s) found";
          }
          ?>
      </div>
    </div>
</div>
<?php
$this->templates->footer();
?>