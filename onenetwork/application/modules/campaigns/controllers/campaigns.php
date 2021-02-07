<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class campaigns extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->helper('security');
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index() {
        $this->load->view('campaigns/campaign_page_view');
    }

    function create_campaign() {
        $this->load->view('campaigns/campaign_basic_view');
    }

    function getcampaignsScondpage_Info() {
        $this->load->view('campaigns/campaign_second_view');
    }

    function getcampaignstrd_Info() {
        $this->load->view('campaigns/campaign_third_view');
    }
    function getcamsecsubpage(){
        $this->load->view('campaigns/campaign_sec_right');
    }
    function campaignmonitor(){
        $data["promotion_status"] = $this->getEnumTypeforColumn("status");
        $data["promotion_modules"] = $this->getEnumTypeforColumn("module");
        $data["promotion_data_types"] = $this->getEnumTypeforColumn("promo_type");
        $data['promotions_saved'] =  $this->getAllPromotions("DRAFTED");
        $data['promotions_running'] =  $this->getAllPromotions("LOCKED");
        $data['promotions_expired'] =  $this->getAllPromotions("EXPIRED");
        $this->load->view('campaigns/campaign_monitor',$data);
    }
    function campaign_detailview(){
        $promo_code = $this->input->get('promo_id');
        $promo_code = base64_decode(base64_decode($promo_code));        
        $data['promoDetails'] = $this->getPromodetails($promo_code);

 $this->load->view('campaigns/campaign_detailview', $data);
    }
    
    function getPromodetails($promo_code) {
        $db_obj = $this->load->module("db_api");
        $result = $db_obj->select("*", "onetwork_promotions", " promo_code ='" . $promo_code . "' ");
        if ($result) {
            return $result;
        } else {
            log_message('error', 'AERPC116');
        }
    }

    //Mar 9th 2016 Added by Anil
    function getAllPromotions($status_type = "") {
        $db_obj = $this->load->module("db_api");
        $sqlQry="select status, promotion_start_time, promotion_end_time, total_cost, promo_code, promo_name, module, promo_type, created_on from onetwork_promotions where created_by =".$this->get_userId();
        if($status_type != ""){
            $sqlQry .= "  and  status = '".$status_type."'";
        }
        
         $sqlQry .= " ORDER BY created_on DESC";
        $result = $db_obj->custom($sqlQry);
        if($result) {
            return $result;
        } else {
            log_message('error', 'AERPC116');
        }
    }
    function resetPromotions() {
      $status =   $this->input->post('status');
     $data['promotions_saved']= $this->getAllPromotions($status);
    $this->load->view('reset_compaign',$data);
    }
	function getEntityDetails($promo_type, $entityid) {
		switch($promo_type) {
			case 'ONESHOP_PRODUCTS':
				$name_field   = 'product_name';
				$table_name   = 'oshop_products';
				$field_id = 'product_aid';
				break;
			case 'ONESHOP_STORES':
				$name_field='store_name';
				$table_name='oshop_stores';
				$field_id = 'store_aid';
				break;
			case 'ONESHOP_MALLS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'TUNNEL_CHANNELS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'TUNNEL_VIDEOS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'DEALERX_PROFILE':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'DEALERX_AUCTION':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'COFFICE_PROFILE':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'COFFICE_JOBS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'ISNEWS_STORIES':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'CLICK_PAGES':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'CLICK_GROUPS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'CLICK_EVENTS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'BUZZIN_QPICS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'BUZZIN_QVIDS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'BUZZIN_ACCOUNT_PROMOTION':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'NETPRO_GROUPS':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			case 'TRAVELTIME_TOUR_PACKAGES':
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
			default:
				$name_field='';
				$table_name='';
				$field_id = 'product_aid';
				break;
		}
		$db_obj = $this->load->module("db_api");
        $result = $db_obj->custom("select {$name_field} from {$table_name} where {$field_id} = '{$entityid}'");
        if($result) {
			$data['field_name'] = $name_field;
			$data['field_value'] =  $result[0][$name_field];
			return $data;
		} else {
			log_message('error', 'AERPC116');
		}
	}
	function getPaymentDetails($tid) {
		$db_obj = $this->load->module("db_api");
        $result = $db_obj->custom("select t.transaction_time, t.status, t.transaction_code, c.card_name as card_name, cur.name as cur_name from pb_transactions t left join iws_currencies cur on t.currency_id_fk = cur.rec_aid  left join pb_cards c on t.card_id_fk = c.card_id where t.transaction_aid = $tid ");
        if($result) {
			return $result[0];
		} else {
			log_message('error', 'AERPC116');
		}
	}
	function getCountryName($cid) {
		$db_obj = $this->load->module("db_api");
        $myfields = "country_name";
        $mytable = 'iws_countries_info';
        $where = " country_id ='".$cid."' ";
        $result = $db_obj->select($myfields, $mytable,$where);
        if($result) {
			return $result[0]['country_name'];
		} else {
			log_message('error', 'AERPC116');
		}
	}
        //july 04 modified by venkatesh
	function getAudienceDetails($aid) {            
        $db_obj = $this->load->module("db_api");
        $result = $db_obj->select("*", "onetwork_audience_lab", "transaction_id_fk =$aid ");            
        if ($result) {
        if($result[0]["languages_knows"]){
                    $result[0]["languages_knows"]=$db_obj->custom("select language_name from global_languages where language_id in(".$result[0]["languages_knows"].")");
        }           
        if($result[0]["country_id_str"]){
                    $result[0]["country_id_str"]=$db_obj->custom("SELECT `country_name` FROM `iws_countries_info` WHERE `country_id` in(".$result[0]["country_id_str"].")");
        }           
        if($result[0]["city_id_str"]){
                    $result[0]["city_id_str"]=$db_obj->custom("SELECT city_name FROM `global_cities_info` WHERE `city_id` in(".$result[0]["city_id_str"].")");
        }           
        if($result[0]["exact_entities_ids"]){
                    $result[0]["exact_entities_ids"]=$db_obj->custom("SELECT `page_name` FROM `click_pages` WHERE `page_aid` in(".$result[0]["exact_entities_ids"].")");
        }
            return $result[0];
        } else {
            log_message('error', 'AERPC116');
        }
    }

    //Getting Enum datatype columns data -- Mar 5th 2016 Added by Anil
        function getEnumTypeforColumn($col_name = "promo_type"){
            //Enum Data Array
            $enumDataArr = array();
            $dbapi = $this->load->module("db_api");
            $setColumnQry = "SHOW COLUMNS FROM onetwork_promotions LIKE '".$col_name."'";
            $enum_res = $dbapi->custom($setColumnQry);
            $setTypeData  = $enum_res[0]['Type'];
            $savedSetenum  = substr($setTypeData,5,strlen($setTypeData)-7); // Remove "set(" at start and ");" at end
            $enumSetArr = preg_split("/','/",$savedSetenum); 
            foreach($enumSetArr as $enumVal){
                $enumVal = str_replace("'", "", $enumVal);
                $enumDataArr[$enumVal] = $enumVal;
            }

            return $enumDataArr;
        }
        
        //March 14th Changes by Anil 
        //Function for Overview promotion search
        function gettingPromotionSearchOverview(){
            $db_obj = $this->load->module('db_api');
            $prom_name = xss_clean($this->input->post('promotion_name'));
            
            $sqlQry="select status, promotion_start_time, promotion_end_time, total_cost, promo_code, promo_name, module, promo_type, created_on from onetwork_promotions";
            if($prom_name != ""){
                $sqlQry .= " WHERE promo_name LIKE '%".$prom_name."%'";
            }

            $sqlQry .= " ORDER BY created_on DESC";
            $result = $db_obj->custom($sqlQry);
            
            if($result) {
                foreach($result as $promo) {
                    $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
                    ?>
                    <li class="task-item">
                        <div class="task-check">
                            <label>
                                <input type="checkbox">
                                <span class="text"></span>
                            </label>
                        </div>

                        <?php 
                        if( $promo["status"] == "LOCKED"){
                            $classsApply = "label-palegreen";
                            $dispStatus = "Running";
                        }else if( $promo["status"] == "DRAFTED"){
                            $classsApply = "label-yellow";
                            $dispStatus = "Saved";
                        }else if( $promo["status"] == "EXPIRED"){
                            $classsApply = "label-orange";
                            $dispStatus = "Expired";
                        }
                        ?>
                        <div class="task-state">
                            <span class="label <?php echo$classsApply;?>">
                                <?php echo $dispStatus;?>
                            </span>
                        </div>
                        <div class="task-time">Expiring On: <?php echo date("M d, Y", strtotime($promo["promotion_end_time"]));?></div>
                        <div class="task-body"><strong><?php echo $promo["module"];?></strong> <?php echo $promo['promo_name']; ?></div>
                        <div class="task-creator">Click to visit <a href="<?php echo $promo_url; ?>"><?php echo $promo['promo_name']; ?></a></div>                                                
                        <div class="task-assignedto"><?php echo $promo["total_cost"];?>/-</div>
                    </li>
                    <?php
                }
             }
             
        }
        
        //Getting Ajax Call for getting results -- Mar 9th 2016 Added by Anil
        function getPromAjaxLoad(){
            $db_obj = $this->load->module('db_api');
            $prom_name = xss_clean($this->input->post('promotion_name'));
            $status = xss_clean($this->input->post('status'));
            $prom_module = xss_clean($this->input->post('prom_module'));
            $prom_type = xss_clean($this->input->post('prom_type'));
            $prom_days = xss_clean($this->input->post('prom_days'));
            
            $whereCond = "";
            $sqlQry="select promo_code, promo_name, module, promo_type, created_on from onetwork_promotions WHERE created_by =".$this->get_userId() ;
            
            if($prom_name != ""){
                $whereCond .= " AND promo_name LIKE '%".$prom_name."%'";
            }
            
            if($status != ""){
                $whereCond .= " AND status = '".$status."'";
            }
            
            if($prom_module != ""){
                if($prom_module!='All'){
                  
                     $whereCond .= " AND module = '".$prom_module."'";
                }
               
            }
            
            if($prom_type != ""){
                if($prom_type !='All'){
                $whereCond .= " AND promo_type = '".$prom_type."'";
                }
                
            }
            
            if($prom_days != ""){
                if($prom_days == "present_month"){
                     if($status == "LOCKED"){
                        // $whereCond .= " AND DATE_FORMAT(NOW(),'%m%Y') = DATE_FORMAT(created_on,'%m%Y')";
                         $whereCond .= "  AND MONTH( created_on ) = MONTH( CURRENT_DATE ) AND YEAR( created_on ) = YEAR(CURRENT_DATE )";
                     }else if($status == "DRAFTED"){
                         //$whereCond .= " AND DATE_FORMAT(NOW(),'%m%Y') = DATE_FORMAT(drafted_on,'%m%Y')";
                     $whereCond .= "  AND MONTH( drafted_on ) = MONTH( CURRENT_DATE ) AND YEAR( drafted_on ) = YEAR( CURRENT_DATE )";
                   
                         
                     }
                }else{
                    if($prom_days == "last_six_months"){
                        $noDays = "180";
                    }else  if($prom_days == "last_one_year"){
                        $noDays = "365";
                    }

                    if($status == "LOCKED"){
                       $whereCond .= " AND DATE(created_on)>=DATE_SUB(CURDATE(), INTERVAL  ".$noDays." DAY )";
                       // $whereCond .= " AND created_on BETWEEN NOW() - INTERVAL ".$noDays." DAY AND NOW()";
                    }else if($status == "DRAFTED"){
                       // $whereCond .= " AND drafted_on BETWEEN NOW() - INTERVAL ".$noDays." DAY AND NOW()";
                        $whereCond .= " AND DATE(drafted_on)>=DATE_SUB(CURDATE(), INTERVAL  ".$noDays." DAY )";
                       
                    }
                }
            }
            
            if($whereCond != ""){
                 $sqlQry .= " and promo_code != '' ".$whereCond;  
            }
            //echo $sqlQry;
            $result = $db_obj->custom($sqlQry);
            ?>
            <div class="Table">
                <div class="Heading">
                    <div class="Cell" style="width:60px;">
                        <p class="mat10">Logo</p>
                    </div>
                    <div class="Cell">
                        <p class="mat10">  Promotion Name </p>
                    </div>
                    <div class="Cell">
                        <p class="mat10">  Promotion Type </p>
                    </div>
                    <div class="Cell">
                        <p class="mat10">  Entity Name </p>
                    </div>
                    <div class="Cell">
                        <p class="mat10">  Saved On </p>
                    </div>
                </div>
            <?php
            if($result) {
                foreach($result as $promo) {
                    $promo_url=  base_url()."campaignDV?promo_id=".base64_encode(base64_encode($promo["promo_code"]));
               switch ($promo['promo_type']) {
                                                                                        case ONESHOP_PRODUCTS:
                                                                                            $pramotionimg =base_url().'assets/images/oproduct.png';;
                                                                                            break;
                                                                                        case ONESHOP_STORES:
                                                                                             $pramotionimg =base_url().'assets/images/ostore.png';
                                                                                            break;
                                                                                        case ONESHOP_MALLS:
                                                                                             $pramotionimg =base_url().'assets/images/oidentity.png';
                                                                                            break;
                                                                                         case TUNNEL_VIDEOS:
                                                                                             $pramotionimg =base_url().'assets/images/tvideo.png';
                                                                                            break; 
                                                                                        case TUNNEL_CHANNELS:
                                                                                             $pramotionimg =base_url().'assets/images/tchannel.png';
                                                                                            break;
                                                                                        case CLICK_PAGES:
                                                                                            $pramotionimg =base_url().'assets/images/cpage.png';
                                                                                            break;
                                                                                        case ISNEWS_STORIES:
                                                                                            $pramotionimg =base_url().'assets/images/is-news.png';
                                                                                            break;
                                                                                        
                                                                                        case CLICK_GROUPS:
                                                                                            $pramotionimg =base_url().'assets/images/cpage.png';
                                                                                            break;
                                                                                        case CLICK_EVENTS:
                                                                                            $pramotionimg =base_url().'assets/images/cevents.png';
                                                                                            break;
                                                                                        case COFFICE_JOBS:
                                                                                            $pramotionimg =base_url().'assets/images/cpostjob.png';
                                                                                            break;
                                                                                        case COFFICE_PROFILE:
                                                                                            $pramotionimg =base_url().'assets/images/cprofile.png';
                                                                                            break;
                                                                                        case DEALERX_PROFILE:
                                                                                            $pramotionimg =base_url().'assets/images/ddealers.png';
                                                                                            break;
                                                                                        case DEALERX_AUCTION:
                                                                                            $pramotionimg =base_url().'assets/images/dauction.png';
                                                                                               
                                                                                            break;
                                                                                         case  BUZZIN_QPICS:
                                                                                            $pramotionimg =base_url().'assets/images/bcompetition.png';
                                                                                            break;
                                                                                        case BUZZIN_QVIDS:
                                                                                            $pramotionimg =base_url().'assets/images/bvip.png';
                                                                                            break; 
                                                                                        case BUZZIN_ACCOUNT_PROMOTION:
                                                                                            $pramotionimg =base_url().'assets/images/ddealers.png';
                                                                                            break;
                                                                                        case NETPRO_GROUPS:
                                                                                            $pramotionimg =base_url().'assets/images/ngroup.png';
                                                                                            break; 
                                                                                        /* case TRAVELTIME_TOUR_PACKAGES:
                                                                                            $pramotionimg =base_url().'assets/images/ngroup.png';
                                                                                            break;
                                                                                         case ISNEWS_STORIES:
                                                                                            $pramotionimg =base_url().'assets/images/is-news.png';
                                                                                            break; */
                                                                                        default:
                                                                                            $pramotionimg =base_url().'assets/images/oneidnetlogo.png';
                                                                                        } ?>
                    <div class="Row">
                            <div class="Cell" style="width:40px; text-align:center;">
                                    <p style="margin-bottom:5px;" class="mat10"><img width="40px;" src="<?php echo $pramotionimg;?>"></p>
                            </div>
                            <div class="Cell">
                                    <p class="mat20"> <a class="blue textdecoration" href="<?php echo $promo_url; ?>"> <?php echo ucfirst($promo['promo_name']); ?>  </a></p>
                            </div>
                            <div class="Cell">
                                    <p class="mat20"> <?php echo $promo['promo_type']; ?> </p>
                            </div>
                            <div class="Cell">
                                    <p class="mat20 bold red"><a class="red" href="#"> <?php echo $promo['module']; ?> </a> </p>
                            </div>
                            <div class="Cell">
                                    <p class="mat20"> <?php echo date('M d , Y H:i A', strtotime($promo['created_on']) ); ?>  </p>
                            </div>
                    </div>
                <?php
                }
            } else {
                //log_message('error', 'AERPC116');
                if($status == "LOCKED")
                    $dispStatus = "Running";
                else if($status == "DRAFTED")
                    $dispStatus = "Saved";
                
                echo " <div class='Row'>No ".$dispStatus." Campaigns </div>";
            }
            ?>
            </div> 
            <?php
        }
        
        //Getting Ajax Call for type dropdown builder script -- Mar 9th 2016 Added by Anil
        function subModuleCampaignLoad(){
            $db_obj = $this->load->module('db_api');
            $module = xss_clean($this->input->post('module'));
            $fromplace = xss_clean($this->input->post('fromplace'));
            
            $promotion_data_types = $this->getEnumTypeforColumn("promo_type");
            
            //All Promotion modules and submodules made as array
            $promModArr = array();
            foreach($promotion_data_types as $promtypKey => $promtypVal){
                $promtypExp = explode("_",$promtypKey);
                if($promtypExp[0] != $module) continue;
                
                $promModArr[] = $promtypExp[1];
            }
            if($fromplace == "draft")
                $controlName = "prom_type_draft";
            else
                $controlName = "prom_type";
            
            
            if(count($promModArr) > 0){
                ?>
                <option value="">Select <?php echo $module;?> Promotions</option>
                <?php
                foreach($promModArr as $promSubModVal){
                    ?>
                     <option value="<?php echo $module."_".$promSubModVal;?>"><?php echo $promSubModVal;?></option>
                    <?php
                }
            }else{
                echo '<option disabled">Select Promotion Type</option><option value="">All Promotion Type</option>';
            }
        }
}
