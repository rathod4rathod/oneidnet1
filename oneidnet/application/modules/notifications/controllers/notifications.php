<?php
if(!isset($_SESSION)){
  session_start();
}
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notifications extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('db_api');        
        $ckobj = $this->load->module("cookies");
        if (!$ckobj->getUserID()) {
            echo '<script>if(self==top)
		{location.replace("' . base_url() . '");}else{top.location.reload();}</script>';
            die();
        } else if ($_REQUEST) {
          $sobj=  $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $sobj->key_check($_REQUEST["skey"]);
            }
        }
    }
    function getUserId(){
        $ckobj = $this->load->module("cookies");
        return $ckobj->getUserID();
    }
    function index() {}
    // total count of notifications by Pavani on 19082015 --- buzzin
    function notification_total_count(){
        $dbapi=$this->load->module("db_api");
        $uid=$this->getUserId();
         $nqur="select count(is_read) as ncount,(SELECT count(message_aid) FROM `vcom_messages_soc` WHERE module='BUZZIN' and `receiver_id_fk`=$uid and read_or_not='0')as mcount,(SELECT count(`user_id_fk`) FROM `buzzin_followers` WHERE `user_id_fk`=".$uid." and `read_or_not`='0') as ccount from buzzin_notifications where is_read='0' and to_userid=".$uid;
        $result=$dbapi->custom($nqur);
        echo $result[0]["ncount"]+$result[0]["mcount"]+$result[0]["ccount"];
    }
  
  
    //19-05-2015 by venkatesh :this function get the user notification count
    function tunnel_notification_count() {      
        $uid=$this->getUserId();
        $db_obj = $this->load->module('db_api');
          $query = "SELECT count(read_or_not) ncount,(SELECT count(*) as mcount FROM `vcom_messages_soc` WHERE module='TUNNEL' and `receiver_id_fk`=$uid and read_or_not='0' ) as mcount ,(SELECT count(rec_id) as scount FROM `tunnel_followers` WHERE `friend_id`=$uid and `request`='PEN' and `read_or_not`='0') as ccount FROM tunnel_notification WHERE read_or_not='0' and user_id_fk=$uid ";
        $rlt = $db_obj->custom($query);
        print_R($rlt[0]["ncount"]+$rlt[0]["mcount"])+$rlt[0]["ccount"];
    }
  
    // buzzin main view for display the notifications by Pavani on 19-08-2015
    function buzzin_notify_main(){
        $this->load->view("notifications/buzzin_notify_view");
    }
    // buzzin notifications template by Pavani on 19-08-2015
    function buzzin_notify_tpl(){
        $dbapi=$this->load->module("db_api");
        $user_id=$this->getUserId();
        $result=$dbapi->select("count(*) as cnt,notification_type","buzzin_notifications","is_read=0 and to_userid=".$user_id);      
        $mrlt=$dbapi->custom("SELECT count(*) as mcount FROM `vcom_messages_soc` WHERE module='CLICK' and `receiver_id_fk`=" .$user_id." and read_or_not='0'");
        $data["MESSAGE"]=$mrlt[0]["mcount"];
        $data["notifications"]=$result;
        $this->load->view("notifications/buzzin_notify_tpl",$data);
    }
    // click main view for display the notifications by Pavani on 19-08-2015
    function click_notify_main(){
        $this->load->view("notifications/click_notify_view");
    }
    
    function click_notify_tpl(){
        $dbapi=$this->load->module("db_api");
        $user_id=$this->getUserId();
        $notifcations_type=array('MESSAGE'=>0,'INVITATION_FOR_EVENT'=>0,'LIKED_YOUR_POST'=>0,'SHARED_YOUR_POST'=>0,'INVITATION_RCVD_TO_LIKE_PAGE'=>0,'POST_IN_YOUR_PAGE'=>0,'COMMENTED_ON_EVENT_POST'=>0,'POST_FOR_YOUR_EVENT'=>0,'NEW_REQUEST_RCVD_TO_JOIN_GROUP'=>0,'FRIENDS_BIRTHDAY'=>0,'COMMENTED_ON_GROUP_POST'=>0,'COMMENTED_ON_PAGE_POST'=>0,'COMMENTED_ON_YOUR_POST'=>0,'LIKED_PAGE_POST'=>0,'LIKED_GROUP_POST'=>0,'FRIENDS_REQUEST'=>0);
        $result=$dbapi->select("count(*) as cnt,type","click_notifications","is_read=0 and user_id=".$user_id." and type IN ('INVITATION_FOR_EVENT','LIKED_YOUR_POST','SHARED_YOUR_POST','INVITATION_RCVD_TO_LIKE_PAGE','POST_IN_YOUR_PAGE','COMMENTED_ON_EVENT_POST','POST_FOR_YOUR_EVENT','NEW_REQUEST_RCVD_TO_JOIN_GROUP','FRIENDS_BIRTHDAY','COMMENTED_ON_GROUP_POST','COMMENTED_ON_PAGE_POST','COMMENTED_ON_YOUR_POST','LIKED_PAGE_POST','LIKED_GROUP_POST') group by type");
        $fresult=$dbapi->select("count(*) as cnt","click_friends_requests","user_id_fk=".$user_id);
        if($result!=0){
            foreach($result as $clist){
                if($clist["cnt"]!=0){
                    $notifcations_type[$clist["type"]]=$clist["cnt"];
                }
            }
        }    
        $mrlt=$dbapi->custom("SELECT count(*) as mcount FROM `vcom_messages_soc` WHERE module='CLICK' and `receiver_id_fk`=" .$user_id." and read_or_not='0'");
        $notifcations_type["MESSAGE"]=$mrlt[0]["mcount"];
        if($fresult[0]["cnt"]!=0){
            $notifcations_type["FRIENDS_REQUEST"]=$fresult[0]["cnt"];
        }        
        $data["notifications"]=$notifcations_type;
        $this->load->view("notifications/click_notify_tpl",$data);
    }
    //15-12-2015 by venkatesh
    function netpro_notification_count() {
        $db_obj = $this->load->module("db_api");
        $uid=$this->getUserId();
        $sql="select count(*) as ncount,(SELECT count(DISTINCT(`subject_id_fk`))  FROM `vcom_protalk` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='NETPRO') as mcount,(SELECT count(`rec_aid`) FROM `netpro_connection` WHERE `user_id_fk`=$uid and `is_confirmed`='Pending' and `read_or_not`='0') as ccount from netpro_notification where user_id_fk= $uid and ( status=0 )";
        $rlt= $db_obj->custom($sql);
        echo $rlt[0]["ncount"]+$rlt[0]["mcount"]+$rlt[0]["count"];
    }
    
    function get_netpro_notifications()
    {        
        $uid=$this->getUserId();
        $sql="SELECT count(*) as ncount,type FROM netpro_notification WHERE user_id_fk =".$uid." AND status=0 GROUP BY type";
        $netpro_result = $this->db_api->custom($sql);
        $netpro_data=array("MESSAGE"=>0,'New Connection'=>0,'Like'=>0,'Comment'=>0,'Post'=>0,'Recommendation Received'=>0,'Endorsement'=>0,'View'=>0,'Member Request to join Group'=>0,'Recommendation Request'=>0,'REQUEST_TO_VIEW_PROFILE'=>0);
        if($netpro_result!=0){
            foreach($netpro_result as $nlist){
                if($nlist["ncount"]!=0){
                    $netpro_data[$nlist["type"]]=$nlist["ncount"];
                }
            }
        }
       $mlt= $this->db_api->custom("SELECT count(DISTINCT(`subject_id_fk`)) as netpromsgcunt FROM `vcom_protalk` WHERE `receiver_id_fk`=".$uid." and `read_or_not`='0' and module='NETPRO'");
        $netpro_data["MESSAGE"]=$mlt[0]["netpromsgcunt"];
        $data["netpro_notifications"]=$netpro_data;
        $this->load->view("notifications/netpronotifications",$data);
    }
  
    // by venkatesh on 19-08-2015
    function click_notification_total_count(){
        $dbapi=$this->load->module("db_api");
        $uid=$this->getUserId();
        $aqur="select count(*) as ncount,(SELECT count(user_id_fk) as cnt FROM `click_friends_requests` WHERE friend_id_fk=$uid and `readornot`='0' ) as fcount,(SELECT count(`message_aid`) as count FROM `vcom_messages_soc` WHERE module='CLICK' and `receiver_id_fk`=$uid and `read_or_not`='0' ) as mcount from click_notifications where is_read=0 and user_id=$uid and type IN ('INVITATION_FOR_EVENT','LIKED_YOUR_POST','SHARED_YOUR_POST','INVITATION_RCVD_TO_LIKE_PAGE','POST_IN_YOUR_PAGE','COMMENTED_ON_EVENT_POST','POST_FOR_YOUR_EVENT','NEW_REQUEST_RCVD_TO_JOIN_GROUP','YOUR_PAGE_RCVD_LIKE','FRIENDS_BIRTHDAY','COMMENTED_ON_GROUP_POST','COMMENTED_ON_PAGE_POST','COMMENTED_ON_YOUR_POST','LIKED_PAGE_POST','LIKED_GROUP_POST')";
        $a_nresult = $dbapi->custom($aqur);
        echo $a_nresult[0]["ncount"]+$a_nresult[0]["mcount"]+$a_nresult[0]["ccount"];
    }
    function tunnel_notification_slide_view() {
        $db_obj = $this->load->module('db_api');
        $uid= $this->getUserId();
        $notif_type_arry=array('MESSAGE'=>0,'LIKE'=>0,'DISLIKE'=>0,'VIDEO_SHARE'=>0,'CHANNEL_SUBSCRIBE'=>0,'COMMENT'=>0,'COMMENT_REPLY'=>0,'TUNNEL_SHARE'=>0);        
        $result= $db_obj->custom("SELECT notification_type, COUNT(*) TotalCount FROM tunnel_notification where read_or_not='0' and user_id_fk=".$uid." GROUP BY notification_type HAVING COUNT(*)");
        if($result!=0){
            foreach($result as $notif_list){
                if($notif_list["TotalCount"]!=0){
                    $notif_type_arry[$notif_list["notification_type"]]=$notif_list["TotalCount"];
                }
            }
        }
        $mrlt=$db_obj->custom("SELECT count(*) as mcount FROM `vcom_messages_soc` WHERE module='TUNNEL' and `receiver_id_fk`=" .$uid." and read_or_not='0'");
        $notif_type_arry["MESSAGE"]=$mrlt[0]["mcount"];
        //print_r($notif_type_arry);
        $data["notify_type"]=$notif_type_arry;
        $this->load->view("notifications/tunnel_notification_slide_view",$data);
    }
    function cvbank_notify_count(){
        $uid=$this->getUserId();
        $dbobj=$this->load->module("db_api");
        $cvquery="      SELECT count(`second_entity_id`) as ncount,(SELECT count(DISTINCT(`subject_id_fk`)) FROM `vcom_protalk` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='CVBANK') as mcount,(SELECT count(*)  FROM `cvbank_connection` WHERE `user_id_fk`=$uid and `read_or_not`='0') as ccount FROM `co_notifications` WHERE `second_entity_id`= $uid and `type` in('U_UC_RESUME_DOWNLOADED_BY_COMPANY','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_PROFILE_VIEWED_BY_COMPANY') and `read_status`='0'";
        $rlt=$dbobj->custom($cvquery);
        echo $rlt[0]["ncount"]+$rlt[0]["mcount"]+$rlt[0]["ccount"];
    }
    function cvbankNotifications(){
        $ntype_arry=array('U_UC_INTERVIEW_SCHEDULED'=>0,'U_UC_PROFILE_VIEWED_BY_COMPANY'=>0,'U_UC_PROFILE_SHORTLISTED_BY_COMPANY'=>0,'U_UC_NETPRO_PROFILE_ACCESS_REQUEST'=>0,'U_UC_RESUME_DOWNLOADED_BY_COMPANY'=>0,'U_UC_NETPRO_PROFILE_ACCESS_GIVEN'=>0,"C_UC_NETPRO_PROFILE_ACCESS_APPROVED"=>0);
        $coquery="SELECT count(*) as cnt,type FROM co_notifications WHERE read_status='0' AND second_entity_id=".$this->getUserId()." AND type IN ('U_UC_INTERVIEW_SCHEDULED','U_UC_PROFILE_VIEWED_BY_COMPANY','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_NETPRO_PROFILE_ACCESS_REQUEST','U_UC_RESUME_DOWNLOADED_BY_COMPANY','U_UC_NETPRO_PROFILE_ACCESS_GIVEN','C_UC_NETPRO_PROFILE_ACCESS_APPROVED') GROUP BY type";
        $dbobj=$this->load->module("db_api");
        $cvresult=$dbobj->custom($coquery);
        if($cvresult!=0){
            foreach($cvresult as $cvlist){
                if($cvlist["cnt"]!=0){
                    $ntype_arry[$cvlist["type"]]=$cvlist["cnt"];
                }
            }
        }
        $data["cv_data"]=$ntype_arry;
        $this->load->view("notifications/cvbank_notification_tpl",$data);
    }
    function isnewsNotifications(){
        $ntype_arry=array('FAKED_NEWS_VOTE'=>0,'GOOD_NEWS_VOTE'=>0,'SAD_NEWS_VOTE'=>0,"HEART_NEWS_VOTE"=>0,'SUBSCRIBE_CHANNEL_VOTE'=>0);
        $coquery="SELECT count(*) as cnt,type FROM isn_notifications WHERE status='0' AND user_id_fk=".$this->getUserId()." AND type IN ('FAKED_NEWS_VOTE','GOOD_NEWS_VOTE','SAD_NEWS_VOTE','HEART_NEWS_VOTE','SUBSCRIBE_CHANNEL_VOTE') GROUP BY type";
        $dbobj=$this->load->module("db_api");
        $cvresult=$dbobj->custom($coquery);
        if($cvresult!=0){
            foreach($cvresult as $cvlist){
                if($cvlist["cnt"]!=0){
                    $ntype_arry[$cvlist["type"]]=$cvlist["cnt"];
                }
            }
        }
        $data["cv_data"]=$ntype_arry;
        $this->load->view("notifications/isnews_notification_tpl",$data);
    }
    function co_notify_cnt(){
        $uid=$this->getUserId();
        $dbobj=$this->load->module("db_api");
        $coquery="SELECT count(`second_entity_id`) as ncount,(SELECT count(`friend_id_fk`) FROM `blog_users_connections` WHERE `friend_id_fk`=$uid and followed_via_module='COFFICE' and `read_or_not`='0' and `status`='PND') as ccount,(SELECT count(`message_aid`) FROM `vcom_messages_soc` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='COFFICE') as mcount   FROM co_notifications where type in('U_UC_INTERVIEW_SCHEDULED','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_PROFILE_VIEWED_BY_COMPANY','U_UC_NETPRO_PROFILE_ACCESS_REQUEST','U_UC_NETPRO_PROFILE_ACCESS_GIVEN','C_UC_NETPRO_PROFILE_ACCESS_APPROVED','U_UC_RESUME_DOWNLOADED_BY_COMPANY') and `second_entity_id`=$uid and `read_status`='0'";
        $coresult=$dbobj->custom($coquery);
      echo $coresult[0]["ncount"]+$coresult[0]["ccount"]+$coresult[0]["mcount"];
    }
    function coNotifications(){
        $ntype_arry=array('C_UC_COMPANY_FOLLOWED_BY_USER'=>0,'C_CJ_APPLICATION_RECEIVED_FOR_JOB'=>0);
        $coquery="SELECT count(*) as cnt,type FROM co_notifications WHERE read_status='0' AND second_entity_id=".$this->getUserId()." AND type IN ('C_UC_COMPANY_FOLLOWED_BY_USER','C_CJ_APPLICATION_RECEIVED_FOR_JOB') GROUP BY type";
        $dbobj=$this->load->module("db_api");
        $cvresult=$dbobj->custom($coquery);
        if($cvresult!=0){
            foreach($cvresult as $cvlist){
                if($cvlist["cnt"]!=0){
                    $ntype_arry[$cvlist["type"]]=$cvlist["cnt"];
                }
            }
        }
        $data["co_data"]=$ntype_arry;
        $this->load->view("notifications/co_notification_tpl",$data);
    }
    function dxNotificationCnt(){
        $uid=$this->getUserId();
        $dbobj=$this->load->module("db_api");
         $dxquery="SELECT count(*) as ncount,(SELECT count(DISTINCT(`subject_id_fk`)) FROM `vcom_protalk` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='DEALERX') as mcount,(SELECT count(`rec_aid`) FROM `dx_connections` WHERE `friend_id_fk`=$uid and `request_status`='PENDING' and read_or_not='0') as ccount FROM dx_notifications WHERE user_id_fk=$uid AND status='0'";
        $rlt= $dbobj->custom($dxquery);
        echo $rlt[0]["ncount"]+$rlt[0]["mcount"]+$rlt[0]["ccount"];
    }
    function dxNotifications(){
        $uid=$this->getUserId();
        $dx_types=array("MESSAGE"=>0,'CONNECTION_REQUEST_RECEIVED'=>0,'YOU_ARE_WINNER'=>0,'YOU_ARE_SECOND_RUNNER_UP'=>0,'CONNECTION_REQUEST_APPROVED'=>0,'YOU_ARE_FIRST_RUNNER_UP'=>0,'AUCTION_RESULT_ANNOUNCED'=>0,'FOLLOWING_YOUR_DEALER_PROFILE'=>0);
        $dxquery="SELECT count(*) as cnt,type FROM dx_notifications WHERE user_id_fk=".$uid." AND status='0' GROUP BY type";
        $dbobj=$this->load->module("db_api");
        $dxresult=$dbobj->custom($dxquery);
        if($dxresult!=0){
            foreach($dxresult as $dxlist){
                if($dxlist["cnt"]!=0){
                    $dx_types[$dxlist["type"]]=$dxlist["cnt"];
                }
            }
        }
        $mlt= $dbobj->custom("SELECT count(DISTINCT(`subject_id_fk`)) as netpromsgcunt FROM `vcom_protalk` WHERE `receiver_id_fk`=".$uid." and `read_or_not`='0' and module='DEALERX'");
       $dx_types["MESSAGE"]= $mlt[0]["netpromsgcunt"];
        $data["dx_data"]=$dx_types;
        $this->load->view("notifications/dx_notification_tpl",$data);
    }    
    //19-08-2015 by venkatesh
    function os_notifies() {
        $db_obj = $this->load->module("db_api");        
        $uid=$this->getUserId();
        $result = $db_obj->custom("SELECT type, COUNT(*) TotalCount FROM oshop_notifications where status='0' and to_userid=".$uid." GROUP BY type HAVING COUNT(*)");
        $notifications_data=array("MESSAGE"=>0,'ORDER_PLACED'=>0,'ORDER_STATUS'=>0,'ORDER_CANCEL'=>0,'STORE_REPORTED'=>0,'PRODUCT_REPORTED'=>0,'STORE_RATING'=>0,'STORE_REVIEW'=>0,'PRODUCT_RATING'=>0,'PRODUCT_REVIEW'=>0);
        if($result!=0){
            foreach($result as $notify_li){
                if($notify_li["TotalCount"]!=0){
                    $notifications_data[$notify_li["type"]]=$notify_li["TotalCount"];
                }
            }
        }
        $mlt= $db_obj->custom("SELECT count(DISTINCT(`subject_id_fk`)) as netpromsgcunt FROM `vcom_protalk` WHERE `receiver_id_fk`=".$uid." and `read_or_not`='0' and module='ONESHOP'");
        $notifications_data["MESSAGE"]=$mlt[0]["netpromsgcunt"];
        $data["notifies_result"]=$result;
        $data["notifications_data"]=$notifications_data;
        $this->load->view("notifications/os_notifies", $data);
    }
    //19-08-2015 by venkatesh
    function os_notifies_count() {
        $db_obj = $this->load->module("db_api");
        $uid= $this->getUserId();
        $rltqur="select count(rec_aid) as ncount,(SELECT count(DISTINCT(`subject_id_fk`))FROM `vcom_protalk` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='ONESHOP') as mcount,(SELECT count(`rec_aid`) FROM `oshop_explore` WHERE `user_id_fk`=$uid and `read_or_not`='0') as ccount from oshop_notifications where status='0' AND to_userid=$uid";
        $rlt = $db_obj->custom($rltqur);
        echo $rlt[0]["ncount"]+$rlt[0]["mcount"]+$rlt[0]["ccount"];
    }
    function insNotificationCnt(){
        $db_obj = $this->load->module("db_api");
        $uid=$this->getUserId();
        $nqur="select count(status) as ncount,(SELECT count(`rec_aid`) FROM `isn_user_followers` WHERE `follower_id_fk`=$uid and `read_or_not`='0') as ccount,(SELECT count(DISTINCT(`subject_id_fk`)) FROM `vcom_protalk` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='ISNEWS') as mcount from `isn_notifications` WHERE `status`='0' and user_id_fk= $uid";
        $nrlt=  $db_obj-> custom($nqur);
        echo $nrlt[0]["ncount"]+$frlt[0]["ccount"]+$mrlt[0]["mcount"];
    }
    
    //dec 05 2016 by venkatesh
    function find_notification_total_count() {
        $db_obj = $this->load->module("db_api");
        $uid = $this->getUserId();
         $qur = "SELECT count(`friend_id_fk`)as fcount,(SELECT count(DISTINCT(`subject_id_fk`)) as mcount FROM `vcom_protalk` WHERE `receiver_id_fk`=$uid and `read_or_not`='0' and module='FINDIT') as mcount FROM `blog_users_connections` WHERE `friend_id_fk`=$uid and followed_via_module='FINDIT' and `read_or_not`='0' and `status`='PND'";
        $frlt = $db_obj->custom($qur);
        echo $frlt[0]["fcount"] + $frlt[0]["mcount"];
    }
