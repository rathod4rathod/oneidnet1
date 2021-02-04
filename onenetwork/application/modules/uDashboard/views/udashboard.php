<?php
$this->load->module('templates');
$this->templates->header();
$this->templates->onenet_header("administration");
?>
<style>
   .searchstring,.searchstring1{text-transform: capitalize;}
    
</style>          
            <link href="<?php echo base_url().'assets/css/reports.css';?>" rel="stylesheet" type="text/css">
            <link href="<?php echo base_url().'assets/css/font-awesome.min.css';?>" rel="stylesheet" type="text/css">
        
           

        <div class="new_wrapper">



<div class="master-division">
                <div class="insights-body">
                    <div class="insights-row">
                        <div class="wid100">
                            <div class="insights-row">
                                <div class="wid25">
                                    <div class="insightbox bg-white radius-bordered">
                                        <div class="insightbox-left bg-colorsecondary">
                                            <div class="insightbox-piechart">
                                                <div data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;"><canvas width="47" height="47"></canvas></div>
                                            </div>
                                        </div>
                                        <div class="insightbox-right">
                                            <span class="insightbox-number colorsecondary"><?php echo $promotioncount[0]['promotioncount'] ?></span>
                                            <div class="insightbox-text darkgray">TOTAL PROMOTIONS</div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="wid25">
                                    <div class="insightbox bg-white radius-bordered">
                                        <div class="insightbox-left bg-colorthirdcolor">
                                            <div class="insightbox-piechart">
                                                <div data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="15" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.2)" style="width: 47px; height: 47px; line-height: 47px;"><canvas width="47" height="47"></canvas></div>
                                            </div>
                                        </div>
                                        <div class="insightbox-right">
                                            <span class="insightbox-number colorthirdcolor"><?php echo $wordbuyadscount[0]['wordbuyadscount'] ?></span>
                                            <div class="insightbox-text darkgray">TOTAL WORDBUY ADS</div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="wid25">
                                    <div class="insightbox bg-white radius-bordered">
                                        <div class="insightbox-left bg-colorprimary">
                                            <div class="insightbox-piechart">
                                                <div id="users-pie" data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;"><span class="white f90pstg"></span><canvas width="47" height="47"></canvas></div>
                                            </div>
                                        </div>
                                        <div class="insightbox-right">
                                            <span class="insightbox-number colorprimary"><?php echo $officialbadgescount[0]['officialbadgescount'] ?></span>
                                            <div class="insightbox-text darkgray">TOTAL OFFICIAL BADGE REQUESTS</div>
                                            <div class="insightbox-state bg-colorprimary">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wid25">
                                    <div class="insightbox bg-white radius-bordered">
                                        <div class="insightbox-left bg-colorprimary">
                                            <div class="insightbox-piechart">
                                                <div id="users-pie" data-toggle="insightPieChart" class="insightPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;"><span class="white f90pstg"></span><canvas width="47" height="47"></canvas></div>
                                            </div>
                                        </div>
                                        <div class="insightbox-right">
                                            <span class="insightbox-number colorprimary"><?php echo $gmacount[0]['gmacount'] ?></span>
                                            <div class="insightbox-text darkgray">ALL GENERAL MARKETING & ADS</div>
                                            <div class="insightbox-state bg-colorprimary">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                

                            </div>
                        </div>
                    </div>
                    
                    
          <div class="insights-row wi100pstg overflow">
                        
                        
                         <div class="wid33">
                            <div class="tasks">
                                <div class="tasks-header bordered-bottom bordered-colorprimary">
                                    <i class="tasks-icon fa fa-tasks colorprimary"></i>
                                    <span class="tasks-caption colorprimary"> PROMOTIONS  </span> <a href="<?php echo base_url().'campaigns/campaignmonitor' ?>"> <span class=" colorprimary"> See all  </span></a>
                                </div><!--tasks Header-->
                                <div class="tasks-body no-padding">
                                    <div class="task-container">
                                        <div class="task-search">
                                            <span class="input-icon">
                                                <input type="text" class="insights-search-input" id="onetwork_searchpromotions" placeholder="Enter to search promotions by name">
                                                <i class="fa fa-search gray"></i>
                                            </span>
                                        </div>
                                        
                                        
