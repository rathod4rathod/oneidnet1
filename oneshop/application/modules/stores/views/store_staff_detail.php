<?php $store_code=$store_details[0]["store_code"];
//For store theme  selected
$banner_path = base_url() . "assets/images/store_banners/";
$theme_selected = $this->load->module("stores")->getthemeselected($store_code);
if($theme_selected!=''){ 
     $sideimage =  base_url().'/assets/images/store_banners/'.$theme_selected.'.png';
     $midimage = base_url().'/assets/images/store_banners/mid'.$theme_selected.'.png'; 
 }else{ 
     $sideimage = base_url().'/assets/images/store_banners/1.png';
      $midimage = base_url().'/assets/images/store_banners/mid1.png'; 
     }
 ?> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style type="text/css">

.img-radius {
    z-index: 20;
    top: 5px;
    left: 5px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
}

.cd {
  max-width: 300px;
  margin: auto;
}

.title {
  color: grey;
  font-size: 18px;
}

.column {
  float: unset;
  padding: 15px;
  text-align: center;
  font-size: 17px;
  cursor: pointer;
  color: black;
}

hr.dotted {
  border-top: 1px dashed #ffcc00;
}

hr.rounded {
  border-top: 2px dashed #ffcc00;
}

.containerTab {
  padding: 30px;
  color: black;
  /*outline: 1px dashed #808080;*/
  outline-offset: -10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Closable button inside the image */
.closebtn {
  float: right;
  color: black;
  font-size: 35px;
  cursor: pointer;
}

 </style>
 <script type="text/javascript">
 	function closeTab(tabname){
	  document.getElementById(tabname).style.display = "none";
 	}

 	function openTab(tabName) {
	  var i, x;
	  x = document.getElementsByClassName("containerTab");
	  for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";
	  }
	  document.getElementById(tabName).style.display = "block";
	}
 </script>
 <div class="oneshop_banner_stip_newbox click_importantNotifications">

    <div class="oneshop_banner_left_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
    <div class="oneshop_banner_stip_middle_content"  <?php echo "style= 'background-image: url($midimage)'"; ?> > 
        <?php $this->templates->os_oneshopheader("$store_ptype"); ?>
    </div>
    <div class="oneshop_banner_right_box"  <?php echo "style= 'background-image: url($sideimage)'"; ?> >&nbsp;</div>
</div> 

