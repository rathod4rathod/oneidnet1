<?php
if($result[0]['user_id_fk']!=""){
foreach($result as $socialuserdata){?>
<div class="peoples_box_mainwrap">
    <p class="peoples_box_leftlogo"> <img src="assets/basic_info/images/logos/click.png" width="50" height="50" > </p>
<!--    <p class="flr"> <input type="button" value="Click it" class="button_box2"> </p>-->
    <div class="peoples_box_middle_image">
        <img src="<?php if($socialuserdata['logo']){
                      echo CLICKURL."udata/".$socialuserdata['user_id_fk']."/avatar/si/".$socialuserdata['logo'];
                    }else{
                      echo CLICKURL."assets/images/avatar.png";
                    }?>"  width="50" height="50" >
    </div>
    <a href="<?php echo ONEIDNETURL."redirection?url=".CLICKURL."pviews/public_profile?odndlt=".base64_encode(base64_encode($socialuserdata['user_id_fk']))?>"><p class="peoples_box_middle_image_name"> <?php echo ucfirst($socialuserdata['profile_name']);?> </p></a>
</div>
<?php }}
 else {
echo "No Data";
}
?>

