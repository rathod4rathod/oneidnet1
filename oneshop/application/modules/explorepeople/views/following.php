 
 <?php 

 if($userfollowing!=0){
 foreach($userfollowing as $followingdata){ ?>
 <div class="result">
                    <div class="pImage">
                        <?php if($followingdata['profile_img']!=''){ ?>
 <a href="<?php echo base_url().'pprofile/profilepage/'.$followingdata['user_id'] ?>">
						 <img src="<?php echo base_url().'data/profile/mi/'.$followingdata['profile_img']?>">      
                        </a>
                        <?php }else{ ?>
                        <a href="<?php echo base_url().'pprofile/profilepage/'.$followingdata['user_id'] ?>">
						                              <img src="<?php echo base_url().'assets/images/avatar.png'?>">      
                            </a>
							<?php } ?>
                    </div>
                    <div class="pName">      
                        <span class="name">
                           <h3><a href="<?php echo base_url().'pprofile/profilepage/'.$followingdata['user_id'] ?>"> <?php echo $followingdata['profile_name'] ?> </a>
                            </h3>
                        </span>
                        <div class="followBtns">                            
                            <span id="friendsf1"><button value="follow" id="1" onclick="unfollowing(<?php  echo $followingdata['profile_id_fk'] ?>)" class="btn-suggestion">Remove</button></span>            
                        </div>
                    </div>
                </div>
                <?php } }else{ echo"0"; } ?>