<div class="" style="margin:0 4%;width:92%;display:table;">
	<div class="oneshop_left_newcontainer pab10 minheight700" style="margin-right: 0px;padding-left: 0px;padding-right: 0px;margin-left: 0px;width: 78%;">
        
		<div class="mar10 mat15">
			 <div class="hd_heading">
	            <h1>Store Staff Details<span></span></h1>
	        </div>
		</div>


		<?php 
		if($store_ptype != "aboutus"){
          	$this->load->module("db_api");
			?>
			<input type="text" id="searchparam" class="input" name="searchparam" style="width: 30%;" placeholder="Search Staff here..." value="">
			<div id="store_staff" style="display: none;">
				
			</div>
			<div id="staff_detail">
				<div class="oneshop_left_newcontainer pab10 minheight700" style="float: left;width: 30%;padding-right: 0px;min-height: 550px;margin-right: 0px;padding-left: 0px;">
					<div>
						<?php 
						for($i=0; $i < sizeof($sstaff_details); $i++){
							$srole = explode("_",$sstaff_details[$i]['role']);
							$container = "'b".$i."'";
					  echo '<div class="column" onclick="openTab('.$container.');" >'.$sstaff_details[$i]["f_name"]." ".$sstaff_details[$i]["l_name"].'<br /><span style="font-size: smaller;color: darkgray;margin-left: 17px;">'.$srole[0].' '.$srole[1].'</span><i class="fa fa-arrow-circle-right" style="float: right;"></i> </div><hr class="rounded">';
					} ?>
					</div>
				</div>
				<div style="float: left;width: 68%;margin: -40px 0 0 0;">
					<?php 

						for($i=0; $i < sizeof($sstaff_details); $i++){

							$srole = explode("_",$sstaff_details[$i]['role']);
							$container = "'b".$i."'";

			          		$this->load->module("db_api");
							$ss_query = "SELECT img_path FROM iws_profiles WHERE profile_id = '" . $sstaff_details[$i]['user_id_fk'] . "'";
					        $ss_res = $this->db_api->custom($ss_query);
					        $ppage = base_url()."user_profile_page?profile_id=".$sstaff_details[$i]['user_id_fk'];

							if($ss_res[$i]['img_path'] != ""){
		                  		$imgpath = base_url().'data/profile/mi/'.$ss_res[$i]['img_path'];
			                }
			                else
			                {
			                  $imgpath = "https://bootdey.com/img/Content/avatar/avatar7.png";
			                }
			                if($i == 0){
			                	echo '<div id="b'.$i.'" class="containerTab" style="display:block;
		    							box-shadow: 0 0 10px 3px rgba(100, 100, 100, 0.7);background:linear-gradient(180deg, rgb(255, 204, 0) 15%, white 15%);min-height: 420px;">
									  	<div class="cd">
									  		<div style="width: 100%">
										  		<img src="'.$imgpath.'" class="img-radius" alt="profile">
										  	</div>
										  	<br />
										  <strong style="font-size: x-large;"><u>'.$sstaff_details[$i]['f_name'].' '.$sstaff_details[$i]['l_name'].'</u>&nbsp;&nbsp;</strong><a href="'.$ppage.'"><i class="fa fa-external-link" aria-hidden="true"></i></a>
										  	<br />
										  <p class="title" style="margin-top:10px;">'.$srole[0].' '.$srole[1].'</p>
										  	<br />
										  	<strong>Working in Store : </strong>
										  <p>From '.$sstaff_details[$i]['w_since'].' Month</p>
										  	<br />
										  	<strong>About Staff : </strong>
										  <p>'.$sstaff_details[$i]['bio'].'</p>
										  	<br />
										  	<strong>Store Location : </strong>
										  <p>'.$sstaff_details[$i]['s_loc'].'</p>
										</div>
									</div>';
			                }
						echo '<div id="b'.$i.'" class="containerTab" style="display:none;
		    box-shadow: 0 0 10px 3px rgba(100, 100, 100, 0.7);background:linear-gradient(180deg, rgb(255, 204, 0) 15%, white 15%);min-height: 420px;">
						  	<div class="cd">
						  		<div style="width: 100%">
							  		<img src="'.$imgpath.'" class="img-radius" alt="profile">
							  	</div>
							  	<br />
							  <strong style="font-size: x-large;"><u>'.$sstaff_details[$i]['f_name'].' '.$sstaff_details[$i]['l_name'].'</u>&nbsp;&nbsp;</strong><a href="'.$ppage.'"><i class="fa fa-external-link" aria-hidden="true"></i></a>
							  	<br />
							  <p class="title" style="margin-top:10px;">'.$srole[0].' '.$srole[1].'</p>
							  	<br />
							  	<strong>Working in Store : </strong>
							  <p>From '.$sstaff_details[$i]['w_since'].' Month</p>
							  	<br />
							  	<strong>About Staff : </strong>
							  <p>'.$sstaff_details[$i]['bio'].'</p>
							  	<br />
							  	<strong>Store Location : </strong>
							  <p>'.$sstaff_details[$i]['s_loc'].'</p>
							</div>
						</div>';
					 } ?>
				</div>
		</div>
		<?php }?> 
	</div>
	<div class="oneshop_right_newcontainer mat15">
 
<a href="<?php echo ONENETWORKURL.'oneshopinfo';  ?>" target="_blank"><img src="<?php echo base_url() . "assets/"; ?>images/ad2.jpg" class="hotel_news_imgbox"></a>

	</div>
      </div>
      <script type="text/javascript">
      	$("#searchparam").keyup(function(e){
		        var search_val=$(this).val();
		        var store_code='<?php echo $store_code?>';
		        if(search_val.length > 0){
		            $.ajax({
		                type:"post",
		                data:{search_val:search_val},
		                url: oneshop_url+"/stores/sstaff_detail/"+store_code,
		                success:function(data){
		                	// alert(data);
		                	document.getElementById('staff_detail').style.display = 'none';
		                	document.getElementById('store_staff').style.display = 'block';
		                    $("#store_staff").html(data);
		                }
		            });               
		        }
		        else{
		            document.getElementById('staff_detail').style.display = 'block';
		            document.getElementById('store_staff').style.display = 'none';
		        }
		    });
      </script>