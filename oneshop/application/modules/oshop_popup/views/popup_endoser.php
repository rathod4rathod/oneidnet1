
<div id="popupWrapper">
    <div class="np_des_experiencetextbox_popup_cliebtnbg"><b>Endosers</b>
<a onclick="toggle_visibility('clickPopup')" href="javascript: void(0)">
<img class="popupClose" src="<?php echo base_url().'assets/images/closicon.png'?>">
</a>
</div>

<div class="np_des_experiencetextbox_popup_scrollbox">

<?php foreach($endoserdata  as $edata){  ?>
<div class="np_des_discussion_right_contentwithimage">
<div class="np_des_connections_leftandright_box fll">
    <span  class="fll"> <a href="<?php echo base_url().'pprofile/profilepage/'.$edata['user_id'] ?>"><img alt="logo" src="<?php echo base_url().'udata/avatar/mi/'.$edata['image_path']?>"></a> </span>
</div>
<div class="np_des_connect_rightboxnew flr">
    <p class="lh18 bold fs14"> <a href="<?php echo base_url().'pprofile/profilepage/'.$edata['user_id'] ?>"><?php echo  $edata['profile_name'] ?></a> </p>

</div>
</div>
<?php } ?>

</div>

</div>
