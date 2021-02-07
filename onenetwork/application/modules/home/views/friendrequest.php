<?php
if($cofriend_request!=0){
    foreach($cofriend_request as $cofriend_info){
        $hexcode= bin2hex($cofriend_info["profile_id"]);
        
        if($cofriend_info["img_path"]){
            $img=ONEIDNETURL."data/".$cofriend_info["img_path"];
        }else{
            $img=base_url()."assets/images/avatar.png";
        }
        
       ?>
          <li id="<?php echo $hexcode; ?>">
            <div class="click_notificationType" id="fcrf2">
                <div class="click_notificationImageWrapper">
                    
                        <img src="<?php echo $img; ?>">
                    
                </div>
                <div class="click_notifyDateWrapper"><?php $date=new DateTime($cofriend_info["connected_time"]); echo $date->format("D-m-Y"); ?></div>
                <div class="click_notificationTextWrapper">
                    <span class="click_notificationText"><b><?php echo $cofriend_info["fullname"];?></b></span>
                    <span class="click_notificationOptions">
                        <button class="click_acceptBtn cvadd " uid="<?php echo $hexcode; ?>">Accept</button>
                        <button class="click_acceptBtn cvignr" uid="<?php echo $hexcode; ?>">Ignore</button></span>
                </div>
            </div>
        </li> 
           <?php 
    }
    
}?>


             