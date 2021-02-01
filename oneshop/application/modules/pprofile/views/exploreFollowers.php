<?php
//print_R($Followersdetails[0]);
if($Followersdetails!=0){
    foreach ($Followersdetails as $Followersinfo){
        $hexcode= bin2hex($Followersinfo["profile_id_fk"]);
        $url=base_url()."pprofile/profilepage/".$Followersinfo["user_id"];
        if($Followersinfo["profile_img"]){
            $img=base_url()."data/profile/mi/".$Followersinfo["profile_img"];
        }else{
            $img=base_url()."assets/images/avatar.png";
        }
        
    ?>
        
<li id="<?php echo $hexcode;?>">
    <div class="click_notificationType" id="fcrf2">
        <div class="click_notificationImageWrapper">
            <a href="<?php echo $url; ?>">
                <img src="<?php echo $img;?>">
            </a> 
        </div>
        <div class="click_notifyDateWrapper"><?php $date=new datetime($Followersinfo["date"]); echo $date->format("D-m-Y") ?></div>
        <div class="click_notificationTextWrapper">
            <span class="click_notificationText">
                <a href="<?php echo $url; ?>"><b><?php echo $Followersinfo["profile_name"]; ?></b></a> 
                Follows You</span>
            <span class="click_notificationOptions">
                
                <button class="click_acceptBtn cvignr" uid="<?php echo $hexcode;?>">remove</button></span>
        </div>
    </div>
</li>
        <?php
}}
?>
