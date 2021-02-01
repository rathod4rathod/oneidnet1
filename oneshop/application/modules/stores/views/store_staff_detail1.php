<?php
if($ss_details!=0) { 
?>
<div class="oneshop_left_newcontainer pab10 minheight700" style="float: left;width: 30%;padding-right: 0px;min-height: 550px;margin-right: 0px;padding-left: 0px;">
					<div>
						<?php 
						for($i=0; $i < sizeof($ss_details); $i++){
							$srole = explode("_",$ss_details[$i]['role']);
							$container = "'b".$i."'";
					  echo '<div class="column" onclick="openTab('.$container.');" >'.$ss_details[$i]["f_name"]." ".$ss_details[$i]["l_name"].'<i class="fa fa-arrow-circle-right" style="float: right;"></i> </div><hr class="rounded">';

					} ?>
					</div>
				</div>
				<div style="float: left;width: 68%;padding-top: 20px;">
					<?php 

						for($i=0; $i < sizeof($ss_details); $i++){
							$srole = explode("_",$ss_details[$i]['role']);
							$container = "'b".$i."'";
		          		$this->load->module("db_api");
						$ss_query = "SELECT img_path FROM iws_profiles WHERE profile_id = '" . $ss_details[$i]['user_id_fk'] . "'";
				        $ss_res = $this->db_api->custom($ss_query);
				        $ppage = base_url()."user_profile_page?profile_id=".$ss_details[$i]['user_id_fk'];
				        // echo var_dump($ss_res);

							if($ss_res[$i]['img_path'] != ""){
		                  		$imgpath = base_url().'data/profile/mi/'.$ss_res[$i]['img_path'];
			                }
			                else
			                {
			                  $imgpath = "https://bootdey.com/img/Content/avatar/avatar7.png";
			                }

						echo '<div id="b'.$i.'" class="containerTab" style="display:none;
		    box-shadow: 0 0 10px 3px rgba(100, 100, 100, 0.7);background:linear-gradient(-180deg, #ffcc00 35%, white 45%);min-height: 420px;">
						  <span onclick="closeTab('.$container.');" class="closebtn">x</span>
						  	<div class="cd">
						  		<div style="width: 100%">
							  		<img src="'.$imgpath.'" class="img-radius" alt="profile">
							  	</div>
							  	<br />
							  <strong style="font-size: x-large;"><u>'.$ss_details[$i]['f_name'].' '.$ss_details[$i]['l_name'].'</u>&nbsp;&nbsp;</strong><a href="'.$ppage.'"><i class="fa fa-external-link" aria-hidden="true"></i></a>
							  	<br />
							  <p class="title" style="margin-top:10px;">'.$srole[0].' '.$srole[1].'</p>
							  	<br />
							  	<strong>Working in Store : </strong>
							  <p>From '.$ss_details[$i]['w_since'].' Month</p>
							  	<br />
							  	<strong>About Staff : </strong>
							  <p>'.$ss_details[$i]['bio'].'</p>
							  	<br />
							  	<strong>Store Location : </strong>
							  <p>'.$ss_details[$i]['s_loc'].'</p>
							</div>
						</div>';
					 } ?>
				</div>
			<?php }else{
				?>
    <div class="notfound">
		<p><i class="fa fa-ban"></i> No Record Found</p>
	</div>
		
<?php
}
?>