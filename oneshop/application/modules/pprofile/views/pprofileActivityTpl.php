<?php
$activitymsg = '';
if ($product_reviews != 0) {
  foreach ($product_reviews as $plist) {
    $rating=1;
    if($plist['rating']!="" || $plist['rating']!=0){
      $rating=$plist['rating'];
    }
    ?>
    <div class="store_activity_maindiv">
        <div class="store_tumbnail">
            <?php if ($plist['primary_image'] != '') { ?>
              <a href="<?php echo base_url() . 'product_detail_view/' . $plist['store_code'] . '/' . $plist['product_code'] ?>" title="<?php echo $plist['product_name'] ?>"><img src="<?php echo base_url() . 'stores/' . $plist['store_code'] . '/products/' . $plist['product_aid'] . '/li/' . $plist['primary_image'] ?>"></a>
            <?php } else { ?>
              <a href="<?php echo base_url() . 'product_detail_view/' . $plist['store_code'] . '/' . $plist['product_code'] ?>" title="<?php echo $plist['product_name'] ?>"><img src="<?php echo base_url() . 'assets/images/noproduct.jpg' ?>"></a>
            <?php } ?>
        </div>
        <div class="store_searchText" id=''>
            <div class="heading" style="width:528px;">
                <span class="historyHead fs14">  <?php echo "You have submitted the review for the  product : <b>" . $plist['product_name']."</b>" ?></span>
            </div>
            <span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $plist['rating_on'] ?> </span></span>
            <div class="fll clearfix"> <div class="historyDiscript fll fs12"> <?php echo ucfirst($plist['text']) . "</br>" . "Rating" . ": " . $rating . "/ 5 " ?> </div> <div class="historyDiscript mal5 fll"> </div> </div>
        </div>
    </div>
    <?php
  }
} else {
  $activitymsg = "No Activity";
}
if ($store_reviews != 0) {
  $activitymsg = '';
  $store_rviews_arry = $store_reviews;
  foreach ($store_rviews_arry as $slist) {
    $file_path=$_SERVER["DOCUMENT_ROOT"]."/oneshop/stores/".$slist["store_code"]."/logo/".$slist["profile_image_path"];
    $rating=1;
    if($activity['rating']!=""){
      $rating=$activity['rating'];
    }
    ?>
    <div class="store_activity_maindiv">
        <div class="store_tumbnail">
            <?php if ($slist['profile_image_path'] != '' && file_exists($file_path)!=false) { ?>
              <a href="<?php echo base_url() . 'store_home/' . $slist['store_code'] ?>" title="<?php echo $slist['store_name'] ?>"><img src="<?php echo base_url() . 'stores/' . $slist['store_code'] . '/logo/li/' . $slist['profile_image_path'] ?>" >
              </a>
            <?php } else { ?>
              <a href="<?php echo base_url() . 'store_home/' . $slist['store_code'] ?>" title="<?php echo $slist['store_name'] ?>"><img src="<?php echo base_url() . 'assets/images/default_store1.png' ?>"></a>
            <?php } ?>
        </div>
        <div class="store_searchText">
            <div class="heading" style="width:528px;">
                <span class="historyHead fs14">  <?php echo"You submitted a store review: <b>" . ucfirst($slist['store_name'])."</b>"; ?></span>
            </div>
            <span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $slist['commented_on'] ?> </span></span>
            <div class="fll clearfix"> <div class="historyDiscript fll fs12"> <?php echo ucfirst($slist['review_text']) . "</br>" . "Rating" . ": " .$rating . "/ 5 " ?>  </div> <div class="historyDiscript mal5 fll"> <?php //echo $activity['name']   ?> </div> </div>
        </div>
    </div>
    <?php
  }
} else {
  $activitymsg = "No Activity";
}
?>
<!--<div class="osdes_rightbar_headingsbg_wrap mat20"   >
    <div class="nodata_found_bgwrap">
        <p> <?php echo $activitymsg; ?></p>
    </div>
</div>-->