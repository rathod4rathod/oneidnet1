<?php
$this->load->module('templates');
$this->templates->app_header(); 
$this->templates->os_mainmenu();
?>
<!--Oneshop Content starts Here(Raviteja 31-12-2015)-->
<div class="oneshop_container_sectionnew">
    <div class="oneshop_container_middle_section mat10">
        <input type='hidden' id='hsearch_type' value="<?php echo $search_type;?>"/>
        <div class="oneshop_right_newcontainer mat15">
            <div class="oneshop_product_images mat10" style="padding-left:3px">                
            </div>
        </div>
        <div class="oneshop_left_newcontainer mat15 pab10" id="search_result">
            <div class="mab10">
                <div class="new_moduleSearchWrapper newwithCategory">
<!--                    <p><input type="text" id="search_term_txt" style="width:400px;height:17px;"/></p>-->
                    <div style="float:left">
                        <input type="text" id="search_term_txt" style="width:570px;height:32px;" value="<?php echo $search_term;?>"/>
                    </div>
                    <div class="newcategorySelection" id="search_prods">
                        <img class="newmoduleSearchIcon" src="<?php echo base_url().'assets/images/searchIcon.png'?>" id="search_prods_img">
                    </div>
                </div>
                <div id='search_div_result'>

                </div>
            </div>
	</div>
    </div>    

<!--Oneshop Content ends Here(vinod 19-05-2015)-->            
<?php
$this->templates->app_footer(); 
?>
<script type="text/javascript">
    $.get(oneshop_url+'/home/search_result',{search_type:$("#hsearch_type").val(),search_term:$("#search_term_txt").val()},function(data){
        var result=data.trim();
        $("#search_div_result").html(result);
    });
    $("#search_prods_img").click(function(){
        var search_ter=$("#search_term_txt").val();
        if(search_ter!=""){
            $.ajax({
                type:"post",
                data:{search_type:$("#hsearch_type").val(),search_term:search_ter},
                url: oneshop_url+"/home/search_result",
                success:function(data){
                    var result=data.trim();
                    $("#search_div_result").html(result);
                }
            });
        }
    });
    $("#search_term_txt").keydown(function(e){
        if(e.keyCode==13){
            var search_ter=$(this).val();
            if(search_ter!=""){
                $.ajax({
                    type:"post",
                    data:{search_type:$("#hsearch_type").val(),search_term:search_ter},
                    url: oneshop_url+"/home/search_result",
                    success:function(data){
                        var result=data.trim();
                        $("#search_div_result").html(result);
                    }
                });
            }
        }
    });
</script>