//dec 05 2016 by venkatesh
    function onenetwork_notification_total_count(){
    $uid=$this->getUserId();
        $db_obj=$this->load->module("db_api");
        $qur="SELECT count(`friend_id_fk`)as cnt FROM `blog_users_connections` WHERE `friend_id_fk`=$uid and followed_via_module='ONENETWORK' and `read_or_not`='0' and `status`='PND'";
        $rlt= $db_obj->custom($qur);
        echo $rlt[0]['cnt'];
    }
	// function to display the desktop notifications by Pavani
    function pushNotifies(){
      $dbapi=$this->load->module("db_api");
      $stores_str=$this->getStoreStr();
      // store followers count
      $sfollow_result=$dbapi->custom("SELECT count(*) as cnt FROM oshop_followings WHERE store_id_fk IN ($stores_str)");
      // company follower count
      $coresult=$dbapi->custom("SELECT count(*) as cnt FROM co_notifications WHERE read_status='0' AND second_entity_id=".$this->getUserId()." AND type IN ('C_UC_COMPANY_FOLLOWED_BY_USER')");
      // netpro profile view count
      $np_result=$dbapi->custom("SELECT COUNT(*) AS cnt FROM netpro_profile_views WHERE user_id=".$this->getUserId());
      // CV bank noticed by employer
      $cvquery="SELECT count(*) as cnt FROM co_notifications WHERE read_status='0' AND second_entity_id=".$this->getUserId()." AND type IN ('U_UC_PROFILE_VIEWED_BY_COMPANY')";
      $cvresult=$dbapi->custom($cvquery);
      // store received new reviews
      //$store_reviews_query="SELECT COUNT(*) AS cnt FROM oshop_store_reviews WHERE store_id_fk IN ($stores_str)";
      $str_review_result=$dbapi->custom("SELECT COUNT(*) AS cnt FROM oshop_notifications WHERE type='STORE_REVIEW' AND status='0'");
      // product received new reviews
      $prod_review_result=$dbapi->custom("SELECT COUNT(*) AS cnt FROM oshop_notifications WHERE type='PRODUCT_REVIEW' AND status='0'");

      $notifies_arry=array("store_followers"=>0,"cooffice_followers"=>0,"np_profile_view"=>0,"cv_views_cnt"=>0,"store_reviews_cnt"=>0,"product_reviews_cnt"=>0,"msgs_cnt"=>0,"frnds_request_cnt"=>0,"notifications_cnt"=>0);
      $notifies_arry["frnds_request_cnt"]=$this->frndsRequestCnt();
      $notifies_arry["notifications_cnt"]=$this->pushNotifiesCnt();
      $notifies_arry["msgs_cnt"]=  $this->msgsReceivedCnt(); // messages received
      if($sfollow_result[0]["cnt"]!==0){
        $notifies_arry["store_followers"]=$sfollow_result[0]["cnt"];
      }
      if($coresult[0]["cnt"]!==0){
        $notifies_arry["cooffice_followers"]=$coresult[0]["cnt"];
      }
      if($np_result[0]["cnt"]!==0){
        $notifies_arry["np_profile_view"]=$np_result[0]["cnt"];
      }
      if($cvresult[0]["cnt"]!==0){
        $notifies_arry["cv_views_cnt"]=$cvresult[0]["cnt"];
      }
      if($str_review_result[0]["cnt"]!==0){
        $notifies_arry["store_reviews_cnt"]=$str_review_result[0]["cnt"];
      }
      if($prod_review_result[0]["cnt"]!==0){
        $notifies_arry["product_reviews_cnt"]=$prod_review_result[0]["cnt"];
      }
      //print_r($notifies_arry);
      echo json_encode($notifies_arry);
    }
    function getStoreStr(){
      $dbapi=$this->load->module("db_api");
      $stores_query="SELECT store_aid FROM oshop_stores WHERE created_by=".$this->getUserId();
      $stores_result=$dbapi->custom($stores_query);
      $stores_str="";
      foreach($stores_result as $sdata){
        if($stores_str===""){
          $stores_str=$sdata["store_aid"];
        }else{
          $stores_str.=",".$sdata["store_aid"];
        }
      }
      return $stores_str;
    }
    // fucntion to return messages count received to the loggedin user by Pavani
    function msgsReceivedCnt(){
      $dbapi=$this->load->module("db_api");
      $msgs_cnt=0;
      $pmsgs_query="SELECT COUNT(*) AS cnt FROM vcom_protalk WHERE receiver_id_fk=".$this->getUserId()." AND read_or_not='0'";
      $pmsgs_result=$dbapi->custom($pmsgs_query);
      //print_r($pmsgs_result);
      if($pmsgs_result!=0){
        $msgs_cnt+=$pmsgs_result[0]["cnt"];
      }
      $smsgs_query="SELECT COUNT(*) AS cnt FROM vcom_messages_soc WHERE receiver_id_fk=".$this->getUserId()." AND read_or_not='0'";
      $smsgs_result=$dbapi->custom($smsgs_query);
      if($smsgs_result!=0){
        $msgs_cnt+=$smsgs_result[0]["cnt"];
      }
      return $msgs_cnt;
    }
    // function to get the friend requests count of the loggedin user for desktop notification by Pavani
    function frndsRequestCnt(){
      $dbapi=$this->load->module("db_api");
      //$frnds_query="SELECT count(*) AS np_cnt,(SELECT COUNT(*) AS cnt FROM isn_user_followers WHERE user_id_fk=".$this->getUserId()." AND read_or_not=0) AS isn_frnds,(SELECT count(rec_aid) as dxcount FROM dx_connections WHERE my_id_fk=".$this->getUserId()." and request_status='PENDING' and read_or_not='0') AS dx_frnds,(SELECT count(`rec_aid`) as cnt FROM oshop_explore WHERE user_id_fk=".$this->user_id()." and read_or_not='0') AS oshop_frnds,(SELECT COUNT(rec_aid) AS co_count FROM blog_users_connections WHERE my_id_fk=".$this->getUserId()." AND followed_via_module='COFFICE') AS co_frnds,(SELECT COUNT(rec_aid) AS onet_count FROM blog_users_connections WHERE my_id_fk=".$this->getUserId()." AND followed_via_module='ONENETWORK') AS onet_frnds,(SELECT count(user_id_fk) as cnt FROM buzzin_followers WHERE user_id_fk=".$this->getUserId()." and read_or_not='0') AS buzzin_frnds,(SELECT COUNT(*) AS cnt FROM click_friends_requests WHERE readornot=0 AND user_id_fk=".$this->getUserId().") AS click_frnds,(SELECT count(rec_id) as scount FROM tunnel_followers WHERE iws_profile_id=".$this->getUserId()." and request='PEN' and read_or_not='0') AS tunnel_frnds,(SELECT COUNT(rec_aid) AS cvbank_cnt FROM cvbank_connection WHERE user_id_fk=".$this->getUserId()." AND read_or_not='0') AS cvbank_frnds FROM netpro_connection WHERE user_id_fk=".$this->getUserId()." and is_confirmed='Pending'";
      $frnds_query="SELECT count(*) AS np_cnt,(SELECT COUNT(rec_aid) AS co_count FROM blog_users_connections WHERE my_id_fk=".$this->getUserId()." AND followed_via_module='COFFICE') AS co_frnds,(SELECT count(user_id_fk) as cnt FROM buzzin_followers WHERE user_id_fk=".$this->getUserId()." and read_or_not='0') AS buzzin_frnds FROM netpro_connection WHERE user_id_fk=".$this->getUserId()." and is_confirmed='Pending'";
      $frds_query="SELECT count(`rec_aid`) as dx_frnds,(SELECT count(`rec_aid`) as cnt FROM oshop_explore WHERE user_id_fk=".$this->getUserId()." and read_or_not='0') AS oshop_frnds,(SELECT COUNT(*) AS cnt FROM isn_user_followers WHERE user_id_fk=".$this->getUserId()." AND read_or_not=0) AS isnews_frnds FROM `dx_connections` WHERE my_id_fk=".$this->getUserId()." and request_status='PENDING' and read_or_not='0'";
      $fquery="SELECT COUNT(rec_aid) AS onet_count,(SELECT COUNT(*) AS cnt FROM click_friends_requests WHERE readornot=0 AND user_id_fk=".$this->getUserId().") AS click_frnds,(SELECT count(rec_id) as scount FROM tunnel_followers WHERE iws_profile_id=".$this->getUserId()." and request='PEN' and read_or_not='0') AS tunnel_frnds,(SELECT COUNT(rec_aid) AS cvbank_cnt FROM cvbank_connection WHERE user_id_fk=".$this->getUserId()." AND read_or_not='0') AS cvbank_frnds FROM blog_users_connections WHERE my_id_fk=".$this->getUserId()." AND followed_via_module='ONENETWORK' AND status='PND' AND read_or_not='0'";
      $frnds_result=$dbapi->custom($frnds_query);
      $frds_result=$dbapi->custom($frds_query);
      $fresult=$dbapi->custom($fquery);
      $frnds_cnt=$frnds_result[0]["np_cnt"]+$frds_result[0]["isnews_frnds"]+$frds_result[0]["dx_frnds"]+$frds_result[0]["oshop_frnds"]+$frnds_result[0]["co_frnds"]+$fresult[0]["onet_count"]+$frnds_result[0]["buzzin_frnds"]+$fresult[0]["click_frnds"]+$fresult[0]["tunnel_frnds"]+$fresult[0]["cvbank_frnds"];
      return $frnds_cnt;
    }
    // function to get the notifications count of the loggedin user for desktop notification by Pavani
    function pushNotifiesCnt(){
      $dbapi=$this->load->module("db_api");
      $qury="SELECT count(*) as buzzin_cnt,(select count(rec_aid) as oshop_count from oshop_notifications where status='0' AND to_userid=" . $this->getUserId().") AS oshop_cnt FROM buzzin_notifications WHERE is_read=0 and to_userid=".$this->getUserId();
      $qry="SELECT count(*) as dx_cnt,(SELECT count(`second_entity_id`) as notificationcount FROM  co_notifications where type in('U_UC_INTERVIEW_SCHEDULED','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_PROFILE_VIEWED_BY_COMPANY','U_UC_NETPRO_PROFILE_ACCESS_REQUEST','U_UC_NETPRO_PROFILE_ACCESS_GIVEN','C_UC_NETPRO_PROFILE_ACCESS_APPROVED','U_UC_RESUME_DOWNLOADED_BY_COMPANY') and second_entity_id=".$this->getUserId()." and read_status='0') AS co_cnt FROM dx_notifications WHERE user_id_fk=".$this->getUserId()." AND status='0'";
      $query="SELECT count(*) as isnews_cnt,(SELECT count(*) as cnt FROM click_notifications WHERE user_id=".$this->getUserId()." and type IN ('INVITATION_FOR_EVENT','LIKED_YOUR_POST','SHARED_YOUR_POST','INVITATION_RCVD_TO_LIKE_PAGE','POST_IN_YOUR_PAGE','COMMENTED_ON_EVENT_POST','POST_FOR_YOUR_EVENT','NEW_REQUEST_RCVD_TO_JOIN_GROUP','FRIENDS_BIRTHDAY','COMMENTED_ON_GROUP_POST','COMMENTED_ON_PAGE_POST','COMMENTED_ON_YOUR_POST','LIKED_PAGE_POST','LIKED_GROUP_POST') and is_read=0) AS click_cnt,(SELECT count(rec_id) FROM tunnel_notification WHERE read_or_not='0' and user_id_fk=".$this->getUserId().") AS tunnel_cnt,(select count(*) as count from netpro_notification where user_id_fk=".$this->getUserId()." AND status=0) AS np_cnt,(SELECT count(`second_entity_id`) as notificationcount FROM `co_notifications` WHERE `second_entity_id`= ".$this->getUserId()." and `type` in('U_UC_RESUME_DOWNLOADED_BY_COMPANY','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_PROFILE_VIEWED_BY_COMPANY') and `read_status`='0') AS cvbank_cnt FROM isn_notifications WHERE status='0' AND user_id_fk=".$this->getUserId()." AND type IN ('FAKED_NEWS_VOTE','GOOD_NEWS_VOTE','SAD_NEWS_VOTE','HEART_NEWS_VOTE','SUBSCRIBE_CHANNEL_VOTE')";
      //(SELECT count(*) as cnt FROM dx_notifications WHERE user_id_fk=".$this->getUserId()." AND status='0') AS dx_cnt,(SELECT count(`second_entity_id`) as notificationcount FROM  co_notifications where type in('U_UC_INTERVIEW_SCHEDULED','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_PROFILE_VIEWED_BY_COMPANY','U_UC_NETPRO_PROFILE_ACCESS_REQUEST','U_UC_NETPRO_PROFILE_ACCESS_GIVEN','C_UC_NETPRO_PROFILE_ACCESS_APPROVED','U_UC_RESUME_DOWNLOADED_BY_COMPANY') and second_entity_id=".$this->getUserId()." and read_status='0') AS co_cnt,(SELECT count(*) as cnt FROM isn_notifications WHERE status='0' AND user_id_fk=".$this->getUserId()." AND type IN ('FAKED_NEWS_VOTE','GOOD_NEWS_VOTE','SAD_NEWS_VOTE','HEART_NEWS_VOTE','SUBSCRIBE_CHANNEL_VOTE')) AS isnews_cnt,(SELECT count(`second_entity_id`) as notificationcount FROM `co_notifications` WHERE `second_entity_id`= ".$this->getUserId()." and `type` in('U_UC_RESUME_DOWNLOADED_BY_COMPANY','U_UC_PROFILE_SHORTLISTED_BY_COMPANY','U_UC_PROFILE_VIEWED_BY_COMPANY') and `read_status`='0') AS cvbank_cnt,(SELECT count(rec_aid) FROM tunnel_notification WHERE read_or_not='0' and user_id_fk=".$this->getUserId().") AS tunnel_cnt,(SELECT count(*) as cnt FROM click_notifications WHERE user_id=".$this->getUserId()." and type IN ('INVITATION_FOR_EVENT','LIKED_YOUR_POST','SHARED_YOUR_POST','INVITATION_RCVD_TO_LIKE_PAGE','POST_IN_YOUR_PAGE','COMMENTED_ON_EVENT_POST','POST_FOR_YOUR_EVENT','NEW_REQUEST_RCVD_TO_JOIN_GROUP','FRIENDS_BIRTHDAY','COMMENTED_ON_GROUP_POST','COMMENTED_ON_PAGE_POST','COMMENTED_ON_YOUR_POST','LIKED_PAGE_POST','LIKED_GROUP_POST') and is_read=0) AS click_cnt,(select count(*) as count from netpro_notification where user_id_fk=".$this->getUserId()." AND status=0) AS np_cnt
      $result=$dbapi->custom($qury);
      $rslt=$dbapi->custom($qry);
      $rlt=$dbapi->custom($query);
      $notifies_cnt=$result[0]["buzzin_cnt"]+$result[0]["oshop_cnt"]+$rslt[0]["dx_cnt"]+$rslt[0]["co_cnt"]+$rlt[0]["isnews_cnt"]+$rlt[0]["click_cnt"]+$rlt[0]["tunnel_cnt"]+$rlt[0]["np_cnt"]+$rlt[0]["cvbank_cnt"];
      return $notifies_cnt;
    }
}
