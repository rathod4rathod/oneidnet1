<?php
                if(count($product_ratings)!=0 && $product_ratings!=0){
                    foreach($product_ratings as $pr_list){
                        $full_name=$pr_list["first_name"]." ".$pr_list["last_name"];
                        $img_url=base_url()."assets/images/avatar.png";
                        $rating_on=explode(" ",$pr_list["rating_on"]);
                        $profile_url=base_url()."user_profile_page?profile_id=".$pr_list["profile_id"];
                        $heading_str="<a href='".$profile_url."'><b>".$full_name."</b></a> gave rating \"".$pr_list["text"]."\"";
                        echo '<div class="store_activity_maindiv">
                        <div class="store_tumbnail"><img src="'.$img_url.'"></div>
                        <div class="store_searchText">
                        <div class="heading">
                        <a href="#"><span class="historyHead">'.$heading_str.' </span></a>
                        </div>
                        <span class="watchDate"> Date : &nbsp;&nbsp;<h2>'. $rating_on[0].' </h2></span>
                        <div class="fll clearfix">
                            <!--<p class="historyDiscript fll bold"> Product Name :  </p>-->
                            <p class="historyDiscript mal5 fll">'.ucfirst($pr_list["product_name"]).' </p> </div>
                        </div>
                    </div>';

                    }
                }
                if(count($store_ratings)!=0 && $store_ratings!=0){
                foreach($store_ratings as $sr_list){
                    $full_name=$sr_list["first_name"]." ".$sr_list["last_name"];
                    $img_url=base_url()."assets/images/avatar.png";
                    if($sr_list["img_path"]!=""){
                        $img_url=ONEIDNETURL."data/".$sr_list["img_path"];
                    }
                    $profile_url=base_url()."user_profile_page?profile_id=".$sr_list["profile_id"];
                    $commented_on=explode(" ",$sr_list["commented_on"]);
                    $heading_str="<a href='".$profile_url."'><b>".$full_name."</b></a> gave rating \"".$sr_list["review_text"]."\"";

                echo '<div class="store_activity_maindiv">
                    <div class="store_tumbnail"><img src="'. $img_url.'"></div>
                    <div class="store_searchText">
                    <div class="heading">
                    <a href="#"><span class="historyHead">'.$heading_str.' </span></a>
                    </div>
                    <span class="watchDate"> Date : &nbsp;&nbsp;<h2>'. $commented_on[0].'</h2></span>
                    <div class="fll clearfix">
                        <p class="historyDiscript mal5 fll">'.ucfirst($store_info[0]["store_name"]).'</p> </div>
                    </div>
                </div>';

                }
                }
                if(count($cart_details)!=0 && $cart_details!=0){
                foreach($cart_details as $clist){
                    $img_url=base_url()."assets/images/avatar.png";
                    $full_name=$clist["first_name"]." ".$clist["last_name"];
                    if($clist["img_path"]!=""){
                        $img_url=ONEIDNETURL."data/".$clist["img_path"];
                    }
                    $profile_url=base_url()."user_profile_page?profile_id=".$clist["profile_id"];
                    $heading_str="<a href='".$profile_url."'><b>".$full_name."</b></a> added the product to his/her cart";
                    $cart_added_on=explode(" ",$clist["added_on"]);
                echo '<div class="store_activity_maindiv">
                    <div class="store_tumbnail"><img src="'.$img_url.'"></div>
                    <div class="store_searchText">
                    <div class="heading">
                    <a href="#"><span class="historyHead"> '.$heading_str.'</span></a>
                    </div>
                    <span class="watchDate"> Date : &nbsp;&nbsp;<h2>'.$cart_added_on[0].' </h2></span>
                    <div class="fll clearfix">
                        <p class="historyDiscript mal5 fll">'. ucfirst($clist["product_name"]).' </p> </div>
                    </div>
                </div>';

                }
                }
                if(count($wishlist_details)!=0 && $wishlist_details!=0){
                foreach($wishlist_details as $wlist){
                    $full_name=$wlist["first_name"]." ".$wlist["last_name"];
                    $img_url=base_url()."assets/images/avatar.png";
                    if($wlist["img_path"]!=""){
                        $img_url=ONEIDNETURL."data/".$wlist["img_path"];
                    }
                    $profile_url=base_url()."user_profile_page?profile_id=".$wlist["profile_id"];
                    $heading_str="<a href='".$profile_url."'><b>".$full_name."</b></a> added the product to his/her wishlist";
                    $wl_added_on=explode(" ",$wlist["added_on"]);
                echo '<div class="store_activity_maindiv">
                    <div class="store_tumbnail"><img src="'.$img_url.'"></div>
                    <div class="store_searchText">
                    <div class="heading">
                    <a href="#"><span class="historyHead">'. $heading_str.' </span></a>
                    </div>
                    <span class="watchDate"> Date : &nbsp;&nbsp;<h2>'.$wl_added_on[0].'</h2></span>
                    <div class="fll clearfix">
                        <!--<p class="historyDiscript fll bold"> Product Name :  </p>-->
                        <p class="historyDiscript mal5 fll">'.ucfirst($wlist["product_name"]).' </p> </div>
                    </div>
                </div>';
                }
                }
                if(count($order_details)!=0 && $order_details!=0){
                foreach($order_details as $olist){
                    $full_name=  ucfirst($olist["first_name"]." ".$olist["last_name"]);
                    $img_url=base_url()."assets/images/avatar.png";
                    if($olist["img_path"]!=""){
                        $img_url=ONEIDNETURL."data/".$olist["img_path"];
                    }
                    $profile_url=base_url()."user_profile_page?profile_id=".$olist["profile_id"];
                    $heading_str="Order received from <a href='".$profile_url."'><strong>".$full_name."</strong></a>";
                    $order_date=explode(" ",$olist["order_date"]);
                echo '<div class="store_activity_maindiv">
                    <div class="store_tumbnail"><img src="'.$img_url.'"></div>
                    <div class="store_searchText">
                    <div class="heading">
                        <a href="#"><span class="historyHead">'.$heading_str.' </span></a>
                    </div>
                    <span class="watchDate"> Date : &nbsp;&nbsp;<h2>'.$order_date[0].'</h2></span>
                    <div class="fll clearfix">
                        <!--<p class="historyDiscript fll bold"> Product Name :  </p>-->
                        <p class="historyDiscript mal5 fll">'.ucfirst($olist["product_name"]).' </p> </div>
                    </div>
                </div>';
                }
                }

                if(count($order_cancellations)!=0 && $order_cancellations!=0){
                    foreach($order_cancellations as $cancel_list){
                        $full_name=  ucfirst($cancel_list["first_name"]." ".$cancel_list["last_name"]);
                        $img_url=base_url()."assets/images/avatar.png";
                        if($cancel_list["img_path"]!=""){
                            $img_url=ONEIDNETURL."data/".$cancel_list["img_path"];
                        }
                        $profile_url=base_url()."user_profile_page?profile_id=".$cancel_list["profile_id"];
                        $heading_str="Order cancelled by <a href='".$profile_url."'><strong>".$full_name."</strong></a>";
                        $cancel_date=explode(" ",$cancel_list["cancellation_time"]);
                   echo '<div class="store_activity_maindiv">
                        <div class="store_tumbnail"><img src="'. $img_url.'"></div>
                        <div class="store_searchText">
                        <div class="heading">
                            <a href="#"><span class="historyHead"> '. $heading_str.' </span></a>
                        </div>
                        <span class="watchDate"> Date : &nbsp;&nbsp;<h2>'.$cancel_date[0].' </h2></span>
                        <div class="fll clearfix">
                            <p class="historyDiscript mal5 fll">'.ucfirst($cancel_list["product_name"]).' </p> </div>
                        </div>
                    </div>    ';

                    }
                }
                $result_str="";
if($filter_mode=="wishlist" && $wishlist_details==0){
  $result_str="No products has been added in wishlist";
}
else if($filter_mode=="orders" && $order_details==0){
  $result_str="No orders has been placed from your store";
}
else if($filter_mode=="cart_items" && $cart_details==0){
  $result_str="No products in customers cart list from your store";
}
else if($filter_mode=="order_cancellations" && $order_cancellations==0){
  $result_str="No products in customers cart list from your store";
}
else if($filter_mode=="product_reviews" && $product_ratings==0){
  $result_str="No product review(s)";
}
else if($filter_mode=="store_reviews" && $store_ratings==0){
  $result_str="No store reviews";
}
else if($filter_mode=="default" && $wishlist_details==0 && $order_details==0 && $cart_details==0 && $product_ratings==0 && $store_ratings==0 && $order_cancellations==0){
  $result_str="We didn't find any orders/cancellation/reviews in your store";
}
echo $result_str;
                ?>