<div class="promotions_scroll_box" id="onetworkpromotions_scroll">                                    
                                        
<ul class="tasks-list" id="onetwork_promotions">                             		                                     

</ul>
<ul class="tasks-list" id="onetwork_promotionsnodata" style="display:none">                             		                                     
<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">

<span class="user-name padding-5"> <?php echo "No data"; ?> </span>
</div>
<div class="task-time"> </div>
<div class="task-assignedto"></div>
</li>
</ul>
</div>                                          
                                        
                                        
                                    </div>
                                </div><!--tasks Body-->
                            </div>

                        </div>
                  
                                
                                
                                
                                
                                <div class="wid33">
                            <div class="tasks">
                                <div class="tasks-header bordered-bottom bordered-colorprimary">
                                    <i class="tasks-icon fa fa-tasks colorprimary"></i>
                                    <span class="tasks-caption colorprimary"> WORD BUY ADS  </span><a href=""> <span class=" colorprimary"> See all  </span></a>
                                </div><!--tasks Header-->
                                <div class="tasks-body no-padding">
                                    <div class="task-container">
                                        <div class="task-search">
                                            <span class="input-icon">
                                                <input type="text" class="insights-search-input" id="onetwork_searchwordbyads" placeholder="Enter to search word buy ads by name">
                                                <i class="fa fa-search gray"></i>
                                            </span>
                                        </div>
                                        <div class="promotions_scroll_box"  id="onetworkwordbuyads_scroll"  >                                    

                                        <ul class="tasks-list" id="onetwork_wordbuyads">
                                		
                                        </ul>
                                        <ul class="tasks-list" id="onetwork_wordbuyadsnodata" style="display:none" >
                                		<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">

<span class="user-name padding-5"> <?php echo "No data"; ?> </span>
</div>
<div class="task-time"> </div>
<div class="task-assignedto"></div>
</li>

                                		
                                        </ul>
                                        
                                        </div>
                                    </div>
                                </div><!--tasks Body-->
                            </div>

                        </div>
                                
                                
                          
                     <div class="wid33">
                            <div class="tasks">
                                <div class="tasks-header bordered-bottom bordered-colorprimary">
                                    <i class="tasks-icon fa fa-tasks colorprimary"></i>
                                    <span class="tasks-caption colorprimary"> GENERAL MARKETING & ADS </span><a href="<?php echo base_url().'gma/gmamonitor' ?>"> <span class=" colorprimary"> See all  </span></a>
                                </div><!--tasks Header-->
                                <div class="tasks-body no-padding">
                                    <div class="task-container">
                                        <div class="task-search">
                                            <span class="input-icon">
                                                <input type="text" class="insights-search-input"  id="onenetwork_gmasearch"  placeholder="Enter to search general marketing & ads by name">
                                                <i class="fa fa-search gray"></i>
                                            </span>
                                        </div>
                                          <div class="promotions_scroll_box" id="onetworkgeneralmarketing_scroll" >                                    

                                        <ul class="tasks-list"  id="onetwork_generalmarketing">
                                		
                                        

                                        </ul>
                                         <ul class="tasks-list"  id="onetwork_generalmarketingnodata" style="display:none" >
                                		
                                        
                                        <li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">

