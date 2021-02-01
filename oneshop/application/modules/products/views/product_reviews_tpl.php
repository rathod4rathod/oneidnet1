<?php
//print_r($review_details);
if($review_details!=0){
foreach($review_details as $rlist){
    $profile_pic=base_url()."assets/images/avatar.png";
    $full_name=$rlist["first_name"]." ".$rlist["last_name"];
    if($rlist["img_path"]!=""){
        $profile_pic=ONEIDNETURL."data/".$rlist["img_path"];
    }
?>
<div class="historyResultsMainDiv">
<div class="tumbnail"><img src="<?php echo $profile_pic?>"></div>
<div class="searchText">
<div class="heading">
<a href="#"><span class="historyHead">  <?php echo $full_name?> </span></a>
</div>
<span class="watchDate">Rating : &nbsp;&nbsp;<h2> <?php echo $rlist["rating"];?>/5 </h2></span>
<span class="historyDiscript">"<?php echo $rlist["text"];?>". </span>
</div>
</div>
<?php
}
}else{
  echo "<h2>No reviews to this product</h2>";
}
?>
