<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class myaccount  extends CI_Controller {

    function __construct() {
        session_start();
        parent::__construct();
        $modulesArray = array('db_api', 'memcaching', 'cookies', 'sessions');
        $this->wrapperinit->loadModules($modulesArray);
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

   
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "&#39;", $data);
        return $data;
    }

    function user_id() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function myaccountdetails(){
		$data['is_oneidnet_myaccounttab_active']="Yes";
		/* $shed_count='';
         $result =  $this->db_api->custom("select x,y from test");
         foreach($result as $res){
	     $shed_count.= " { type: 'line', dataPoints: [{ x: ".$res['x'].", y:".$res['y']." } ]},";
           // $shed_count.="{ x: ".$res['x'].", y:".$res['y']." },";
         }
         
         $data['shed_query']=$shed_count;
         $data['cardcount']=3;*/
        $query = "select user_id_fk ,
   
       sum(case when usage_purpose = 'PERSONAL' then 1 else 0 end ) personalcard,
       sum(case when usage_purpose = 'GOVERNMENTAL' then 1 else 0 end ) govermentcard,
       sum(case when usage_purpose = 'OFFSHORE' then 1 else 0 end ) offshorecard,
       sum(case when usage_purpose = 'NATIONAL' then 1 else 0 end ) nationalcard,
       sum(case when usage_purpose = 'INTERNATIONAL' then 1 else 0 end ) internationalcard,
       sum(case when usage_purpose = 'BUSINESS' then 1 else 0 end ) businesscard
       
       from `pb_cards`
       where  user_id_fk=".$this->user_id();
         $data['cardsdata']= $this->db_api->custom( $query);
         
        // $sql = "SELECT * FROM `pb_transactions` as pt 
		//left join `pb_cards` as pc  on pc.card_id=pt.from_account  where  pt.sender_id_fk=".$this->user_id() ." and  pt.status !='OTHER_REASONS_FAILURES' order by transaction_time desc";
		$sql = "SELECT  pt.transaction_aid ,pt.amount ,pt.transaction_time,pc.card_name ,iw.first_name,iw.middle_name,iw.last_name  FROM `pb_transactions` as pt 
		left join `pb_cards` as pc  on pc.card_id=pt.from_account  
        left join  iws_profiles as iw on iw.profile_id = pt.receiver_id_fk 
where  pt.sender_id_fk=".$this->user_id() ." and  pt.status !='OTHER_REASONS_FAILURES' order by transaction_time desc";
		
		$data['transactiondata']= $this->db_api->custom( $sql);
		//$failsql = "SELECT * FROM `pb_transactions` as pt 
		//left join `pb_cards` as pc  on pc.card_id=pt.from_account  where  pt.sender_id_fk=".$this->user_id()." and  pt.status ='OTHER_REASONS_FAILURES' order by transaction_time desc";
		$failsql = "SELECT  pt.transaction_aid ,pt.amount ,pt.transaction_time,pc.card_name ,iw.first_name,iw.middle_name,iw.last_name  FROM `pb_transactions` as pt 
		left join `pb_cards` as pc  on pc.card_id=pt.from_account  
        left join  iws_profiles as iw on iw.profile_id = pt.receiver_id_fk 
where  pt.sender_id_fk=".$this->user_id() ." and  pt.status ='OTHER_REASONS_FAILURES' order by transaction_time desc";
		
		$data['failuredata']= $this->db_api->custom( $failsql);
				 
         $this->load->view("myaccount",$data);

  }
  function mycarddetails(){
	  $data['is_oneidnet_cardstab_active']="Yes";
	 $this->load->view("mycards",$data);

	}
	function cardsdata(){
			
	  $sql = ' SELECT * FROM `pb_cards` where user_id_fk='.$this->user_id();
	  $data['cardsdata']= $this->db_api->custom( $sql);
		
	 $this->load->view("cardsdata",$data);

	}