<span class="user-name padding-5"> <?php echo "No data"; ?> </span>
</div>
<div class="task-time"> </div>
<div class="task-assignedto"></div>
</li>

                                        </ul>
                                        
                                    </div> 
                                    
                                    </div>
                                </div><!--tasks Body-->
                            </div>

                        </div>
                    
                    

                    <div class="insights-row">
                        <div class="wid33">
                            <div class="tasks">
                                <div class="tasks-header bordered-bottom bordered-colorprimary">
                                    <i class="tasks-icon fa fa-tasks colorprimary"></i>
                                    <span class="tasks-caption colorprimary"> OFFICIAL BADGES   </span><a href="<?php echo base_url().'official_badge/officialbadgeMonitor' ?>"> <span class=" colorprimary"> See all  </span></a>
                                </div><!--tasks Header-->
                                <div class="tasks-body no-padding">
                                    <div class="task-container">
                                        <div class="task-search">
                                            <span class="input-icon">
                                                <input type="text"id="onenetwork_searchofficialbadgs" class="insights-search-input" placeholder="Enter to search official badges by name">
                                                <i class="fa fa-search gray"></i>
                                            </span>
                                        </div>
                                          <div class="promotions_scroll_box" id="onetworkofficialbadges_scroll" >                                    

                                        <ul class="tasks-list" id="onetwork_officialbadges">
                                		
                                        

                                        </ul>
                                         <ul class="tasks-list" id="onetwork_officialbadgesnodata" style="display:none" >
                                		
											
											<li class="task-item">
											<div class="ticket-user col-sm-12 pal10 pat10">
											
											<span class="user-name padding-5"> <?php echo "No data"; ?> </span>
											</div>
											
											</li>

                                        </ul>
                                    </div>
                                    </div>
                                </div><!--tasks Body-->
                            </div>

                        </div>
                        
                   
                   
                   
                   

                        
           <div class="wid33">
                            <div class="tasks">
                                <div class="tasks-header tasks-header-modulecolor bordered-bottom bordered-colorprimary">
                                    <span class="fll mat5 mar5"> <img src="<?php echo base_url() . "assets/" ?>images/Oneshop.png" title="Cart" width="20" height="20"> </span>
                                    <span class="tasks-caption colorprimary"><span style="color: #000;"> ONESHOP</span>  </span>
                                </div><!--tasks Header-->
                                <div class="tasks-body no-padding">
                                    <div class="task-container">
                                        <div class="task-search overflow">
                                            
                                            <span class="fll" style="width: 120px;">
                                                <select class="fll" id="onenetwork_status" style="width: 120px;">
                                                    <option value=""> Status </option>
                                                    <option value="Active"> Active </option>
                                                    <option value="Inactive"> Inactive </option>
                                                </select>
                                            </span>
                                            
                                            <span class="input-icon" style="width: 50%; float: right;">
                                                <input type="text" placeholder="Enter to search stores by name" id="onetwork_searchstore" class="insights-search-input">
                                                <i class="fa fa-search gray"></i>
                                            </span>
                                            
                                        </div>
                                        
                                        
<div id="onetworkstorerenew_scroll" class="promotions_scroll_box">                                    
                                        
<ul id="onetwork_oneshoprenew" class="tasks-list">

</ul>
<ul style="display:none" id="onetwork_oneshoprenewnodata" class="tasks-list">                             		                                     
<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">
    <img src="<?php echo base_url().'assets/images/nodata.png' ?>">
<span class="user-name padding-5"> No data </span>
</div>
<div class="task-time"> </div>
<div class="task-assignedto"></div>
</li>
</ul>
</div>                                          
                                        
                                        
                                    </div>
                                </div><!--tasks Body-->
                            </div>

                        </div>                  
                        <div class="wid33">
                            <div class="tasks">
                                <div class="tasks-header tasks-header-modulecolor bordered-bottom bordered-colorprimary">
                                    <span class="fll mat5 mar5"> <img src="<?php echo base_url() . "assets/" ?>images/Oneshop.png" title="Cart" width="20" height="20"> </span>
                                    <span class="tasks-caption colorprimary"><span style="color: #000;"> CORPORATE OFFICE</span>  </span>
                                </div><!--tasks Header-->
                                <div class="tasks-body no-padding">
                                    <div class="task-container">
                                        <div class="task-search overflow">
                                            
                                            <span class="fll" style="width: 120px;">
                                                <select class="fll" id="cooffice_status" style="width: 120px;">
                                                    <option value=""> Status </option>
                                                    <option value="Active"> Active </option>
                                                    <option value="Inactive"> Inactive </option>
                                                </select>
                                            </span>
                                            
                                            <span class="input-icon" style="width: 50%; float: right;">
                                                <input type="text" placeholder="Enter to search cooffice by name " id="onetwork_searchcooffice" class="insights-search-input">
                                                <i class="fa fa-search gray"></i>
                                            </span>
                                            
                                        </div>
                                        
                                        
