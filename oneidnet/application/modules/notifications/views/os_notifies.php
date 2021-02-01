<div class="mmcMainSlideWrapper">
                    <?php 
                    if($notifications_data!=0){
                        $i=0;
                        $notifications_title=array("MESSAGE"=>"New Message(s)",'ORDER_PLACED'=>"Orders Placed",'ORDER_STATUS'=>"Order Changes",'ORDER_CANCEL'=>"Order Cancellations",'STORE_REPORTED'=>"Store reports",'PRODUCT_REPORTED'=>"Product Reports",'STORE_RATING'=>"Store Rating(s)",'STORE_REVIEW'=>"Store Review(s)",'PRODUCT_RATING'=>'Product Rating(s)','PRODUCT_REVIEW'=>'Product Review(s)');
                        $imgs_arry=array('MESSAGE'=>"OD038_tcomments",'ORDER_PLACED'=>"OD017_oshop-order-changes",'ORDER_STATUS'=>"OD020_oshop-report",'ORDER_CANCEL'=>"OD018_oshop-order-canceled",'STORE_REPORTED'=>"OD020_oshop-report",'PRODUCT_REPORTED'=>"OD020_oshop-report",'STORE_RATING'=>"OD016_oshop-rating",'STORE_REVIEW'=>"OD019_oshop-review",'PRODUCT_RATING'=>"OD016_oshop-rating",'PRODUCT_REVIEW'=>"OD016_oshop-rating");
                    foreach ($notifications_data as $type=>$count) {
                        //$img_url=base_url().'assets/Images/contentImages/'.$imgs_arry[$type];
                        //echo $type;
                      ?>
                              <?php //if ($ntf_dtl_info["type"] == "ORDER_PLACED") {
                                ?>
                                <div class="mmcMainInnerWrapper" id="notify_<?php echo $i?>">
                                    <span class="mmciconWrapper3"><i class="sprite sprite-<?php echo $imgs_arry[$type] ?>" style="margin:2px 0 0 17px;"></i></span>
                                    <span class="mmcTextWrapper3">
                                        <h2><?php echo $count; ?> <?php echo $notifications_title[$type]?> </h2>
                                    </span>
                                </div>
                                <?php //}
                              ?>

                    <?php 
                        $i++;
                    }}else{
                      ?>
                        
                         <div class="mmcMainInnerWrapper">
                                    <span class="mmciconWrapper3"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/cart.png"></span>
                                    <span class="mmcTextWrapper3">
                                        <h2>0</h2>
                                    </span>
                                </div>
                        <?php
                    }
                    ?>
<!--                    <div class="mmcMainInnerWrapper">
                        <span class="mmciconWrapper3"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/store.png"></span>
                        <span class="mmcTextWrapper3">
                            <h2>5 New Stores</h2>
                        </span>
                    </div>-->
</div>