<?php
if ($totalreviews != 0) {
  foreach ($totalreviews as $review) {
    $full_name = ucwords($review["profile_name"]);
    $img_url = base_url() . "assets/images/avatar.png";
    $prod_img_path = $_SERVER["DOCUMENT_ROOT"] . "/oneshop/data/profile/mi/" . $review["profile_img"];
    if ($review["profile_img"] != "" && file_exists($prod_img_path) !== false) {
      $img_url = base_url() . "data/profile/mi/" . $review["profile_img"];
    }
    ?>
    <div class="historyResultsMainDiv">
        <div class="tumbnail"><img src="<?php echo $img_url; ?>"></div>
        <div class="searchText">
            <div class="heading" style="width:450px">
                <a href="<?php echo base_url() . 'pprofile/profilepage/' . $review['user_id'] ?>"><span class="historyHead"><?php echo $full_name; ?></span></a>
            </div>
            <div class="watchDate" style="float:left;width:100%;">Rating : <?php echo $review["rating"]; ?>/5</div>
            <div class="historyDiscript" style="float:left;width:100%;"><?php echo $review["review_text"]; ?> </div>
        </div>
    </div>
    <?php
  }
} else {
  ?>
  <div class="notfound">
	<p><i class="fa fa-ban"></i> Store has no reviews to show </p>
  </div>
   <!--   <div class="nodata_found_bgwrap">
          <p>  Store has no reviews to show </p>
      </div>-->

  <?php
}
?>
