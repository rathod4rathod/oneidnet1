<?php

class uDashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->module('cookies');
        $this->load->module("db_api");
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

		function index() {
			 
			 $data['promotioncount']      = $this->db_api->custom("SELECT count(*) as promotioncount  FROM `onetwork_promotions` where created_by=".$this->get_userId());
			 $data['gmacount']            = $this->db_api->custom("SELECT count(*) as gmacount FROM `onetwork_gm_advertisments`  where created_by=".$this->get_userId());
			 $data['wordbuyadscount']     = $this->db_api->custom("SELECT count(*) as wordbuyadscount FROM   `onetwork_wordbuy_ads`   where created_by=".$this->get_userId());
			 $data['officialbadgescount'] = $this->db_api->custom("SELECT count(*) as officialbadgescount FROM   `onetwork_official_badges`   where requested_by=".$this->get_userId());
			 
			 $this->load->view("udashboard",$data);
		}
	   function generalMarketingAds(){
		    if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        } 
			$db_obj = $this->load->module("db_api");
                        
			$data['genericresults'] = $db_obj->custom("SELECT rec_aid as id , campaign_name as name ,ogm.total_cost as amount,end_date as enddate   FROM `onetwork_gm_advertisments` as ogm   
			                                          inner join pb_transactions as pb on pb.transaction_aid = ogm.transaction_aid_fk
												
			                                           Limit $starting_index ,10");
			$this->load->view("generic_view",$data);
			 
		}
		function wordBuyAds(){
			 if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        } 
			$db_obj = $this->load->module("db_api");
			$data['genericresults'] = $db_obj->custom("SELECT  ows.rec_aid as id ,ows.name as name ,ows.amount ,ads_end_time as enddate   FROM  `onetwork_wordbuy_ads`  as ows 
												inner join pb_transactions as pb on pb.transaction_aid = ows.transaction_id_fk
												  Limit $starting_index ,10");
			$this->load->view("generic_view",$data);
			 
		}
		function officialBadges(){
			if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        } 		$db_obj = $this->load->module("db_api");
			$data['genericresults'] = $db_obj->custom("SELECT rec_aid as id ,field_of_popularity as name ,status   FROM  `onetwork_official_badges` 
			
			                                       where requested_by=".$this->get_userId()."  Limit  $starting_index ,10 ");
			$this->load->view("official_badge",$data);
			 
		}
		function promotions(){
			
			$db_obj = $this->load->module("db_api");
			 if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        } 
        	$data['genericresults'] = $db_obj->custom("SELECT rec_aid as id , promo_name as name ,op.total_cost as amount ,promotion_end_time as enddate    FROM  `onetwork_promotions` as op
			                             inner join pb_transactions as pb on pb.transaction_aid = op.transaction_id_fk
												
			 where created_by=".$this->get_userId()."  Limit $starting_index  ,10");
			$this->load->view("generic_view",$data);
			 
		}
		  function oneshopStoreRenews(){  
                     if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        } 
                    $db_obj = $this->load->module("db_api");
                    
		   $data['oneshoprenews'] =  $db_obj->custom(" SELECT os.store_name,os.store_code ,os.profile_image_path ,ori.is_renewed ,ori.renewed_on  FROM `oshop_store_renewals_info` as ori inner join oshop_stores as os 
                
on                              os.store_aid =ori.store_id_fk where  os.created_by= ".$this->get_userId()."  Limit $starting_index  ,5");
                    $this->load->view("uDashboard/oneshop_renewsinfo",$data);
                }
                  function coOfficeRenews(){  
                     if (isset($_REQUEST['start_id'])) {
            $starting_index = $_REQUEST['start_id'];
        } else {
            $starting_index = 0;
        } 
                    $db_obj = $this->load->module("db_api");
                    
		   $data['coofficerenews'] =  $db_obj->custom("  SELECT iw.company_aid,iw.company_code,iw.company_name,iw.logo_path,iwr.is_renewed
,iwr.renewed_on FROM  `iws_employers` AS iw
INNER JOIN  `iws_employers_renewal_info` AS iwr ON iw.company_aid = iwr.company_id_fk where  registered_by = ".$this->get_userId()."
LIMIT $starting_index , 5 ");
                    $this->load->view("uDashboard/cooffice_renews",$data);
                }
   
		function searchGma(){
			 $searchstr =  $_REQUEST['searchstr'];
			 $db_obj = $this->load->module("db_api");
			
			 if($_REQUEST['str']=='Gma'){
			 
			$data['genericresults'] = $db_obj->custom("SELECT rec_aid as id , campaign_name as name ,ogm.total_cost as amount,end_date as enddate   FROM `onetwork_gm_advertisments` as ogm   
			                                          inner join pb_transactions as pb on pb.transaction_aid = ogm.transaction_aid_fk
												
			                                          where  campaign_name like '%".$searchstr ."%' and created_by=".$this->get_userId());
			$this->load->view("generic_view",$data);
			
			}else if($_REQUEST['str']=='Promotions'){
				$data['genericresults'] = $db_obj->custom("SELECT rec_aid as id , promo_name as name ,op.total_cost as amount ,promotion_end_time as enddate    FROM  `onetwork_promotions` as op
			                             inner join pb_transactions as pb on pb.transaction_aid = op.transaction_id_fk
												
			 where promo_name like '%".$searchstr ."%'  and created_by=".$this->get_userId() );
			$this->load->view("generic_view",$data);
			 
				
				
				}else if($_REQUEST['str']=='Wordbyads'){
				$data['genericresults'] = $db_obj->custom("SELECT  ows.rec_aid as id ,ows.name as name ,ows.amount ,ads_end_time as enddate   FROM  `onetwork_wordbuy_ads`  as ows 
												inner join pb_transactions as pb on pb.transaction_aid = ows.transaction_id_fk
												where name like '%".$searchstr ."%'  and created_by=".$this->get_userId());
			                                     $this->load->view("generic_view",$data);
			 
				
				
				}else{
					
					$data['genericresults'] = $db_obj->custom("SELECT rec_aid as id ,field_of_popularity as name ,status   FROM  `onetwork_official_badges` 
			
			                                       where field_of_popularity like '%".$searchstr ."%'  and requested_by=".$this->get_userId()); 
			          $this->load->view("official_badge",$data);
			 
					}
		}
    
}
