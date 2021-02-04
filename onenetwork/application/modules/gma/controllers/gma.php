<?php
if (!defined('BASEPATH'))    exit('No direct script access allowed');

class gma extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->module("db_api");
        $this->load->helper('security');
        $ckobj = $this->load->module("cookies");
       if ($_REQUEST) {
            $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $this->session_restart->key_check($_REQUEST["skey"]);
            }
		}
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = str_replace("'", "&#39", $data);
        return $data;
    }
    function index(){
    }
    function genericGeneralMarketing($campaigntype) {    
        $data["campaign_type"]=$campaigntype;
	    $this->load->view("gma/basicinfo_GMA",$data) ;
    }
    function adsstudio_tab() {
        $this->load->view("gma/marketing");
    }
    
    function basicinfo_tab() {
        $this->load->view("gma/basicinfo_tab");
    }  
    
    function getEnitiesInfo(){
		$selected = $_REQUEST['selected'];
		$module = $_REQUEST['module'];
		switch ( $module ) {
		case "oneshop": 
			if($selected=="store"){
				
			  $sql ="select   store_aid as id  , store_name as name    from  oshop_stores where created_by = ".$this->get_userId() ;
			  $this->getResultlevel1($sql);
			}else if($selected=="product"){
				 $sql ="SELECT op.product_aid as id  ,op.product_name as name ,os.store_name as name1  FROM `oshop_products` as op inner join `oshop_stores` as os on op.store_id_fk=os.store_aid  where os.created_by =".$this->get_userId() ;
                 $this->getResultlevel2($sql);
			} 
			 break;
	   case "netpro": 
         if($selected=="groups"){
         $sql ="select   group_id as id, group_name as name  from  netpro_groups where created_by = ".$this->get_userId() ;
		 $this->getResultlevel1($sql);
		 } 
		  break;         
       case "click": 
         if($selected=="events"){
          echo  $sql ="select   event_aid as id , event_subject as name   from  click_events where created_by = ".$this->get_userId() ; 
             $this->getResultlevel1($sql);
             }
		 else if($selected=="groups"){
			$sql ="select   group_aid as id , group_name as name   from  click_groups where created_by = ".$this->get_userId() ;
		    $this->getResultlevel1($sql);
		 }else  if($selected=="pages"){
				$sql ="select   page_aid as id , page_name as name   from  click_pages where created_by = ".$this->get_userId() ;      
		        $this->getResultlevel1($sql);
		 }
		  break;
        case "tunnel": 
			 if ($selected == "channel") {
				   $sql ="select   rec_id as id , channel_name as name  from  tunnel_all_channels where created_by = ".$this->get_userId() ;
			       $this->getResultlevel1($sql);
			
			}else if ($selected == "video") {
				 	$sql = "SELECT tv.rec_id as id ,tv.video_name as name ,tc.channel_name as name1 FROM `tunnel_all_videos` as tv  inner join  `tunnel_all_channels` as tc  on tv.channel_id=tc.rec_id where tc.created_by =" . $this->get_userId(); 
		           $this->getResultlevel2($sql);
		      }  
		       break;  
        case "dealerx": 
            if ($selected == "auction") {
                        $sql = "SELECT auction_id as id , product_name  as name FROM `dx_auctions` where  dealer_id_fk =" . $this->get_userId();
                        $this->getResultlevel1($sql);
            }else if ($selected == "profile") {
                        $sql = "SELECT dealer_id as id , company_name as name  FROM `dx_dealers` where  representative_id =" . $this->get_userId(); 
                        $this->getResultlevel1($sql);
			}  
			 break;        
        case "buzzin":  
        if($selected=="snapper"){
           $sql ="select  rec_aid as id, pics_url as name from  buzzin_quick_pics where user_id_fk = ".$this->get_userId() ;
           $this->getResult($sql);
            } else if($selected=="groups"){
			$sql ="select   group_aid as id , group_name as name   from  click_groups where created_by = ".$this->get_userId() ;
			$this->getResult($sql);
		 }        
       break;
        default:
            break;         
		}
		echo $sql; 
	} 
	function getResultlevel1($sql){
		$this->load->module("db_api");
	   	$dataresult =$this->db_api->custom($sql);
		?>
		 <option value=''>Select</option>
		<?php
		 foreach($dataresult as $result){ ?>
	     <option value="<?php echo $result['id'] ?>" ><?php echo  $result['name'] ?></option>
	  <?php   }  
	   
		}
		function getResultlevel2($sql){
		$this->load->module("db_api");
	   	$dataresult =$this->db_api->custom($sql);
		?>
		<option value=''>Select</option>";
		<?php
		 foreach($dataresult as $result){ ?>
	     <option value="<?php  echo $result['id'] ?>"><?php echo $result['name1']."-".$result['name']?> </option>
	    <?php }  
	     
		}
		
	function	gma_budget(){
		$budget=$_REQUEST["budget"];
        $amount=$_REQUEST["amount"];
        $campaigntype =$_REQUEST["campaigntype"];
        $size =$_REQUEST["size"];
        $this->load->module("db_api");
	    $query =" SELECT unit_rate FROM `onetwork_general_marketing_rates` where type= '".$campaigntype."' and size = '".$size."'";
		$unitrateresult 	=$this->db_api->custom($query);
			
        $promotiontype= $_REQUEST["promotiontype"];
        $sql = "SELECT sum(base_rate) as totalrates  FROM `onetwork_general_marketing_module_rates` where module in('" . implode("','", $promotiontype) . "')";
        
	   	$rateresult =$this->db_api->custom($sql);
			$rateresult[0]['totalrates'];
			 $arr['Totalamount'] = $amount + ( $amount * $rateresult[0]['totalrates']/100)+( $amount * $unitrateresult[0]['unit_rate']/100);
			 echo json_encode($arr);
		}
	function	gmaPrcreate(){
		$campaginname =$_REQUEST["onenetwork_campagin"];
		$campagintext =$_REQUEST["onenetwork_text"];
		//$campaignstart =$_REQUEST["onenetwork_campaignstart"];
               // $campaignend =$_REQUEST["onenetwork_campaignend"];
		$imgbanner='';
                $campaignstart =$_REQUEST["on_campaignstart"];
                $campaignend =$_REQUEST["on_campaignend"];
		$compaigncost =$_REQUEST["onenetwork_compaigncost"];
		$size =$_REQUEST["onenetwork_size"];
		$outsideUrl =$_REQUEST["outsideUrl"];
		$contentnature =$_REQUEST["onenetwork_contenttype"];
		$campaigntype =$_REQUEST["onenetwork_campaigntype"];
                    if($campaigntype!='WEBSITE'){
                        $current_date=date("YmdHis");
                        $uploaddir ='data/banner/';
                        if(!file_exists($uploaddir)){
                        mkdir($uploaddir);
                        shell_exec("sudo chmod -R 777 ".$uploaddir);
                      }
                     $name = basename($_FILES['onenetwork_adbanner']['name']);
                     list($txt, $ext) = explode(".", $name);
                     $bannerimage_name = $uploaddir . $current_date ."." . $ext;
                     if(move_uploaded_file($_FILES['onenetwork_adbanner']['tmp_name'], $bannerimage_name)){
                        
                         
                       $imgbanner  =$bannerimage_name;
                     }
                     
                }
		$source =$_REQUEST["onenetwork_source"];
		//$entityid =$_REQUEST["entityid"];
                $entityid =$_REQUEST["entity_list"];
		$moduletarget =$_REQUEST["onenetwork_promotion"];
		$insidemodule =$_REQUEST["onenetwork_modules"];
		
		
		
		$age=$_REQUEST["age"];
        $gender=$_REQUEST["gender"];
        $marital_status=$_REQUEST["marital_status"];
        //$interests=$_REQUEST["interests"];
         //$pages=$_REQUEST["pages"];
        $interests=$_REQUEST["hinterests_val"];
        $pages=$_REQUEST["hpages_val"];
        $languages=$_REQUEST["hlanguages_val"];
        $nationality=$_REQUEST["hnationality_val"];
        $cloation=$_REQUEST["hlocation_val"];
        $campaignlocation=$_REQUEST["campaignlocation"];
        $uid = $this->get_userId();
          //$cno = $_REQUEST["promotionpayment_card_no"];
        $cno = $_REQUEST["promotionpayment"];
          $dbobj = $this->load->module("db_api");
            $rlt = $dbobj->select("card_id", "pb_cards", "card_number='" . $cno . "' and user_id_fk=" . $uid);
            if ($rlt[0]["card_id"]) {
                $fields=["sender_id_fk"=>$uid,"payment_type"=>"OUTBOUND","card_id_fk"=>$rlt[0]["card_id"],
                    "amount"=>$_REQUEST["onenetwork_budget"],"module"=>$module,"entity_id" => $entity_id,
                    "from_account"=>$rlt[0]["card_id"], "entity_type"=>$module."_ONEIDNET"];
                 $fields = $this->validations->checkinput($fields);  
                if( $dbobj->insert($fields,"pb_transactions")==1){
					$tfid= $dbobj->custom("select max(transaction_aid) as transaction_id_fk from pb_transactions where sender_id_fk=".$uid);
                    $ST = new DateTime($campaignstart);
                    $ED= new DateTime($campaignend);
                    
                    
                    $onetwork_audience_lab_fields = ["age_group" => $age,
                        "gender" => $promo_type,
                        "languages_knows" => $languages,
                        "interest_entities" => $interests,
                        "exact_entities_ids" => $pages,
                        "created_by"=>$uid,
                        "transaction_id_fk" => $tfid[0]["transaction_id_fk"]];
                if($cloation=="Country"){
                            $onetwork_audience_lab_fields["country_id_str"]=$campaignlocation;
                }else if($cloation=="State"){
                    $onetwork_audience_lab_fields["state_id_fk"]=$campaignlocation;
                }else if($cloation=="City"){
                    $onetwork_audience_lab_fields["city_id_str"]=$campaignlocation;
                }
                 $onetwork_audience_lab_fields = $this->validations->checkinput($onetwork_audience_lab_fields);  
                 $dbobj->insert($onetwork_audience_lab_fields,"onetwork_audience_lab");
                 $aid= $dbobj->custom("select max(rec_aid) as audience_id_fk from onetwork_audience_lab where created_by =".$uid);
                    $gmarketingfields = ["campaign_name" => $campaginname,
                        "campaign_text" => $campagintext, 
                        "url_for_redirection" => $outsideUrl, 
                        "content_nature" => $contentnature,
                        "campaign_type" => $campaigntype,
                        "module_target" =>$moduletarget,
                        "source_type" =>$source ,
                        "uploaded_file_name"=>$imgbanner,
                        "inside_entity_type" =>$insidemodule,
                        "inside_entity_id" =>$entityid ,
                        "total_cost" => $compaigncost,
                        "transaction_aid_fk" => $tfid[0]["transaction_id_fk"],
                        "audience_id_fk"=>$aid[0]["audience_id_fk"],
                        "size"=>$size,
                        "start_date" => $ST->format('Y-m-d H:i:s'),
                        "end_date" => $ED->format('Y-m-d H:i:s'),
                       
                       ];
                    
                 //$promotionfields = $this->validations->checkinput($promotionfields);  
                  if( $dbobj->insert($gmarketingfields,"onetwork_gm_advertisments")==1){
					  
                    echo "AERPC101";                      
                  }
				}
		    }
		}
    // general marketing advertisement monitor
    function gmamonitor(){
        $dbapi=$this->load->module("db_api");        
        $result=$dbapi->custom("SELECT campaign_name,campaign_type,created_on,campaign_code,module_target,source_type FROM onetwork_gm_advertisments gma INNER JOIN pb_transactions pb ON gma.transaction_aid_fk=pb.transaction_aid WHERE sender_id_fk=".$this->get_userId());
        $sresult=$dbapi->custom("SELECT count(*) as cnt,gma.status FROM onetwork_gm_advertisments gma INNER JOIN pb_transactions pb ON gma.transaction_aid_fk=pb.transaction_aid WHERE sender_id_fk=".$this->get_userId()." GROUP BY status");
           
        $data["gm_data"]=$result;
        $data["count_data"]=$count_arry;
        $this->load->view('gma/gma_monitor',$data);
    }
    function gmaCampaignView(){
        if(!isset($_REQUEST["campaign_id"])){
            header('Location:'.base_url());
        }
        $campaign_id= base64_decode(base64_decode($_REQUEST["campaign_id"]));
        //echo $campaign_id;
        $this->load->module("db_api");
        $cquery="SELECT oga.rec_aid,transaction_aid_fk,campaign_name,status, total_targets,campaign_text,campaign_type,module_target,source_type,start_date,end_date,oga.created_on,total_cost,age_group,marital_status,country_id_str,city_id_str,state_id_fk,gender,languages_knows,interest_entities,exact_entities_ids FROM onetwork_gm_advertisments oga INNER JOIN onetwork_audience_lab oal ON oga.audience_id_fk=oal.rec_aid WHERE oga.rec_aid=".$campaign_id;
        $cresult=$this->db_api->custom($cquery);
        //print_r($cresult);
        if($cresult==0){
            header('Location:'.base_url());
        }
        if ($cresult) {
        if($cresult[0]["languages_knows"]){
                    $data["languages_knows"]=$this->db_api->custom("select language_name from global_languages where language_id in(".$cresult[0]["languages_knows"].")");
        }           
        if($cresult[0]["country_id_str"]){
                    $data["country_names"]=$this->db_api->custom("SELECT `country_name` FROM `iws_countries_info` WHERE `country_id` in(".$cresult[0]["country_id_str"].")");
        }
         if($result[0]["city_id_str"]){
                    $data["city_names"]=$db_obj->custom("SELECT city_name FROM `global_cities_info` WHERE `city_id` in(".$cresult[0]["city_id_str"].")");
        }} 
        $txn_id=$cresult[0]["transaction_aid_fk"];
        $campaigns=$this->load->module("campaigns");
        $transaction_details=$campaigns->getPaymentDetails($txn_id);
        $data["txn_details"]=$transaction_details;
        $data["campaign_details"]=$cresult;
        $this->load->view('gma/gma_list_v',$data);
    }
    function gmaMonitorTpl(){       
        $dbapi=$this->load->module("db_api");
        $campaign_name=$this->input->post("campaign_name")?$this->input->post("campaign_name"):"";
        $module_name=$this->input->post("module_name")?$this->input->post("module_name"):"";
        $campaign_type=$this->input->post("campaign_type")?$this->input->post("campaign_type"):"";
        $sql="SELECT rec_aid,campaign_name,campaign_type,created_on,campaign_code,module_target,source_type,gma.status  FROM onetwork_gm_advertisments gma INNER JOIN pb_transactions pb ON gma.transaction_aid_fk=pb.transaction_aid WHERE sender_id_fk=".$this->get_userId();
        if($campaign_name!=""){
            $sql.=" AND campaign_name LIKE '%".$campaign_name."%'";
        }
        if($module_name!=""){
            $sql.=" AND module_target='".$module_name."'";
        }
        if($campaign_type!=""){
            $sql.=" AND campaign_type='".$campaign_type."'";
        }
       
       // $sql.=" AND CURRENT_DATE >= DATE(start_date) AND CURRENT_DATE <=DATE(end_date)";
       
        $result=$dbapi->custom($sql);
        $data["gm_data"]=$result;
        $this->load->view("gma/gma_monitor_tpl",$data);
    }
    function gmaExpiredCampTpl(){
        $dbapi=$this->load->module("db_api");
        $campaign_name=$this->input->post("campaign_name")?$this->input->post("campaign_name"):"";
        $module_name=$this->input->post("module_name")?$this->input->post("module_name"):"";
        $campaign_type=$this->input->post("campaign_type")?$this->input->post("campaign_type"):"";
        $sql="SELECT campaign_name,campaign_type,created_on,campaign_code,module_target,source_type FROM onetwork_gm_advertisments gma INNER JOIN pb_transactions pb ON gma.transaction_aid_fk=pb.transaction_aid WHERE sender_id_fk=".$this->get_userId();
        if($campaign_name!=""){
            $sql.=" AND campaign_name LIKE '%".$campaign_name."%'";
        }
        if($module_name!=""){
            $sql.=" AND module_target='".$module_name."'";
        }
        if($campaign_type!=""){
            $sql.=" AND campaign_type='".$campaign_type."'";
        }
        $sql.=" AND DATE(start_date)<=CURRENT_DATE AND DATE(end_date)<=CURRENT_DATE";
        //echo $sql;
        $result=$dbapi->custom($sql);
        $data["gma_expired_data"]=$result;
        $this->load->view("gma/gmaexp_campaigns_tpl",$data);
    }
}





