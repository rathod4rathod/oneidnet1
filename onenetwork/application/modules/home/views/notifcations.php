<?php
echo '<ul>';
if(($jobappl_result=='0' || $jobappl_result=='') && ($calls_results=='0' || $calls_results=='') && ($meetings_results=='0' || $meetings_results=='')){
        echo '<li><a href="javascript:void(0);">No Notifications</a></li>';
        echo "<script>$('.codes_noti_icon').fadeOut('fast'); </script>";
    }else{ 
        echo "<script>$('.noti_txt').text(0);</script>";
        if($jobappl_result!='0'){
                $str_vapplidsVALS   =   '';        
                foreach($jobappl_result as $key => $viewAp){
                    if($str_vapplidsVALS=='')
                        $str_vapplidsVALS   .=    $viewAp['rec_aid'];
                    else
                        $str_vapplidsVALS   .=   ','.$viewAp['rec_aid'];
                    if($key<5)
                      echo '<li><a href="javascript:void(0)" class="notifs_li">'.$viewAp['username'].' <small>applied for</small> '.$viewAp['role'].'</a></li>';
                }
                echo "<script>  notifyApp(".count($jobappl_result).",'".$str_vapplidsVALS."');        
                </script>";       
            }
        if($calls_results!='0'){   
            $str_callsVALS   =   ''; 
            foreach($calls_results as $calls){
                if($str_callsVALS=='')
                    $str_callsVALS   .=    $calls['call_id'];
                else
                    $str_callsVALS   .=   ','.$calls['call_id'];
                echo '<li><a href="javascript:void(0);" class="notifs_li">Call : '.$calls['subject'].' <small>on</small> '.$calls['call_time_from'].' </a></li>';
            }
            echo "<script> commonfunctionNotify(".count($calls_results).",'".$str_callsVALS."','str_callsids');       
                </script>"; 
        }    
        if($meetings_results!='0'){   
            $str_meetingsVALS   =   ''; 
            foreach($meetings_results as $meetings){
                if($str_meetingsVALS=='')
                    $str_meetingsVALS   .=    $meetings['meeting_aid'];
                else
                    $str_meetingsVALS   .=   ','.$meetings['meeting_aid'];
                echo '<li><a href="javascript:void(0);" class="notifs_li">Meeting : '.$meetings['subject'].' <small>on</small> '.$meetings['from_time'].' </a></li>';
            }
            echo "<script>  commonfunctionNotify(".count($meetings_results).",'".$str_meetingsVALS."','str_meetingids');      
                </script>"; 
        }
    }
 echo '</ul>';        
?>
