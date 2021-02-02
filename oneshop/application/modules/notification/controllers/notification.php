<?php
if (!defined('BASEPATH'))     exit('No direct script access allowed');

class notification extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('db_api');
    }

    function get_UserId() {
        $cookies_obj = $this->load->module("cookies");
        $user_id = $cookies_obj->getUserID();
        return $user_id;
    }
    function insert_notification($storeid,$entity_id,$product) {
            $db_obj = $this->load->module("db_api");
            $user_id = $this->get_UserId();
            $store_query="SELECT * FROM oshop_stores stores INNER JOIN oshop_products prod ON prod.store_id_fk = stores.store_aid WHERE store_aid=".$storeid;
            $store_details=$db_obj->custom($store_query);
            $current_url = "product_detail_view/".$store_details[0]['store_code']."/".$store_details[0]["product_code"];
            $notification_text = $store_details[0]['store_name'].' Added New Product <b>'.$product.'</b></a>';
            $mytable = "oshop_notifications";
            $frnds_result=$db_obj->select("user_id_fk","oshop_followings","store_id_fk=".$storeid);
            $frnds_str="";
            if($frnds_result!==0){
                foreach($frnds_result as $flist){
                    if($frnds_str==""){
                    $a_data = array(
                            "type" => "ADMIN_PRODUCT_ADDED",
                            "from_userid" => $user_id,
                            "to_userid" => $flist["user_id_fk"],
                            "entity_id" => $entity_id,
                            "store_code" => $store_details[0]['store_code'],
                            "url" => $current_url,
                            "msg" => $notification_text,
                    );
                    // $frnds_str.=$flist["user_id_fk"];
                    $rlt = $db_obj->insert($a_data, $mytable);
                  }
                }
            }

            // echo var_dump($a_data);
            // $insertqry = "";
    }

    function all_notification($type,$product_id,$order_id,$store_id,$status){
        if($type=="BUY"){
            $this->buy_notification($product_id);
        }else if($type=="STORE_REPORT"){
            $this->store_report($store_id);
        }else if($type=="ORDER_CHANGE"){
            $this->order_change_notify($order_id,$status);
        }else if($type=="USER_ORDER_CANCEL"){
            $this->uorder_cancel_notify($product_id,$order_id);
        }else if($type=="STORE_REVIEW"){
            $this->store_review_notify($store_id);
        }else if($type=="PRODUCT_REVIEW"){
            $this->product_review_notify($product_id);
        }else if($type=="PRODUCT_RATING"){
            $this->product_rating_notify($product_id);
        }else if($type=="STORE_RATING"){
            $this->store_rating_notify($store_id);
        }else if($type=="STORE_MESSAGES"){
            $this->store_messages($order_id,$store_id,$status);
        }
    }

    function store_messages($order_id,$store_id,$status){

        $dbapi=$this->load->module("db_api");
        $store_query="SELECT user_id_fk,store_name,store_code,store_aid,created_by FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk WHERE store_code='".$store_id."'";
        $store_details=$dbapi->custom($store_query); 
        $user_details=$dbapi->select("profile_name","os_user_details","profile_id_fk=".$this->get_UserId());
        $user_fullname=$user_details[0]["profile_name"];
        if($status == "store"){
            $su_url="home/getUserMessages";
            $msg='You received a message from <b>'.$store_details[0]["store_name"].'</b>. Click Here to <b> See Message</b>'; 
            foreach($store_details as $srows){            
                $a_fields=array("type"=>"STORE_MESSAGES","to_userid"=>$order_id,"from_userid"=>$srows["created_by"],"entity_id"=>$store_details[0]["store_aid"],"store_code"=>$store_details[0]["store_code"],"url"=>$su_url,"msg"=>$msg);
                $dbapi->insert($a_fields,"oshop_notifications");
            }
        }
        else{
            $su_url= "storemessages/".$store_id;
            $msg='You received a message from <b>'.$user_fullname.'</b>. To Your Store <b>'.$store_details[0]["store_name"].'</b> Click Here to See Message</b>'; 
            foreach($store_details as $srows){            
                $a_fields=array("type"=>"STORE_MESSAGES","to_userid"=>$srows["created_by"],"from_userid"=>$this->get_UserId(),"entity_id"=>$store_details[0]["store_aid"],"store_code"=>$store_details[0]["store_code"],"url"=>$su_url,"msg"=>$msg);
                $dbapi->insert($a_fields,"oshop_notifications");
            }
        }
                
        
    }
   
    // function for order notification to the user by Pavani on 15-02-2016
    function buy_notification($product_id){
        $dbapi=$this->load->module("db_api");
        //$query="SELECT created_by,store_code,product_name,product_code,primary_image,profile_image_path,store_aid,prods.product_aid FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE prods.product_aid=".$product_id;
        $query="SELECT product_code,role,user_id_fk,created_by,store_code,product_name,product_code,primary_image,profile_image_path,store_aid,prods.product_aid FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk WHERE prods.product_aid=".$product_id;
        $store_details=$dbapi->custom($query);
        $user_details=$dbapi->select("first_name,last_name,username,img_path","iws_profiles","profile_id=".$this->get_UserId());
        $user_name=$user_details[0]["first_name"]." ".$user_details[0]["last_name"];
        $product_url="product_detail_view/".$store_details[0]["store_code"]."/".$store_details[0]["product_code"];
        $product_img_url="stores/".$store_details[0]["store_code"]."/products/".$store_details[0]["product_aid"]."/si/".$store_details[0]["primary_image"];
        $msg='Received an order from <b>'.$user_name.'</b></a>';
        $store_aid="";
        $store_owner_id=$store_details[0]["created_by"];
        foreach($store_details as $srows){
            $store_aid=$srows[0]["store_aid"];
            $a_fields=array("type"=>"ORDER_PLACED","entity_id"=>$store_details[0]["store_aid"],"from_userid"=>$this->get_UserId(),"to_userid"=>$srows["user_id_fk"],"url"=>$product_url,"img_url"=>$product_img_url,"store_id_fk"=>$store_details[0]["store_aid"],"msg"=>$msg,"store_id_fk"=>$store_details[0]["store_aid"]);
            $dbapi->insert($a_fields,"oshop_notifications");
        }
        $user_msg='You ordered an item <b>'.$store_details[0]["product_name"].'</b>';
        $user_fields=array("type"=>"ORDER_PLACED","url"=>$product_url,"img_url"=>$product_img_url,"store_id_fk"=>$store_aid,"msg"=>$user_msg,"to_userid"=>  $this->get_UserId(),"from_userid"=>$store_owner_id);
        $dbapi->insert($user_fields,"oshop_notifications");        
    }
    function order_change_notify($order_id,$status){
        $dbapi=$this->load->module("db_api");
        $query="SELECT order_aid,order_code,first_name,last_name,img_path,ordered_by FROM oshop_orders orders INNER JOIN iws_profiles profiles ON orders.ordered_by=profiles.profile_id WHERE orders.order_aid=".$order_id;
        $order_details=$dbapi->custom($query);
        $order_url="order_view?order_id=".  base64_encode(base64_encode($order_details[0]["order_code"]));
        $msg='Your order ID <b>'.$order_details[0]["order_code"].'</b> status is:'.$status;        
        $a_fields=array("type"=>"ORDER_STATUS","from_userid"=>$this->get_UserId(),"to_userid"=>$order_details[0]["ordered_by"],"status"=>0,"url"=>$order_url,"entity_id"=>$order_id,"msg"=>$msg);
        $result=$dbapi->insert($a_fields,"oshop_notifications");
    }
    function store_report($store_id){
        $dbapi=$this->load->module("db_api");
        $store_query="SELECT user_id_fk,store_name,store_code,store_aid,created_by FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk WHERE store_aid=".$store_id;
        $store_details=$dbapi->custom($store_query);
//        $user_details=$dbapi->select("first_name,last_name,username,img_path","iws_profiles","profile_id=".$this->get_UserId());        
//        $user_fullname=$user_details[0]["first_name"]." ".$user_details[0]["last_name"];
        $user_details=$dbapi->select("profile_name,profile_img,profile_id_fk","os_user_details","profile_id_fk=".$this->get_UserId());
        $user_fullname=$user_details[0]["profile_name"];
        $profile_url="assets/images/";
        $img_name="avatar.png";
        if($user_details[0]["img_path"]!=""){
            $profile_url="data/profile/si/";
            $img_name=$user_details[0]["profile_img"];
        }       
        // $store_url="store_home/".$store_details[0]["store_code"];
        $store_url='https://tszmail.oneidnet.com/';
        //$store_msg="<a href='".$store_url."'>You received a report from <b>".$user_fullname."</b> to ".$store_name."</a>";
        $msg='You received a report from <b>'.$user_fullname.'</b> to Your store <b>'.$store_details[0]["store_name"].'</b> Check Your 360 mail</a>'; 
                
        foreach($store_details as $srows){            
            $a_fields=array("type"=>"STORE_REPORTED","to_userid"=>$srows["user_id_fk"],"from_userid"=>$this->get_UserId(),"entity_id"=>$store_details[0]["store_aid"],"store_code"=>$store_details[0]["store_code"],"img_url"=>$profile_url,"url"=>$store_url,"msg"=>$msg,"img_name"=>$img_name);
            $dbapi->insert($a_fields,"oshop_notifications");
        }
        
    }

    // in case customer cancel an order
    function uorder_cancel_notify($product_id,$order_id){
        $dbapi=$this->load->module("db_api");
        $order_details=$dbapi->custom("SELECT product_aid,product_name,added_by,order_code,order_id_fk,prods.store_id_fk FROM oshop_products prods INNER JOIN oshop_order_items oitems ON prods.product_aid=oitems.product_id_fk INNER JOIN oshop_orders orders ON oitems.order_id_fk=orders.order_aid WHERE oitems.order_id_fk=".$order_id);
        $order_url="order_view?order_id=".  base64_encode(base64_encode($order_details[0]["order_code"]));      
        $staff_ids="";
        $store_aid=$order_details[0]["store_id_fk"];
        $store_details=$dbapi->select("user_id_fk","oshop_staff","store_id_fk=".$store_aid);
        foreach($store_details as $srows){
            if($staff_ids==""){
                $staff_ids.=$srows["user_id_fk"];
            }else{
                $staff_ids.=",".$srows["user_id_fk"];
            }
        }
        $user_details=$dbapi->select("first_name,last_name,img_path","iws_profiles","profile_id=".$this->get_UserId());
        $user_fullname=$user_details[0]["first_name"]." ".$user_details[0]["last_name"];
        $user_msg='You cancelled an item <b>'.$order_details[0]["product_name"].'</b>';
        $store_msg='Order has been cancelled by <b>'.$user_fullname.'</b>';
        //$msg='<a href="'.$product_url.'>You have cancelled an item <b>'.$product_details[0]["product_name"].'</b></a>"';
        $a_fields=array("from_userid"=>$this->get_UserId(),"type"=>"ORDER_CANCEL","to_userid"=>$staff_ids,"url"=>$order_url,"entity_id"=>$product_id,"user_msg"=>$user_msg,"store_msg"=>$store_msg,"store_id_fk"=>$store_aid);
        $dbapi->insert($a_fields,"oshop_notifications");
    }
    // function for store review notification
    function store_review_notify($store_id){
        $dbapi=$this->load->module("db_api");
        $userId =$this->get_UserId();
        $store_details=$dbapi->select("created_by,store_code","oshop_stores","store_aid=".$store_id);
        $a_fields=array("type"=>"STORE_REVIEW","from_userid"=>$userId,"to_userid"=>$store_details[0]["created_by"],"store_code"=>$store_details[0]["store_code"],"entity_id"=>$store_id);
        $dbapi->insert($a_fields,"oshop_notifications");
    }
    // function for product review notification
    function product_review_notify($product_id){
        $dbapi=$this->load->module("db_api");
        $userId =$this->get_UserId();
        $product_details=$dbapi->custom("SELECT   created_by,store_code  FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_aid=".$product_id); 
        $a_fields=array("type"=>"PRODUCT_REVIEW","from_userid"=>$userId,"to_userid"=>$product_details[0]["created_by"],"entity_id"=>$product_id,"store_code"=>$product_details[0]["store_code"]);
        $dbapi->insert($a_fields,"oshop_notifications");
    }
    function product_rating_notify($product_id){
        $dbapi=$this->load->module("db_api");
        $userId =$this->get_UserId();
        $product_details=$dbapi->custom("SELECT  created_by,store_code  FROM oshop_products prods INNER JOIN oshop_stores stores ON prods.store_id_fk=stores.store_aid WHERE product_aid=".$product_id); 
        $a_fields=array("type"=>"PRODUCT_RATING","from_userid"=>$userId,"to_userid"=>$$product_details[0]["created_by"],"entity_id"=>$product_id,"store_code"=>$product_details[0]["store_code"]);
            //print_r($a_fields);
            $dbapi->insert($a_fields,"oshop_notifications");
       
         
    }
    function store_rating_notify($store_id){
        $dbapi=$this->load->module("db_api");
        $user_id=$this->get_UserId();
        $store_query="SELECT created_by,store_code FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk WHERE store_aid=".$store_id;
        $store_details=$dbapi->custom($store_query);
        $user_fields=array("type"=>"STORE_RATING","store_code"=>$store_details[0]["store_code"],"entity_id"=>$store_id,"to_userid"=>  $store_details[0]["created_by"],"from_userid"=>$user_id);
        $dbapi->insert($user_fields,"oshop_notifications"); 
    }
    // function to display the notification to the user
    function get_user_notification1(){
        $dbapi=$this->load->module("db_api");
        $s_where="status='0'";
        $result=$dbapi->custom("select store_code,store_aid,role FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk where user_id_fk=".$this->get_UserId());
        $user_type="end_user";
        $store_id_str="";
        foreach($result as $rows){
            if($store_id_str==""){
                $store_id_str.=$rows["store_aid"];
            }else{
                $store_id_str.=",".$rows["store_aid"];
            }
        }
        if($result[0]["role"]!=""){
            $user_type=$result[0]["role"];
            if($user_type=="ORDER_MANAGER"){
                $s_where.=" AND ( to_userid=".$this->get_UserId()." OR type IN ('ORDER_CANCEL','ORDER_PLACED')) AND store_id_fk IN (".$store_id_str.")";
            }else if($user_type=="SUPER"){
                $s_where.=" AND (store_id_fk IN (".$store_id_str.") OR to_userid=".$this->get_UserId().")";
            }else if($user_type=="ADMIN"){
                $s_where.=" AND (store_id_fk IN (".$store_id_str.") OR to_userid=".$this->get_UserId().")";
            }
        }
        $s_where.=" ORDER BY activity_time DESC LIMIT 10";        
        //$s_where="status='0' AND (to_userid=".$this->get_UserId()." OR type IN ('ORDER_CANCEL','ORDER_PLACED')) ORDER BY activity_time DESC LIMIT 10";
        //$notify_result=$dbapi->select("*","oshop_notifications",$s_where);
        //echo "SELECT type,from_userid,store_id_fk,to_userid,profiles.first_name,profiles.last_name,profiles.img_path FROM oshop_notifications notify INNER JOIN iws_profiles profiles ON notify.from_userid=profiles.profile_id WHERE ".$s_where;
        $notify_result=$dbapi->custom("SELECT type,from_userid,store_id_fk,url,img_url,to_userid,profiles.first_name,profiles.last_name,profiles.img_path FROM oshop_notifications notify INNER JOIN iws_profiles profiles ON notify.from_userid=profiles.profile_id WHERE ".$s_where);
        $this->getNotifications($notify_result);
        $data["user_notifications"]=$notify_result;
        $data["user_type"]=$user_type;
        $data["loggedin_user"]=$this->get_UserId();
        $this->load->view("notification/user_notifications",$data);
    }
    function get_user_notification(){
        
        $dbapi=$this->load->module("db_api");
        $userid=$this->get_UserId();
        // $query="SELECT * FROM oshop_notifications WHERE to_userid IN (".$userid.") ORDER BY activity_time DESC LIMIT 20";
        $query="SELECT osn . * , oud.profile_name,oud.profile_img,os.store_name ,os.profile_image_path ,op.product_code,op.primary_image ,op.product_name
		FROM oshop_notifications AS osn
		LEFT JOIN os_user_details as  oud ON oud.profile_id_fk = osn.from_userid
		LEFT JOIN iws_profiles ip ON to_userid = ip.profile_id
		LEFT JOIN oshop_stores AS os ON os.store_aid = osn.entity_id AND osn.type='STORE_REVIEW' or osn.type='STORE_RATING'
		LEFT JOIN oshop_products AS op ON op.product_aid = osn.entity_id AND osn.type='PRODUCT_REVIEW' or osn.type='PRODUCT_RATING'
		WHERE osn.to_userid =".$userid." ORDER BY activity_time DESC LIMIT 20";
        // echo $query;
        $notify_result=$dbapi->custom($query);
        if($_REQUEST["oneshopntfcount"]!=""){
        $dbapi->custom("UPDATE oshop_notifications SET status='1' WHERE to_userid=".$userid);
        }
        
        $data["user_notifications"]=$notify_result;
        $data["loggedin_user"]=$this->get_UserId();
        $this->load->view("notification/user_notifications",$data);
    }
    function getStoreStaffDetails($store_id){
        $dbapi=$this->load->module("db_api");
        $query="SELECT user_id_fk,store_aid FROM oshop_stores stores INNER JOIN oshop_staff staff ON stores.store_aid=staff.store_id_fk WHERE store_aid=".$store_id;
        $result=$dbapi->custom($query);
        $staff_str="";
        foreach($result as $rows){
            if($staff_str==""){
                $staff_str=$rows["user_id_fk"];
            }else{
                $staff_str.=",".$rows["user_id_fk"];
            }
        }
        return $staff_str;
    }
    function getLoggedinUserDetails(){
        $dbapi=$this->load->module("db_api");        
        $result=$dbapi->select("first_name,last_name,img_path","iws_profiles","profile_id=".$this->get_UserId());
        //print_r($result);
        return $result;
    }
}