//shivajyothi :validation for add cards 
	function validation($data){
		$errordata=array();
		$error =0;
		if( $data['card_number']!=''){
		$expr = '/^[1-9][0-9]*$/';
        if (!(preg_match($expr, $data['card_number']) && filter_var($data['card_number'], FILTER_VALIDATE_INT))) {
         
           $errordata['card_numberadd']='card_numberadd';
            }
		}else{
		 $errordata['card_numberadd']='card_numberadd';
           	
			
		}
		
		 if($data['cvv_number']!=''){
          if(!(preg_match ('/^[0-9]*$/', $data['cvv_number']))){
			 
			 $errordata['card_cvvadd']='card_cvvadd'; 
			   }
		   }else{
			 $errordata['card_cvvadd']='card_cvvadd'; 
			   
			}
			 if($data['card_name']==''){
				$errordata['card_nameadd']='card_nameadd'; 
			  }
			  if($data['expiry_month']==''){
				$errordata['card_expirymonthadd']='card_expirymonthadd'; 
			  }
			  if($data['expiry_year']==''){
				$errordata['card_expiryyearadd']='card_expiryyearadd'; 
			  }
			   if($data['usage_purpose']==''){
				$errordata['card_useadd']='card_useadd'; 
			  }
			  if($data['usage_scope']==''){
				$errordata['card_usageadd']='card_usageadd'; 
			  }
			  if($data['card_type']==''){
				$errordata['card_typeadd']='card_typeadd'; 
			  }
			
			return $errordata; 
			 
	}
//shivajyothi :validation for update cards 
	function validationupdate($data){
		$errordata=array();
		$error =0;
		if( $data['card_number']!=''){
		$expr = '/^[1-9][0-9]*$/';
        if (!(preg_match($expr, $data['card_number']) && filter_var($data['card_number'], FILTER_VALIDATE_INT))) {
         
           $errordata['card_number']='card_number';
            }
		}else{
		 $errordata['card_number']='card_number';
           	
			
		}
		
		 if($data['cvv_number']!=''){
          if(!(preg_match ('/^[0-9]*$/', $data['cvv_number']))){
			 
			 $errordata['card_cvv']='card_cvv'; 
			   }
		   }else{
			 $errordata['card_cvv']='card_cvv'; 
			   
			}
			 if($data['card_name']==''){
				$errordata['card_name']='card_name'; 
			  }
			  if($data['expiry_month']==''){
				$errordata['card_expirymonth']='card_expirymonth'; 
			  }
			  if($data['expiry_year']==''){
				$errordata['card_expiryyear']='card_expiryyear'; 
			  }
			   if($data['usage_purpose']==''){
				$errordata['card_use']='card_use'; 
			  }
			  if($data['usage_scope']==''){
				$errordata['card_usage']='card_usage'; 
			  }
			  if($data['card_type']==''){
				$errordata['card_type']='card_type'; 
			  }
			
			return $errordata; 
			 
	}
