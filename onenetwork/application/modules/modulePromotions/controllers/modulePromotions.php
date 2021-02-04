<?php
header("Access-Control-Allow-Origin: *");
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
define("PROTOCAL", $protocol);
if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "192.168.0.100") {
    define("TUNNEL_URL", $protocol . $_SERVER['SERVER_NAME'] . "/tunnel/");
    define("ONESHOPL_URL", $protocol . $_SERVER['SERVER_NAME'] . "/oneshop/");
    define("CLICK_URL", $protocol . $_SERVER['SERVER_NAME'] . "/click/");
    define("DEALERX_URL", $protocol . $_SERVER['SERVER_NAME'] . "/dealerx/");
    define("COFFICE_URL", $protocol . $_SERVER['SERVER_NAME'] . "/coffice/");
    define("NETPRO_URL", $protocol . $_SERVER['SERVER_NAME'] . "/netpro/");
} else {
    define("TUNNEL_URL", "https://tunnel.oneidnet.com/");
    define("ONESHOPL_URL", "https://oneshop.oneidnet.com/");
    define("CLICK_URL", "https://click.oneidnet.com/");
    define("DEALERX_URL", "https://dealerx.oneidnet.com/");
    define("COFFICE_URL", "https://coffice.oneidnet.com/");
    define("NETPRO_URL", "https://netpro.oneidnet.com/");
}

class modulePromotions extends CI_Controller {
    function __construct() {
        parent::__construct();
        $ckobj = $this->load->module("cookies");
         if (isset($_REQUEST["skey"])) {
            $this->load->module("session_restart");
            if (isset($_REQUEST["skey"])) {
                $this->session_restart->key_check($_REQUEST["skey"]);
            }
        }
    }

    function index() {
        
    }

