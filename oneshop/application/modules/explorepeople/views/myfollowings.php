<?php
$this->load->module('templates');
$this->templates->app_header();
$this->templates->os_mainmenu();
?>
<script type="text/javascript" src="<?php echo base_url() . "assets/"; ?>microjs/explorepeople.js"></script>
 
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
        width: 25%;
    }
    .pImage img {
        height: 60px;
        width: 60px;
    }
    .pName {
        float: left;
        height: 60px;
        margin: 5px 0 0;
        width:65%;
    }
    .pName h3 {
        font: bold 14px Arial;
        margin: 5px;
    }
    .followBtns {
        float: left;
        height: 18px;
        margin: 0px 5px 5px;
        width: 80%;
    }
    .box{    
        margin: 0 auto;
        width: 250px;
        height: 0;
        margin: 7px;
        float: right;
    }
</style>
<!--Oneshop Content starts Here(vinod 19-05-2015)-->
<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">
      
       
         <div class="left_oontainer">
         <div class="hd_heading">
             <h1>Connections<span></span></h1>
             <input type="text" class="box" name="serchConnection" placeholder="Search Connection" id="serchConnection" >
            </div>
            <div style="clear: both;"></div>
            <div class="wi100pstg " id="user_following">
                
            </div>
            <div class="osdes_rightbar_headingsbg_wrap mat20"  id="oneshop_nomoredata"  style="display:none">
                        <div class="nodata_found_bgwrap">
                        <p>  No  Data </p>
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
    var starting_index = 0;
    $(function() {
        $('#serchConnection').keyup(function ()  {            
                dataLoading($("#serchConnection").val(),'html');            
        });
    });
    function dataLoading(serchConnection,flag) {
        var mydata = {start_id: starting_index};
        if(serchConnection !='none'){
            mydata = {start_id: starting_index,serchConnection: serchConnection};
        }
      

        // alert(mydata);
        $.ajax({
            type: "POST",
            url: oneshop_url + "/explorepeople/userFollowings",
            data: mydata,
            success: function (data) {				
                if ($.trim(data)!=0) {
                    $('#user_following').css("display","block");
                    $('#oneshop_nomoredata').css("display","none");
                    if(flag == 'append'){
                        $('#user_following').append(data);
                    }else{
                        $('#user_following').html(data);                        
                    }
                  //  $('#netdev_nomoreconnections').css("display","none");
                }
                else
                {
                    next_connection_flag= false;
                    $('#user_following').css("display","none");
                    $('#oneshop_nomoredata').css("display","block");

                }
            }
        });
    }
    var next_connection_flag= true;
    $(window).scroll(function () {
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            if(next_connection_flag){
            dataLoading('none','html');
            starting_index = starting_index + 20;
            }
        }
    });

</script>


