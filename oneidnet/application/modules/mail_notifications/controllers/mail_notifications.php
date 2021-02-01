<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail_notifications extends CI_Controller {
    
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
    function index() {         
    }
    
        function notificationsCount(){
            $count=0;
            $events=$this->newevents();
            $meetings=$this->newmeetings();
            $mails=$this->getNewMails();
           if($events=="No Events"){
               $count+=0;
           }
           else{
               $count+=explode(" ",$events)[0];
           }
           if($meetings=="No Meetings"){
               $count+=0;
           }else{
               $count+=explode(" ",$meetings)[0];
           }
           if($mails=="No"){
               $count+=0;
           }else{
               $count+=$mails;
           }
           echo $count;
        }
	function newevents(){
		$onedev_dbnoti_object = $this->load->module('db_api');
                $bean = $this->load->module('cookies');
                $userid = $bean->getUserID();
                $events = $onedev_dbnoti_object->select("events_aid","tsz_events","created_by=$userid AND event_date = CURDATE()");
               if($events == 0){
                  return "No Events"; 
               }else{
                return count($events)." New events";
               }
	}
        function newmeetings(){
		$onedev_dbnoti_object = $this->load->module('db_api');
                $bean = $this->load->module('cookies');
                $userid =   $bean->getUserID();
                $meetings = $onedev_dbnoti_object->select("rec_aid","tsz_meetings","created_by=$userid AND (DATE_FORMAT(meeting_time, '%Y-%m-%d') = CURDATE())");
               if($meetings == 0){
                   return "No Meetings";
               }else{
                   return count($meetings)." New Meetings";
               }
	}
    function emNotifsGet(){      
        $onedev_dbnoti_object = $this->load->module('db_api');
        $bean = $this->load->module('cookies');
        $userid =   $bean->getUserID();
         $meetings = $onedev_dbnoti_object->select("meeting_subject","tsz_meetings","created_by=$userid AND (DATE_FORMAT(meeting_time, '%Y-%m-%d') = CURDATE()) ORDER BY meeting_time desc limit 3");
	foreach($meetings as $res){
		$arr[] = $res[0];
	}       
	$newmeetings=implode(", ", $arr);
	if($meetings == 0){
	$newmeetings = "No Meetings";
	}else{
	$new_meetings = $newmeetings;
	}
	$events = $onedev_dbnoti_object->select("event_type","tsz_events","created_by=$userid AND event_date = CURDATE() ORDER BY event_date desc limit 3");

	foreach($events as $res){
		$eventsarr[] = $res[0];
	}       
	$newevents=implode(", ", $eventsarr);
	if($events==0){
		$new_events = "No events";
	}else{
		$new_events = $newevents;	
	}
        echo "Latest Meetings: ".$new_meetings." ----- Latest Events: ".$new_events;
           }
	function getNewMails(){
		$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}';
		$username = "weldoneindia123@gmail.com";
		$password = "weldone123";
		$inbox = $hostname.'INBOX';
		$mbox = imap_open($inbox, $username, $password)or die('Cannot connect to Gmail: ' . imap_last_error());
		$recent_emails = imap_search($mbox, 'UNSEEN');

		if ($recent_emails)
		{
		   return count($recent_emails);
		}
		else
		{
		   return "No";
		}
		imap_close($inbox); 
	}
}
