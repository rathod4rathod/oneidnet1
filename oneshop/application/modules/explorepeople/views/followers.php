 
 <?php
  if($usersfollowers[0]['profile_id']!=''){

  foreach($usersfollowers as $followersdata){?>
 <div class="result" >
                    <div class="pImage">
                        <?php if($followersdata['profile_img']!=''){ ?>
 <a href="<?php echo base_url().'pprofile/profilepage/'.$followersdata['user_id'] ?>">
						
                            <img src="<?php echo base_url().'data/profile/mi/'.$followersdata['profile_img']?>">      
                        </a>
                        <?php }else{ ?>
							 <a href="<?php echo base_url().'pprofile/profilepage/'.$followersdata['user_id'] ?>">
						  <img src="<?php echo base_url().'assets/images/avatar.png'?>">      
                            </a>
							<?php } ?>
                    </div>
                    <div class="pName">      
                        <span class="name">
                            <h3><a href="<?php echo base_url().'pprofile/profilepage/'.$followersdata['user_id'] ?>"> <?php echo $followersdata['profile_name'] ?> </a>
                            </h3>
                        </span>
<!--                        <div class="followBtns">
                            <span id="friendsf1"><button value="follow" id="1" onclick="unFollowers(<?php  echo $followersdata['profile_id_fk'] ?>)"  class="btn-suggestion">Remove</button></span>
                        </div>-->
                    </div>
                </div>
                 <?php } }else{  echo"0"; } ?>
