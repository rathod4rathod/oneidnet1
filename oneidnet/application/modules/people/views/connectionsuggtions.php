<?php
//echo "<pre>";print_R($contactsug[0]);echo "</pre>";
if ($contactsug != 0) {
    foreach ($contactsug as $contactinfo) {
        ?>
        <li>
            <img src="<?php if($contactinfo["img_path"]){ echo base_url() . "data/".$contactinfo["img_path"]; }else{ echo base_url() . "assets/Images/contentImages/person.png"; }  ?>" />
            <h3><?php if(strlen($contactinfo["fullname"])>=23){ echo substr(ucwords($contactinfo["fullname"]),0,22)."...."; }else{ echo ucwords($contactinfo["fullname"]); } ?></h3>
            <?php if($contactinfo["request"]==null and $uid!=$contactinfo["profile_id"]){
            echo '<a href="javascript:void(0);" class="acnt" id="'. bin2hex($contactinfo["profile_id"]).'" >Add to contact</a>';
            }else if($contactinfo["request"]=="PEND"){
                echo '<a href="javascript:void(0);">Request pending</a>';
            }else if($contactinfo["request"]=="ACPT"){
                echo '<a href="javascript:void(0);">Connected</a>';
            }?>
            
        </li>            
        <?php
    }
}else{
    echo "EMPTY";
}
?>