<div id="onetworkcoofficerenew_scroll" class="promotions_scroll_box">                                    
                                        
<ul id="onetwork_coofficerenew" class="tasks-list">

</ul>
<ul style="display:none" id="onetwork_coofficenodata" class="tasks-list">                             		                                     
<li class="task-item">
<div class="ticket-user col-sm-12 pal10 pat10">
    <img src="<?php echo base_url().'assets/images/nodata.png' ?>">
<span class="user-name padding-5"> No data </span>
</div>
<div class="task-time"> </div>
<div class="task-assignedto"></div>
</li>
</ul>
</div>                                          
                                        
                                        
                                    </div>
                                </div><!--tasks Body-->
                            </div>

                        </div>    
 

                        </div>                      
                        
                        
                        
                        
                       
                        
                       
                        
                        
                        
                        
                        
                    </div>
                    
                    
      
                    
                    
                    
                    
                    
                  
                    
                    
                                     
                </div>
                <!-- /Page Body -->
            </div>







</div>


        <div class="clr"></div>

      


       <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

 <div class="clr"></div>
<script>
    function resetTabs(){
        $("#content > div").hide(); //Hide all content
        $("#tabs a").attr("id",""); //Reset id's      
    }

    var myUrl = window.location.href; //get URL
    var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For localhost/tabs.html#tab2, myUrlTab = #tab2     
    var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

    (function(){
        $("#content > div").hide(); // Initially hide all content
        $("#tabs li:first a").attr("id","current"); // Activate first tab
        $("#content > div:first").fadeIn(); // Show first tab content
        
        $("#tabs a").on("click",function(e) {
            e.preventDefault();
            if ($(this).attr("id") == "current"){ //detection for current tab
             return       
            }
            else{             
            resetTabs();
            $(this).attr("id","current"); // Activate this
            $($(this).attr('name')).fadeIn(); // Show content for current tab
            }
        });

        for (i = 1; i <= $("#tabs li").length; i++) {
          if (myUrlTab == myUrlTabName + i) {
              resetTabs();
              $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
              $(myUrlTab).fadeIn(); // Show url tab content        
          }
        }
    })()
  </script>  
   <script src="<?php echo base_url().'assets/microjs/udashboard.js' ?>"></script>
 <script>
	 var starting_index =10;
   
    function dataLoadingpromotions() {
			
		$.ajax({
            type: "POST",
            url: onenetwork_url + "uDashboard/promotions",
            data: {start_id: starting_index },
            success: function (data) {
				 
                if ($.trim(data)!=0) {
					
                  $('#onetwork_promotions').append(data);
                  
                }
                else
                {
					
                    next_promotions_flag= false;
                  $('#onetwork_promotionsnodata').css("display","block");

                }
            }
        });
        starting_index = starting_index + 5;
		}
  var next_promotions_flag= true;
 $('#onetworkpromotions_scroll').on('scroll', function() {
	  if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
              if(next_promotions_flag){
			
            dataLoadingpromotions();
            }
        }
 });
 var starting_index1 =10;
   
 function dataLoadingwordbuyads() {
			
		$.ajax({
            type: "POST",
            url: onenetwork_url + "uDashboard/wordBuyAds",
            data: {start_id: starting_index1 },
            success: function (data) {
				 
                if ($.trim(data)!=0) {
					
                  $('#onetwork_wordbuyads').append(data);
                  
                }
                else
                {
					
                    next_wordbuyads_flag= false;
                  $('#onetwork_wordbuyadsnodata').css("display","block");

                }
            }
        });
        starting_index1 = starting_index1 + 5;
		}
  var next_wordbuyads_flag= true;
 $('#onetworkwordbuyads_scroll').on('scroll', function() {
	  if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
              if(next_wordbuyads_flag){
			
            dataLoadingwordbuyads();
            }
        }
 });
 var starting_index2 =10;
  