//shivajyothi :update cards 
	function cardssave(){
		 $cardid = $_REQUEST['cardid'];
		 $name_oncard = $_REQUEST['name_oncard'];
		 $card_number =$_REQUEST['card_number'];
		 $card_name =$_REQUEST['card_name'];
		 $card_cvv =$_REQUEST['card_cvv'];
		 $card_expirymonth=$_REQUEST['card_expirymonth'];
		 $card_expiryyear=$_REQUEST['card_expiryyear'];
		 $card_use =$_REQUEST['card_use'];
		 $card_type=$_REQUEST['card_type'];
		 $card_usage=$_REQUEST['card_usage'];
		 $data=array('usage_purpose'=>$card_use,
		             'usage_scope'=>$card_usage,
		              'card_type'=>$card_type,
		             'card_name'=>$card_name,
		             'cvv_number'=>$card_cvv,
		             'card_number'=>$card_number,
		             'name_as_on_card'=>$name_oncard,
		             'expiry_month'=>$card_expirymonth,
		             'expiry_year'=>$card_expiryyear);
		              foreach ($data as $key => $val) {
            $data[$key] = $this->test_input($data[$key]);
        }
        $errorresult =  $this->validationupdate($data) ;
		if(count($errorresult)==0){
                 $condition ="  card_id=".$cardid;
		         $result= $this->db_api->update($data,"pb_cards",$condition);
	             if($result){ $this->cardsdata();  }
	    }else{
		  echo json_encode($errorresult) ;
		}
}
//shivajyothi :add cards
function newcardsadd(){
		 $name_oncard = $_REQUEST['name_oncard'];
		 $card_number =$_REQUEST['card_number'];
		 $card_name =$_REQUEST['card_name'];
		 $card_cvv =$_REQUEST['card_cvv'];
		 $card_expirymonth=$_REQUEST['card_expirymonth'];
		 $card_expiryyear=$_REQUEST['card_expiryyear'];
		 $card_use =$_REQUEST['card_use'];
		 $card_type=$_REQUEST['card_type'];
		 $card_usage=$_REQUEST['card_usage'];
		 $data=array('usage_purpose'=>$card_use,
		             'usage_scope'=>$card_usage,
		              'card_type'=>$card_type,
		             'card_name'=>$card_name,
		             'cvv_number'=>$card_cvv,
		             'card_number'=>$card_number,
		             'name_as_on_card'=>$name_oncard,
		             'expiry_month'=>$card_expirymonth,
		             'expiry_year'=>$card_expiryyear);
		              foreach ($data as $key => $val) {
            $data[$key] = $this->test_input($data[$key]);
        }
       $errorresult =  $this->validation($data) ;
		if(count($errorresult)==0){
        
		    
				 $data['user_id_fk']=$this->user_id() ;
			     $result= $this->db_api->insert($data,"pb_cards");
	             if($result){ $this->cardsdata();  }
	    }else{
		   echo json_encode($errorresult) ;
		}
}
			function cardsdelete(){
				 $cardid = $_REQUEST['cardid'];
				 $condition ="  card_id=".$cardid;
		         $result = $this->db_api->delete("pb_cards",$condition);
		         if($result){ $this->cardsdata();  }
	
		}
	function cardsdetail(){
		
		 $cardid = $_REQUEST['cardid'];
	     $sql = ' SELECT * FROM `pb_cards` where card_id='.$cardid;
	     $data['carddata']= $this->db_api->custom( $sql);
	
		 $this->load->view("cards_v",$data);

		}
	function pendingtransactions(){
			$data['is_oneidnet_pentranstab_active']="Yes";
	
	 $this->load->view("pending_transaction",$data);

	}
	function transactionhistory(){
	 $data['is_oneidnet_transhistory_active']="Yes";
		
	 $this->load->view("transaction_history", $data);

	}
	function transactionhistory_v(){
		 $sql = "SELECT  pt.transaction_aid ,pt.amount ,pt.transaction_time,pc.card_name ,iw.first_name,iw.middle_name,iw.last_name  FROM `pb_transactions` as pt 
		left join `pb_cards` as pc  on pc.card_id=pt.from_account  
        left join  iws_profiles as iw on iw.profile_id = pt.receiver_id_fk 
        where  pt.sender_id_fk=".$this->user_id() ."  order by transaction_time desc";
		$data['transactiondata']= $this->db_api->custom( $sql);
	    $this->load->view("transactionhistory_v",$data);

	}
	
  function transactiondetail(){
	  
	   $transactionid = $_REQUEST['transactionid'];
	   $sql="SELECT pt.transaction_code , pt.amount ,pt.module,pt.transaction_time,pt.status,pt.payment_type,pc.card_name,pc.card_type ,iw.first_name,iw.middle_name,iw.last_name  FROM `pb_transactions` as pt 
		left join `pb_cards` as pc  on pc.card_id=pt.from_account  
        left join  iws_profiles as iw on iw.profile_id = pt.receiver_id_fk 
        where  pt.transaction_aid= ". $transactionid;
	    $data['transactiondata']= $this->db_api->custom($sql);
				 
        $this->load->view("transaction_v",$data);

	  }
  function pending_transactions()
          {
             $sql="select * from pb_pending_transactions where user_id_fk=".$this->user_id();
             $data['result']=  $this->db_api->custom($sql);
             $this->load->view("pending_transaction_page",$data);
          }
   // function to deactivate account
    function deactivateAccount(){
      $dbapi=$this->load->module("db_api");
      $users_result=$dbapi->select("status","iws_profiles","profile_id=".$this->user_id());
      $data['is_oneidnet_deactivetab_active']="Yes";
      $data['account_status'] = $users_result[0]["status"];
      $this->load->view("deactivate_page",$data);
    }
    function insertDeactiveLog(){
      $reason=$this->input->post("reason");
      $deletion_type=$this->input->post("deletion_type");
      $system_option=$this->input->post("sys_opt");
      $dbapi=$this->load->module("db_api");
      $reactivation_date=$this->input->post("reactivation_date");
      $remind_option=($this->input->post("remind_opt")=="yes")?1:0;
      $reactive_date="";
      //print_r($_REQUEST);
      if($reactivation_date!==""){
        $dtarry=explode("/",$reactivation_date);
        $current_date=date("Y-m-d H:i:s");
        $current_arry=explode(" ",$current_date);
        $current_time_ary=$current_arry[1];
        $reactive_date=$dtarry[2]."-".$dtarry[0]."-".$dtarry[1]." ".$current_time_ary;
      }
      $ins_array=array("system_option"=>$system_option,"reason"=>$reason,"user_id_fk"=>$this->user_id(),"type"=>$deletion_type,"auto_reactivation_time"=>$reactive_date,"email_reminder"=>$remind_option);
      foreach($ins_array as $key=>$val){
        $ins_array[$key] = $this->test_input($ins_array[$key]);
      }
      $insert_result=$dbapi->insert($ins_array,"iws_act_deactivation_log");
      if($insert_result==1){
        $this->accountReset($deletion_type);
      }
      echo $insert_result;
    }
    function accountReset($deletion_type){
      $dbapi=$this->load->module("db_api");
      $mem_obj = $this->load->module("memcaching");
      $cook_obj = $this->load->module("cookies");
      $ses_obj = $this->load->module("sessions");
      $fields = array('is_online' => 0,"status"=>$deletion_type);
      $dbapi->update($fields, "iws_profiles", "profile_id=" . $cook_obj->getUserID());
      $login_obj=$this->load->module("login");
      $login_obj->login_history_reset();
      $keyName = "USRDTA_" . $cook_obj->getUserID();
      $mem_obj->deleteKey($keyName);
      $cook_obj->destroyCookie('oud', null);
      $cook_obj->destroyCookie('theme', null);
      $ses_obj->destroySession();
    }
    function reactiveAccount(){
      $dbapi=$this->load->module("db_api");
      //echo "SELECT status,auto_reactivation_time FROM iws_profiles profiles INNER JOIN iws_act_deactivation_log log ON profiles.profile_id=log.user_id_fk WHERE profile_id=".$this->user_id();
      $account_details=$dbapi->custom("SELECT username,profile_id,status,auto_reactivation_time,rec_aid FROM iws_profiles profiles INNER JOIN iws_act_deactivation_log log ON profiles.profile_id=log.user_id_fk WHERE profile_id=".$this->user_id());
      $data["account_data"]=$account_details;
      $this->load->view("myaccount/reactivePage",$data);
    }
    function accDeletion(){
      $dbapi=$this->load->module("db_api");
      $account_details=$dbapi->custom("SELECT profile_id,username,status,auto_reactivation_time,rec_aid FROM iws_profiles profiles INNER JOIN iws_act_deactivation_log log ON profiles.profile_id=log.user_id_fk WHERE profile_id=".$this->user_id());
      //$result=$dbapi->custom("SELECT username,auto_reactivation_time,rec_aid FROM iws_profiles profiles INNER JOIN iws_act_deactivation_log act ON profiles.profile_id=act.user_id_fk WHERE profiles.profile_id=".$profile_id);
      $data["account_data"]=$account_details;
      $this->load->view("myaccount/accDeletePage",$data);
    }
}
