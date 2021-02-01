<?php 
/*echo "<pre>";
print_r($product_reviews);
echo "</pre>";*/

if($product_reviews!=0){
    foreach($product_reviews as $plist){
    ?>
    <div class="store_activity_maindiv avatar">
<div class="store_tumbnail">
<?php if($plist['primary_image']!=''){ ?>
<a href="" title="<?php echo $plist['product_name'] ?>"><img src="<?php echo base_url() .'stores/'.$plist['code'].'/products/'.$plist['product_aid'].'/li/'.$plist['primary_image']?>"></a>
<?php }else{?>
<a href="" title="<?php echo $plist['product_name'] ?>"><img src="<?php echo base_url().'assets/images/noproduct.jpg'?>"></a>
<?php } ?>
</div>
<div class="store_searchText" id=''>
<div class="heading">
<a href=""><span class="historyHead fs14">  <?php echo "You have submitted the review for the  product : ". $plist['product_name'] ?></span></a>
</div>
<span class="watchDate"><i class="fa fa-clock-o" style="margin-right:5px;"></i> <span> <?php echo $plist['rating_on']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12"> <?php echo  ucfirst($plist['text']) ."</br>" ."Rating".": ". $plist['rating']."/ 5 "   ?> </div> 
<div class="historyDiscript mal5 fll"> </div> </div>
</div>
</div>
<?php
    }
}
if($store_reviews!=0){
    $store_rviews_arry=$store_reviews;
    foreach($store_rviews_arry as $slist){
?>
           <div class="store_activity_maindiv avatar">
<div class="store_tumbnail">
<?php if($slist['profile_image_path']!=''){ ?>
<a href="" title="<?php echo $slist['store_name'] ?>"><img src="<?php echo base_url() .'stores/'.$slist['store_code'].'/logo/mi/'.$slist['profile_image_path'] ?>" height="100" width="100"/></a>
<?php }else{?>
<a href="" title="<?php echo $slist['store_name'] ?>"><img src="<?php echo base_url().'assets/images/default_store1.png'?>"></a>
<?php } ?>
</div>
<div class="store_searchText">
<div class="heading">
<a href="" ><span class="historyHead fs14">  <?php echo"You submitted a store review: " ;?><a href="<?php echo base_url() .'store_home/'.$slist['store_code']?>" ><?php echo ucfirst($slist['store_name']);  ?> </a></span></a>
</div>
<span class="watchDate"><i class="fa fa-clock-o" style="margin-right:5px;"></i> <span> <?php echo $slist['commented_on']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12"> <?php echo  ucfirst($slist['review_text']) ."</br>" ."Rating".": ". $activity['rating']."/ 5 "   ?>  </div> <div class="historyDiscript mal5 fll"> <?php //echo $activity['name']  ?> </div> </div>
</div>
</div>
           <?php
    }
}
if($orders!=0){
    $orders_arry=$orders;
    foreach($orders_arry as $olist){
        $img_url=base_url()."assets/images/avatar.png";
        if($olist["primary_image"]!=""){
            $img_url=base_url()."stores/".$olist["store_code"]."/products/".$olist["product_aid"]."/li/".$olist["primary_image"];
        }
?>
    <div class="store_activity_maindiv">
        <div class="store_tumbnail"><img src="<?php echo $img_url?>"></div>
        <div class="store_searchText">
            <div class="heading">
                <span class="historyHead fs14">  <?php echo"You placed an order with order no:";?><a href=""><?php echo $olist['order_code']  ?></a></span>
            </div>
            <span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $olist['time']  ?> </span></span>
            <div class="fll clearfix"> 
                <div class="historyDiscript fll fs12">   </div> 
                <div class="historyDiscript mal5 fll">  </div> 
            </div>
        </div>
    </div>
           <?php
    }
}
if($order_cancellations!=0){
    $cancel_arry=$order_cancellations;
    foreach($cancel_arry as $clist){
        $img_url=base_url()."assets/images/avatar.png";
        if($clist["primary_image"]!=""){
            $img_url=base_url()."stores/".$clist["store_code"]."/products/".$clist["product_aid"]."/li/".$clist["primary_image"];
        }
?>
           <div class="store_activity_maindiv">
<div class="store_tumbnail"><img src="<?php echo $img_url?>"></div>
<div class="store_searchText">
<div class="heading">
<span class="historyHead fs14">  <?php echo "You cancelled an order with order no:";?> <a href=""><?php echo $clist['order_code']  ?></a></span>
</div>
<span class="watchDate"> Date : &nbsp;&nbsp;<span> <?php echo $clist['time']  ?> </span></span>
<div class="fll clearfix"> <div class="historyDiscript fll fs12">  </div> <div class="historyDiscript mal5 fll"> </div> </div>
</div>
</div>
           <?php
    }
}

?>     
