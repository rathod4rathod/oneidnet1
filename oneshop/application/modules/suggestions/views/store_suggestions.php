<script src="<?php echo base_url() . "assets/scripts/"; ?>promotionModel.js" type="text/javascript"></script>
<link href="<?php echo base_url() . "assets/css/"; ?>promotionAdds.css" rel="stylesheet" type="text/css">

<div class="video_list" id="promotions2" promotetype="ONESHOP_STORES" style="display:none;">    
    ONESHOP STORES
</div>

<div class="video_list" id="promotions1" promotetype="ONESHOP_PRODUCTS" style="display:none;">  
    ONESHOP PRODUCTS
</div>
<div class="video_list" id="gmaadvertise" promotetype="ONESHOP"></div>

<div class="quicklinkwrap"> 
    <div class="right_container_head" class="homepage-one-store">
        <h3> Store Suggestions </h3>
    </div>
    <div class="clearfix"></div>
    <div id="store_suggestions_div">
    
    </div>
</div>
<script type="text/javascript">    
    $.get(oneshop_url+"/suggestions/getStoreSuggestionsTpl",function(data){
        $("#store_suggestions_div").html(data);
    });
</script>