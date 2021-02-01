<?php
$this->load->module("templates");
$this->templates->basic_info_header();
$this->templates->basic_info_subheader();
//print_r($profiles_data);
$registered_date=date("M d,Y H:ia",strtotime($profiles_data[0]["reg_date"]));
?>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/canvasjs.min.js"></script>
<div class="np_des_module_container_wrap"> <!--module_container start here-->
    <div class="hotel_pachagesummary_box fll">
        <div id="documenter_sidebar">
            <ul id="documenter_nav">
                <div class="overflow"> <span class="fll np_des_mar5"><img src="<?php echo BASEINFO_PATH; ?>images/STATISTICS.png"> </span> <h2 class="fs18 normal np_des_mab40 np_des_mat10"> STATISTICS </h2> </div>
                <li><a href="#" class="current"> General Statistics   </a></li>
<!--                <li><a href="#"> Heading Here </a></li>-->
            </ul>

        </div>
    </div>

    <div class="right_container_wrap2">

        <div id="documenter_content" style="margin-top:65px;">
            <h1 class="wi100pstg os_des_borderbottom os_des_pab5 normal np_des_mab10"> General Statistics <span style="float:right;font-size:12px">Data calculated since <?php echo $registered_date;?></span></h1>
            <div class="statistics_total_wqrap np_des_mat25" >

<!--                <div class="statistics_graph">
                    <div class="fll np_des_mab10">
                        <select class="flight_selectbox_one fll">
                            <option value="">Select</option>
                            <option value="1">Subject 1</option>;
                            <option value="2">Subject 2</option>
                            <option value="3">Subject 3</option>
                            <option value="4">Subject 4</option>
                        </select>
                        <select class="flight_selectbox_one fll">
                            <option value="">Select</option>
                            <option value="1">Subject 1</option>;
                            <option value="2">Subject 2</option>
                            <option value="3">Subject 3</option>
                            <option value="4">Subject 4</option>
                        </select>
                        <input type="button" class="button_go flr" value="GO">
                    </div>
                    <div class="statistics_main_wrapper clearfix">
                        <div class="statistics_graphs_box_div"> <img alt="icon" src="<?php echo BASEINFO_PATH; ?>images/graph1.jpg"> </div>
                    </div>
                    <p class="acenter np_des_mat5 bold lh30 fll fs14"> Time Spent in ONEIDNET </p>
                </div>-->
                <div class="statistics_graph">
                    <div class="fll np_des_mab10">
<!--                        <select class="flight_selectbox_one fll">
                            <option value="">Select</option>
                            <option value="1">Subject 1</option>;
                            <option value="2">Subject 2</option>
                            <option value="3">Subject 3</option>
                            <option value="4">Subject 4</option>
                        </select>
                        <input type="button" class="button_go flr" value="GO">-->
                    </div>
                    <div class="statistics_main_wrapper clearfix" id="module_tspent" style="margin-top:27px;">

                    </div>
                </div>

                <div class="statistics_graph">
                    <div class="fll np_des_mab10">
                        <select class="flight_selectbox_one fll" id="device_select">
                            <option value="All">All</option>
                            <option value="Computer">Computer</option>;
                            <option value="Mobile">Mobile</option>
                            <option value="Tab">Tab</option>
                        </select>
                        <input type="button" class="button_go flr" id="device_btn" value="GO">
                    </div>
                    <div class="statistics_main_wrapper clearfix" id="login_attempts">

                    </div>
                    <!--<p class="acenter np_des_mat5 bold lh30 fll fs14"> Login Attempt Devices -Browser-Operating System </p>-->
                </div>

                <div class="statistics_graph">
                    <div class="fll np_des_mab10">
                        <select class="flight_selectbox_one fll" id="soc_pro_select">
                            <option value="All">All</option>
                            <option value="Social">Social</option>;
                            <option value="Professional">Professional</option>
                            <option value="Utilities">Utilities</option>
                        </select>
                        <input type="button" class="button_go flr" id="soc_pro_btn" value="GO">
                    </div>
                    <div class="statistics_main_wrapper clearfix" id="soc_pro_div">
<!--                        <div class="statistics_graphs_box_div"> <img alt="icon" src="<?php echo BASEINFO_PATH; ?>images/graph1.jpg"> </div>-->
                    </div>
<!--                    <p class="acenter np_des_mat5 bold lh30 fll fs14"> Social vs Professional </p>-->
                </div>


            </div>

        </div>

    </div>

