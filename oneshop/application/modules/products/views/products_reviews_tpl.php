<?php
$reviews_count=0;
if($review_details!=0){
    $reviews_count=count($review_details);
    $cnt=0;
    foreach($review_details as $rlist){
        $img_url=base_url()."assets/images/avatar.png";
        if($rlist["img_path"]!=""){
            $img_url=ONEIDNETURL."data/".$rlist["img_path"];
        }    
    ?>
    <div class="historyResultsMainDiv">
        <div class="tumbnail"><img src="<?php echo $img_url;?>"></div>
        <div class="searchText">
            <div class="heading">
            <a href="#"><span class="historyHead">  <?php echo $rlist["username"];?> </span></a>
            </div>
            <span class="watchDate">Rating : &nbsp;&nbsp;<h2> <?php echo $rlist["rating"];?>/5 </h2></span>
            <span class="historyDiscript"><?php echo $rlist["text"];?> </span>                        
        </div>  
    </div>
<?php
        $cnt++;
    }
}
?>
<script type="text/javascript">
    var review_count=<?php echo $reviews_count;?>;
    $(document).ready(function(){
        $("#hreviews_cnt").val(review_count);
        if(review_count==0){
            $("#load_more_div").css("display","none");
        }
    });
    </script>
