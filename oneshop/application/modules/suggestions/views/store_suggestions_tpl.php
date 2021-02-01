  <ul class="storesugg_wrap">
<?php
  $i=1;
  foreach ($stores_data as $srows) {
    $store_url = base_url() . 'store_home/' . $srows["store_code"];
    $store_logo_url = base_url() . "assets/images/default_store.png";
    if ($srows["profile_image_path"] != "" ) {
        $store_logo_url = base_url() . 'stores/' . $srows["store_code"] . "/logo/si/" . $srows["profile_image_path"];
    }
    if(strlen($srows["store_name"])>15){
      $store_name_label=ucwords(substr($srows["store_name"],0,15))."..";
    }
    else{
      $store_name_label=ucwords($srows["store_name"]);
    }
    //echo $store_logo_url;
?>
<li><!--channelitem start here--> 
        <input type="hidden" id="hstore_aid" value="<?php echo $srows['store_aid']?>"/>            
            <div id="<?php echo $srows['store_aid']?>">
                    <a href="<?php echo $store_url ?>"  title="<?php echo $srows["store_name"]?>"><img alt="<?php echo $srows["store_name"] ?>" title="<?php echo $srows["store_name"] ?>" class="imgitem_two" src="<?php echo $store_logo_url ?>"> 
                    <h4><?php echo $store_name_label; ?></h4> </a>
                   <input type="button" name="button" class="btn-suggestion" value="Follow" id="store_follow<?php echo $i?>">
			</div>
</li>
<?php
    $i++;
}
?>
</ul>    

<?php /*?><div class="channelitem"><!--channelitem start here--> 
        <input type="hidden" id="hstore_aid" value="<?php echo $srows['store_aid']?>"/>            
        <div class="channelitem">
            <div class="videoitems_box_newbox_three"><!--channelitem in start here-->
                <div class="leftchannelitem_storesug">
                    <a href="<?php echo $store_url ?>"><img alt="<?php echo $srows["store_name"] ?>" title="<?php echo $srows["store_name"] ?>" class="imgitem_two" src="<?php echo $store_logo_url ?>"> </a>
                </div>

                <div class="rightchannelitem_storeright" id="<?php echo $srows['store_aid']?>">
                    <p class="mar10 bold pat5"><a href="<?php echo $store_url ?>" title="<?php echo $srows["store_name"]?>"><?php echo $store_name_label; ?> </a></p>
                    <p class="flr clearfix"><input type="button" name="button" class="btn-suggestion" value="Follow" id="store_follow<?php echo $i?>"> </p>
                </div>
            </div><!--channelitem in closed here-->
        </div>
    </div><?php */?>

<script type="text/javascript">
    // store follow functionality
    $("input[id^='store_follow']").click(function(){
        var store_follow_id=$(this).attr("id");
        var store_div=$("#"+store_follow_id).parents("div").attr("id");
        callAJAX(oneshop_url+"/suggestions/followStore",{store_id:store_div},function(data){
            var res=data.trim();
            $("#store_suggestions_div").html(res);
        },function(){
            $("#"+store_follow_id).css("disabled",true);
        });
    });
</script>