function dataLoadingGeneralmarketing(){
	 
	 $.ajax({
            type: "POST",
            url: onenetwork_url + "uDashboard/generalMarketingAds",
            data: {start_id: starting_index2 },
            success: function (data) {
				
                if ($.trim(data)!=0) {
					
                  $('#onetwork_generalmarketing').append(data);
                  
                }
                else
                {
					
                    next_generalmarketing_flag= false;
                  $('#onetwork_generalmarketingnodata').css("display","block");

                }
            }
        });
        starting_index2 = starting_index2 + 5;
	 
	 }
	var  next_generalmarketing_flag =true ;
 $('#onetworkgeneralmarketing_scroll').on('scroll', function() {
	
	  if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
              if(next_generalmarketing_flag){
			
            dataLoadingGeneralmarketing();
            }
        }
 });
 var starting_index3 =10;
function  dataLoadingOfficialbadges(){
	   $.ajax({
            type: "POST",
            url:  onenetwork_url + "uDashboard/officialBadges",
            data: {start_id: starting_index3 },
            success: function (data) {
				
                if ($.trim(data)!=0) {
					
                  $('#onetwork_officialbadges').append(data);
                  
                }
                else
                {
					
                    next_officialbadges_flag= false;
                  $('#onetwork_officialbadgesnodata').css("display","block");

                }
            }
        });
        starting_index3 = starting_index3 + 5;
	 
	 }
	var  next_officialbadges_flag =true ;
 $('#onetworkofficialbadges_scroll').on('scroll', function() {
	
	  if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
              if(next_officialbadges_flag){
			
            dataLoadingOfficialbadges();
            }
        }
 });
 //
 var starting_index4 =5;
function  dataLoadingstorerenew(){

	   $.ajax({
            type: "POST",
            url: onenetwork_url + "uDashboard/oneshopStoreRenews",
            data: {start_id: starting_index4 },
            success: function (data) {
				
                if ($.trim(data)!=0) {
					
                  $('#onetwork_oneshoprenew').append(data);
                  
                }
                else
                {
					
                    next_oneshoprenew_flag= false;
                  $('#onetwork_oneshoprenewnodata').css("display","block");

                }
            }
        });
        starting_index4 = starting_index4 + 5;
	 
	 }
	var  next_oneshoprenew_flag =true ;
 $('#onetworkstorerenew_scroll').on('scroll', function() {
	
	  if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
              if(next_oneshoprenew_flag){
			
            dataLoadingstorerenew();
            }
        }
 });
 //
 var starting_index5 =5;
function  dataLoadingcoofficerenew(){
	   $.ajax({
            type: "POST",
            url: onenetwork_url + "uDashboard/coOfficeRenews",
            data: {start_id: starting_index5 },
            success: function (data) {
				
                if ($.trim(data)!=0) {
					
                  $('#onetwork_coofficerenew').append(data);
                  
                }
                else
                {
					
                    next_coofficerenew_flag= false;
                  $('#onetwork_coofficenodata').css("display","block");

                }
            }
        });
        starting_index5 = starting_index5 + 5;
	 
	 }
	var  next_coofficerenew_flag =true ;
 $('#onetworkcoofficerenew_scroll').on('scroll', function() {
	
	  if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
              if(next_coofficerenew_flag){
			
            dataLoadingcoofficerenew();
            }
        }
 });
 
 </script>

<!--module container end here-->
<?php
$this->templates->footer();
?>
