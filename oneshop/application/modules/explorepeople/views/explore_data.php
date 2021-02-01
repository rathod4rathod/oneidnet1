 
 <?php 
 if($exploredata[0]['profile_id']!=''){
 foreach($exploredata as $data){?>
 <div class="result" id="userfollow<?php  echo $data['profile_id'] ?>" >

                    <div class="pImage">
						 <a href="<?php echo base_url().'pprofile/profilepage/'.$data['user_id'] ?>">
						<?php if($data['profile_img']!=''){ ?>
                       
                            <img src="<?php echo base_url().'data/profile/mi/'.$data['profile_img']?>">      
                     
                        <?php }else{ ?>
							  <img src="<?php echo base_url().'assets/images/avatar.png'?>">      
                           
							<?php } ?>
							 </a>
                    </div>
                    <div class="pName">      
                        <span class="name">
                            <h3> <a href="<?php echo base_url().'pprofile/profilepage/'.$data['user_id'] ?>"> <?php echo ucfirst($data['profile_name']); ?> </a>
                            </h3>
                        </span>
                        <div class="followBtns">                            
                            <span id="friendsf1"><button value="follow" id="" onclick="userFollow(<?php echo $data['profile_id'] ?>)"   class="btn-suggestion">Follow</button></span>            
                        </div>
                    </div>
                </div>
                <?php } }else{  echo"0";  } ?>
