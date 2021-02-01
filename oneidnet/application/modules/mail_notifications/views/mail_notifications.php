<?php
        echo "<script>isdes_coofficeNot_zero();</script>";
        if($jobappl_result!='0'){
            $jobappl_result_ids = implode(',',(array_map(function($x) { return $x['rec_aid']; },$jobappl_result)));        
            ?>   
            <div onclick="co_oneid_notif_jobs('<?php echo $jobappl_result_ids; ?>')" class="mmcMainInnerWrapper">
                <span class="mmciconWrapper3"><img src="<?php  echo base_url().'assets/'?>Images/contentImages/ofc.png"></span>
                <span class="mmcTextWrapper3">
                                <h2><?php echo count($jobappl_result);  ?> Job applications </h2>
                </span>
            </div>             
            <script> isdes_coofficeNot_amt(<?php echo count($jobappl_result); ?>);</script>  
            <?php                   
            }
        if($calls_results!=''){   
            $calls_results_ids = implode(',',(array_map(function($x) { return $x['call_id']; },$calls_results)));        
           ?>
            <div onclick="co_oneid_notif_calls('<?php echo $calls_results_ids; ?>')" class="mmcMainInnerWrapper">
                <span class="mmciconWrapper3"><img src="<?php  echo base_url().'assets/'?>Images/contentImages/view.png"></span>
                <span class="mmcTextWrapper3">
                        <h2><?php echo count($calls_results);  ?> New Calls</h2>
                </span>
            </div>          
            <script> isdes_coofficeNot_updamt(<?php echo count($calls_results); ?>);</script> 
           <?php            
        }    
        if($meetings_results!=''){
            $meetings_results_ids = implode(',',(array_map(function($x) { return $x['meeting_aid']; },$meetings_results)));        
            ?>
            <div onclick="co_oneid_notif_meetings('<?php echo $meetings_results_ids; ?>')" class="mmcMainInnerWrapper">
                <span class="mmciconWrapper3"><img src="<?php  echo base_url().'assets/'?>Images/contentImages/view.png"></span>
                <span class="mmcTextWrapper3">
                        <h2><?php echo count($meetings_results);  ?> New Meetings</h2>
                </span>
            </div>                          
            <script> isdes_coofficeNot_updamt(<?php echo count($meetings_results); ?>);</script>
            <?php           
        }
      
?>