</div> <!--module container end here-->

<div class="clearfix"></div>
<script type="text/javascript">
  var login_json="";
  var time_spent_json="";
  var soc_pro_json="";
  $.getJSON( oneidnet_url+"statistics/getMWTimeSpentChart",function (result) {
    time_spent_json=result;
            var chart = new CanvasJS.Chart("module_tspent", {
                width:350,
                title:{
                  text:"Hours Spents Per Module",
                  fontSize:12,
                  horizontalAlign:"center",
                  verticalAlign:"bottom",
                },
                data: [
                    {
                        type:"pie",
                        indexLabelPlacement:"inside",
                        indexLabelFontColor: "yellow",
                        dataPoints: result
                    }
                ]
            });
            chart.render();
        });

        $.getJSON( oneidnet_url+"statistics/getLoginAttemptsChart",{device_type:$("#device_select").val()},function (result) {
          loginChart(result,"");
        });
      $("#device_btn").click(function(){
        var device_sel_val=$("#device_select").val();
        //var json_data=$.parseJSON(login_json);
        var all_devices_cnt=0;
        var arry=[];
        var selected_cnt=0;
        var json_str="";
        if(device_sel_val!=="All"){
        for(var key in login_json){
          if(login_json.hasOwnProperty(key)){
            if(login_json[key]["name"]===device_sel_val){
              //alert(login_json[key]["y"]);
              selected_cnt=parseInt(login_json[key]["y"]);
              arry.push({x:login_json[key]["x"],y:login_json[key]["y"],name:login_json[key]["name"]});
            }
            all_devices_cnt+=parseInt(login_json[key]["y"]);
          }
        }
        var remaining_cnt=all_devices_cnt-selected_cnt;
        arry.push({x:"Remaining",y:remaining_cnt,name:"Remaining"});
        json_str=JSON.parse(JSON.stringify(arry));
        }else{
            json_str=login_json;
        }
        loginChart(json_str,"filter");
      });
      function loginChart(result,mode){
        if(mode===""){
          login_json=result;
        }
        //alert("login chart");
        var lchart = new CanvasJS.Chart("login_attempts", {
              width:350,
              title:{
                text:"Login Attempts Based on Devices",
                fontSize:12
              },
              data: [
                  {
                      type:"pie",
                      indexLabelPlacement:"inside",
                      indexLabelFontColor: "yellow",
                      dataPoints: result
                  }
              ]
          });
          lchart.render();
      }
      $.getJSON(oneidnet_url+"statistics/getSocProChart",function (result) {
          socialProChart(result,"All");
      });
      $("#soc_pro_btn").click(function(){
        var mode=$("#soc_pro_select").val();
        var all_modules_cnt=0;
        var arry=[];
        var selected_cnt=0;
        var json_str="";
        if(mode!="All"){
            for(var key in soc_pro_json){
              if(soc_pro_json.hasOwnProperty(key)){
                if(soc_pro_json[key]["name"]===mode){
                  //alert(login_json[key]["y"]);
                  selected_cnt=parseInt(soc_pro_json[key]["y"]);
                  arry.push({x:soc_pro_json[key]["x"],y:soc_pro_json[key]["y"],name:soc_pro_json[key]["name"]});
                }
                all_modules_cnt+=parseInt(soc_pro_json[key]["y"]);
              }
            }
            var remaining_cnt=all_modules_cnt-selected_cnt;
            arry.push({x:"Remaining",y:remaining_cnt,name:"Remaining"});
            json_str=JSON.parse(JSON.stringify(arry));
        }
        else{
            json_str=soc_pro_json;
        }
        //var json_str=JSON.stringify(arry);
        socialProChart(json_str,"filter");
      });
      function socialProChart(result,type){
        if(type=="All"){
          soc_pro_json=result;
        }
        var spchart = new CanvasJS.Chart("soc_pro_div", {
            width:350,
            title:{
              text:"Social Vs Professional Vs Commercial",
              fontSize:12,
              horizontalAlign:"center",
              verticalAlign:"bottom"
            },
            data: [
                {
                    type:"pie",
                    indexLabelPlacement:"inside",
                    indexLabelFontColor: "yellow",
                    dataPoints: result
                }
            ]
        });
        spchart.render();
      }
</script>
<?php $this->templates->basic_info_footer(); ?>