    function get_userId() {
        $obj = $this->load->module('cookies');
        return $obj->getUserID();
    }

//by venkatesh march-16-2015
    function promotionDisplay() {
        if (isset($_REQUEST["userid"])) {
            $uid = $_REQUEST["userid"];
        } else {
            $uid = $this->get_userId();
        }
        $qur = "select op.rec_aid as promotionId,op.promo_name,op.promo_type,op.entity_id from onetwork_promotions op left join onetwork_promotion_targets opt on op.rec_aid=opt.promotion_id_fk"
                . " where op.promo_type='" . $_REQUEST["prmotype"] . "'  and opt.target_id_fk=" . $uid . " and `promotion_end_time`>now() order by rand() limit 4";

        if (isset($_REQUEST["p_c_id"])) {
            $qur = "select op.rec_aid as promotionId,op.promo_name,op.promo_type,op.entity_id from onetwork_promotions op left join onetwork_promotion_targets opt on op.rec_aid=opt.promotion_id_fk"
                    . " where promo_type='" . $_REQUEST["prmotype"] . "' and opt.target_id_fk=" . $uid . " and op.rec_aid not in (" . implode(",", $_REQUEST["p_c_id"]) . ")  and `promotion_end_time`>now()  order by rand() limit 1";
        }

        $db_obj = $this->load->module("db_api");
        $rlt = $db_obj->custom($qur);

        for ($i = 0; $i < count($rlt); $i++) {
            if ($rlt[$i]["promo_type"] == "TUNNEL_CHANNELS") {
                $rlt[$i]["entity_details"] = $this->tunnelChannelDetails($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "TUNNEL_VIDEOS") {
                $rlt[$i]["entity_details"] = $this->tunnelVideoDetails($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "CLICK_PAGES") {

                $rlt[$i]["entity_details"] = $this->ClickPagespromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "CLICK_GROUPS") {
                $rlt[$i]["entity_details"] = $this->ClickGroupsPromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "CLICK_EVENTS") {
                $rlt[$i]["entity_details"] = $this->ClickEventsPromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "NETPRO_GROUPS") {
                $rlt[$i]["entity_details"] = $this->netproGroupPromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "ONESHOP_STORES") {
                $rlt[$i]["entity_details"] = $this->oneshopStorePromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "ONESHOP_PRODUCTS") {
                $rlt[$i]["entity_details"] = $this->oneshopProductPromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "DEALERX_PROFILE") {
                $rlt[$i]["entity_details"] = $this->dealerxProfilePromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "DEALERX_AUCTION") {
                $rlt[$i]["entity_details"] = $this->dealerxAuctionPromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "COFFICE_PROFILE") {
                $rlt[$i]["entity_details"] = $this->cofficeprofilepromoview($rlt[$i]["entity_id"], $db_obj);
            } else if ($rlt[$i]["promo_type"] == "COFFICE_JOBS") {
                $rlt[$i]["entity_details"] = $this->cofficeJobsPromoview($rlt[$i]["entity_id"], $db_obj);
            }
        }
        $data["promodata"] = $rlt;
        $this->load->view("pomotions_view", $data);
    }

    //by venkatesh march-16-2016
    function cofficeJobsPromoview($entity_id, $db_obj) {
        $rlt = $db_obj->custom("SELECT cj.`job_id`,cj.`role` as promo_name,ie.logo_path as promo_image FROM `co_jobs` cj left join iws_employers ie on cj.company_id_fk=ie.company_aid WHERE `job_id`=" . $entity_id);
        $rlt[0]["promo_image"] = COFFICE_URL . "data/images/logo/si/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = COFFICE_URL . "home/jobview/" . bin2hex($rlt[0]["job_id"]);
        return $rlt;
    }

    function cofficeprofilepromoview($entity_id, $db_obj) {
        $rlt = $db_obj->custom("SELECT `company_aid`,`company_name` as promo_name,`logo_path` as promo_image FROM `iws_employers` WHERE `company_aid`=" . $entity_id);
        $rlt[0]["promo_image"] = COFFICE_URL . "data/images/logo/si/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = COFFICE_URL . "profile/companyProfile/" . bin2hex($rlt[0]["company_aid"]);
        return $rlt;
    }

    //by venkatesh march-16-2016
    function dealerxAuctionPromoview($entity_id, $db_obj) {
//        echo "SELECT auction_id,promo_name, (select img_name from dx_auction_media where auction_id_fk=auction_id limit 1) as promo_image FROM `dx_auctions` WHERE auction_id=" . $entity_id;
        $rlt = $db_obj->custom("SELECT auction_id,auction_name as promo_name, (select img_name from dx_auction_media where auction_id_fk=auction_id limit 1) as promo_image FROM `dx_auctions` WHERE auction_id=" . $entity_id);
        $rlt[0]["promo_image"] = DEALERX_URL . "dealer/auctions/si/" . current(explode(",", $rlt[0]["promo_image"]));
        $rlt[0]["url"] = DEALERX_URL . "bids/auctionDetailedView?auction_id=" . $rlt[0]["auction_id"];
        $rlt[0]["module_logo"] = DEALERX_URL . "assets/images/dealerxLogo.png";

        return $rlt;
    }

    //by venkatesh march-16-2106
    function dealerxProfilePromoview($entity_id, $db_obj) {

        $rlt = $db_obj->select("dealer_token,company_name as promo_name,logo as promo_image", "dx_dealers", "dealer_id=" . $entity_id);
        $rlt[0]["promo_image"] = DEALERX_URL . "dealer/logo/mi/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = DEALERX_URL . "dealers/dealers_Publicprofile/" . $rlt[0]["dealer_token"];
        $rlt[0]["module_logo"] = DEALERX_URL . "assets/images/dealerxLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function oneshopProductPromoview($entity_id, $db_obj) {
        $rlt = $db_obj->custom("select osp.product_aid,osp.product_code,osp.primary_image,osp.product_name as promo_name,osp.primary_image as promo_image,os.store_code
        from oshop_products osp left join oshop_stores os on osp.store_id_fk=os.store_aid where product_aid=" . $entity_id);
        if ($rlt[0]["promo_image"]) {
            $rlt[0]["promo_image"] = ONESHOP_URL . "/stores/" . $rlt[0]["store_code"] . "/products/" . $rlt[0]["product_aid"] . "/si/" . $rlt[0]["promo_image"];
        } else {
            $rlt[0]["promo_image"] = ONESHOP_URL . "assets/images/default.png";
        }
        $rlt[0]["url"] = ONESHOP_URL . "product_detail_view/" . $rlt[0]["store_code"] . "/" . $rlt[0]["product_code"];
        $rlt[0]["module_logo"] = ONESHOP_URL . "assets/images/oneshopLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function oneshopStorePromoview($entity_id, $db_obj) {
        $rlt = $db_obj->select("store_code,store_name as promo_name,profile_image_path as promo_image", "oshop_stores", "store_aid=" . $entity_id);
        if ($rlt[0]["promo_image"]) {
            $rlt[0]["promo_image"] = ONESHOP_URL . "stores/ST1073/logo/li/" . $rlt[0]["promo_image"];
        } else {
            $rlt[0]["promo_image"] = ONESHOP_URL . "assets/images/default.png";
        }
        $rlt[0]["url"] = ONESHOP_URL . "store_home/" . $rlt[0]["store_code"];
        $rlt[0]["module_logo"] = ONESHOP_URL . "assets/images/oneshopLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function netproGroupPromoview($entity_id, $db_obj) {
        $rlt = $db_obj->select("group_code,group_name as promo_name,logo_img_path as promo_image", "netpro_groups", "group_id=" . $entity_id);
        $rlt[0]["promo_image"] = NETPRO_URL . "ndata/group_data/logos/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = NETPRO_URL . "groups/getGroupabout_Info/" . $rlt[0]["group_code"];
        $rlt[0]["module_logo"] = NETPRO_URL . "assets/images/netproLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function ClickEventsPromoview($entity_id, $db_obj) {
        $rlt = $db_obj->select("event_code,created_by,event_subject as promo_name,event_image as promo_image", "click_events", "event_aid=" . $entity_id);
        $rlt[0]["promo_image"] = CLICK_URL . "udata/" . $rlt[0]["created_by"] . "/events/" . $rlt[0]["event_code"] . "/si/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = CLICK_URL . "home/eventDetailedView?ecd=" . base64_encode(base64_encode($rlt[0]["event_code"]));
        $rlt[0]["module_logo"] = CLICK_URL . "assets/images/clickLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function ClickGroupsPromoview($entity_id, $db_obj) {
        $rlt = $db_obj->select("group_aid,group_code,created_by,group_name as promo_name,logo_path as promo_image", "click_groups", "group_aid=" . $entity_id);
        $rlt[0]["promo_image"] = CLICK_URL . "udata/" . $rlt[0]["created_by"] . "/groups/" . $rlt[0]["group_code"] . "/avatar/mi/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = CLICK_URL . "groups/groupView?group_id=" . base64_encode(base64_encode($rlt[0]["group_aid"]));
        $rlt[0]["module_logo"] = CLICK_URL . "assets/images/clickLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function ClickPagespromoview($entity_id, $db_obj) {

        $rlt = $db_obj->select("page_code,created_by,page_name as promo_name,logo_path as promo_image", "click_pages", "page_aid=" . $entity_id);

        $rlt[0]["promo_image"] = CLICK_URL . "udata/" . $rlt[0]["created_by"] . "/pages/" . $rlt[0]["page_code"] . "/avatar/mi/" . $rlt[0]["promo_image"];
        $rlt[0]["url"] = CLICK_URL . "pages/pageMain?pud=" . $rlt[0]["page_code"];
        $rlt[0]["module_logo"] = CLICK_URL . "assets/images/clickLogo.png";
        return $rlt;
    }

    //by venkatesh march-16-2106
    function tunnelChannelDetails($entity_id, $db_obj) {
        $rlt = $db_obj->select("channel_id,channel_name as promo_name,channel_logo_image_path as promo_image", "tunnel_all_channels", "rec_id=" . $entity_id);
        if ($rlt[0]["promo_image"]) {
            $rlt[0]["promo_image"] = TUNNEL_URL . "data/images/channels/logo/mi/" . end(explode("/", $rlt[0]["promo_image"]));
        } else {
            $rlt[0]["promo_image"] = TUNNEL_URL . "assets/images/channel_logo.jpg";
        }
        $rlt[0]["url"] = TUNNEL_URL . "channels/channel_page/" . $rlt[0]["channel_id"];
        $rlt[0]["module_logo"] = TUNNEL_URL . "assets/images/tunnelLogo.png";
        return $rlt;
    }

//by venkatesh march-17
    function tunnelVideoDetails($entity_id, $db_obj) {
        $rlt = $db_obj->select("video_id,video_name as promo_name,thumbnail_path as promo_image", "tunnel_all_videos", "rec_id=" . $entity_id);
        $rlt[0]["promo_image"] = TUNNEL_URL . "data/images/videos-thumb/mi/" . end(explode("/", $rlt[0]["promo_image"]));
        $rlt[0]["url"] = TUNNEL_URL . "home/run/" . $rlt[0]["video_id"];
        $rlt[0]["module_logo"] = TUNNEL_URL . "assets/images/tunnelLogo.png";
        return $rlt;
    }

//by venkatesh march-17
    function promoupdate() {
        $pid = $_GET["pid"];
        $eid = $_GET["eid"];
        $ulid = $_GET["ulid"];
        $uid = $this->get_userId();
        $dbobj = $this->load->module("db_api");
        if ($dbobj->custom("update onetwork_promotion_targets set total_views=total_views+1,total_clicks=total_clicks+1 where promotion_id_fk=" . $pid . " and target_id_fk=" . $uid) == 0) {
            redirect(hex2bin($ulid));
        }
    }

    //by venkatesh may-17-2016 
    function advertiseDisplay() {
        if (isset($_REQUEST["userid"])) {
            $uid = $_REQUEST["userid"];
        } else {
            $uid = $this->get_userId();
        }
        $prmotype = $_REQUEST["prmotype"];
        $qur = "SELECT oga.rec_aid,oga.`campaign_code`,oga.`campaign_name`,oga.`campaign_text`,oga.uploaded_file_name,oga.url_for_redirection,oga.`optional_secondline_text`,oga.source_type,oga.`module_target`,`inside_entity_type`,`inside_entity_id`,size FROM `onetwork_gm_advertisments` oga left join onetwork_gma_targets ogt on oga.rec_aid=ogt.gma_aid_fk WHERE oga.`start_date`<=now() and oga.`end_date`>=now() and oga.module_target like '%$prmotype%' and   oga.size in('PERFECT_SQUARE', 'HALF_VERTICULAR') and ogt.user_id_fk=" . $uid . "  and end_date>now()   order by rand() limit 4";
        if (isset($_REQUEST["gmaadvertise"])) {
            $qur = "SELECT oga.rec_aid,oga.`campaign_code`,oga.`campaign_name`,oga.`campaign_text`,oga.uploaded_file_name,oga.url_for_redirection,oga.`optional_secondline_text`,oga.source_type,oga.`module_target`,`inside_entity_type`,`inside_entity_id`,size FROM `onetwork_gm_advertisments` oga left join onetwork_gma_targets ogt on oga.rec_aid=ogt.gma_aid_fk WHERE oga.`start_date`<=now() and oga.`end_date`>=now() and oga.module_target like '%$prmotype%' and   oga.size in('PERFECT_SQUARE', 'HALF_VERTICULAR') and ogt.user_id_fk=" . $uid . " and oga.rec_aid not in (" . implode(",", $_REQUEST["p_c_id"]) . ") and end_date>now()   order by rand() limit 1";
        }
        
        $dbobj = $this->load->module("db_api");
        $data["adv"] = $dbobj->custom($qur);
        $this->load->view("advertisements", $data);
    }

}
