<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu("explorepeople");
?>

 
<style type="text/css">
    .result {
        background: #F4F4F4;
        box-shadow: 0 0 5px #222;
        float: left;
        height: 75px;
        margin: 1%;
        width: 31%;
    }
    .pImage {
        float: left;
        height: 60px;
        margin: 5px;
        max-width: 30%;
        min-width: auto;
    }
    .pImage img {
        height: 60px;
        width: 60px;
    }
    .pName {
        float: left;
        height: 60px;
        margin: 5px 0 0;
        width: auto;
        max-width: 60%;
    }
    
    .followBtns {
        float: left;
        height: 18px;
        margin: 1% 5px 5px;
        width: 160px;
    }
</style>
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">
      
       
         <div class="left_oontainer">
         	<div class="hd_heading">
            	<h1>Explore People <span></span></h1>
            </div>
            <strong style="font-size: 15px">Search Product : </strong>
            <input type="text" id="searchparam" class="input" style="width: 30%;" name="searchparam" placeholder="Search People Here..." value="">
            <br />
            <br />
            <div class="wi100pstg" id="explore_peopledata">
                
            </div>
            <div class="osdes_rightbar_headingsbg_wrap mat20"  style="display:none;" id="oneshop_nomoredata" >
 
    <div class="nodata_found_bgwrap">
        <p>  Sorry, no more people to show at the moment! </p>        
    </div>
    
</div>
            
        </div>
         
        <div class="right_container">
            <?php
            $this->load->module("suggestions");
            $this->suggestions->getStoreSuggestions();
            $this->suggestions->getProductSuggestions();
            ?>
        </div>
    </div>
</div>
       <?php
$this->templates->app_footer();
?>
<script type="text/javascript">
    var starting_index = 20;
//alert(oneshop_url+ "/explorepeople/explorePeopledata");
    dataLoading();
    function dataLoading() {
        $.ajax({
            type: "POST",
            url: oneshop_url+ "/explorepeople/explorePeopledata",
            data: {start_id: starting_index},
            success: function (data) {
				
                if ($.trim(data)!=0) {
					
                   $('#explore_peopledata').append(data);
                   $('#oneshop_nomoredata').css("display","none");
                }
                else
                {
                    next_connection_flag= false;
                    $('#oneshop_nomoredata').css("display","block");

                }
            }
        });
        starting_index = starting_index + 20;
    }
    var next_connection_flag= true;
    $(window).on('scroll',function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            if(next_connection_flag){
            dataLoading();
            }
        }
    });

    $("#searchparam").keyup(function(e){
        var search_val=$(this).val();
        // if(e.keyCode==13){
            if(search_val.trim()!=""){
                $.ajax({
                    type:"post",
                    data:{search_val:search_val},
                    url: oneshop_url+"/explorepeople/getExplorePeople",
                    success:function(data){
                        if ($.trim(data)!=0) {
                            $("#explore_peopledata").html(data);
                            $('#oneshop_nomoredata').css("display","none");
                        }
                        else
                        {
                            $('#oneshop_nomoredata').css("display","block");
                        }
                    }
                });
                //$("#product_search_form #searchparam").val(search_val);
                //$("#product_search_form").submit();                
            }
            else{
                dataLoading();
            }
        // }
    });

</script>

<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>microjs/explorepeople.js"></script>
