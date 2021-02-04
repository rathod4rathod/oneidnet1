<?php

class official_badge extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

    function index() {
        $this->load->view('official_badge_page');
    }
    function officialbadgeMonitor(){
        $dbapi=$this->load->module("db_api");        
         $this->load->view('official_badge/officialbadge_monitor');
    }
    function obadgeMonitorTpl(){       
        $dbapi=$this->load->module("db_api");
        $module_name=$this->input->post("official_badgename")?$this->input->post("official_badgename"):"";
        $type=$this->input->post("officialbadge_type")?$this->input->post("officialbadge_type"):"";
        $sql ="SELECT ob.module,ob.rec_aid ,ob.entity_type ,ob.status,ob.transaction_id_fk ,ob.requested_on FROM onetwork_official_badges ob INNER JOIN pb_transactions pb ON ob.transaction_id_fk=pb.transaction_aid WHERE 	requested_by=".$this->get_userId();
        if($module_name!=''){
          $sql .= " And  ob.module ='".$module_name."'" ; 
        }
        if($type!=''){
            $sql .= " And  ob.entity_type ='".$type."'" ; 
        }
        if($sql!=''){ $sql .= " order by ob.rec_aid  desc " ; }
        
        $data['officialdata']= $dbapi->custom($sql);
        
        $this->load->view('official_badge/officialbadgeMonitor_tpl',$data);
       
    }
    function submodules(){
        $module = $this->input->post("official_badgename");
         
        $promotion_data_types = $this->getEnumTypeforColumn("entity_type'");
        
            //All Promotion modules and submodules made as array
            $promModArr = array();
            foreach($promotion_data_types as $promtypKey => $promtypVal){
                
                $promtypExp = explode("_",$promtypKey);
              
                if($promtypExp[0] != $module) continue;
                
                $promModArr[] = $promtypExp[1];
            }
           if(count($promModArr) > 0){
                ?>
                <option value="">Select </option>
                <?php
                foreach($promModArr as $promSubModVal){
                    ?>
                     <option value="<?php echo $module.'_'.$promSubModVal;?>"><?php echo $promSubModVal;?></option>
                    <?php
                }
            }else{
                echo '<option disabled >Select </option><option value="">All Type</option>';
            }
    }
    function officialBadgeView(){
        $officialBadge_code = $this->input->get('rec_aid');
         $officialBadge_code = base64_decode(base64_decode($officialBadge_code)); 
        $db_obj=$this->load->module("db_api");
        $result = $db_obj->select("*", "onetwork_official_badges", " rec_aid ='" . $officialBadge_code . "' ");
        
        $data['statename'] = $db_obj->custom("SELECT state_name FROM `global_states_info` where state_id =".$result[0]['state_id_fk']);
        $data['cityname'] = $db_obj->custom("SELECT city_name FROM `global_cities_info` where city_id =".$result[0]['city_id_fk']);
        $data['countryname'] =  $db_obj->custom("SELECT country_name FROM `global_countries_info` where 	country_id =".$result[0]['country_id_fk']);
        $data['txn_details']=  $db_obj->custom("SELECT t.transaction_time, t.status, t.transaction_code, c.card_name as card_name, cur.name as cur_name from pb_transactions t left join iws_currencies cur on t.currency_id_fk = cur.rec_aid  left join pb_cards c on t.card_id_fk = c.card_id where t.transaction_aid =".$result[0]['transaction_id_fk']);
        $data['offibadgeDetails'] = $result ;
        $this->load->view('official_badge/officialbadge_detailview', $data);
  
        
    }
    
   
    function getEnumTypeforColumn($col_name = "entity_type'"){
            //Enum Data Array
            $enumDataArr = array();
            $dbapi = $this->load->module("db_api");
             $setColumnQry = "SHOW COLUMNS FROM onetwork_official_badges  LIKE 'entity_type'";
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
        
}
