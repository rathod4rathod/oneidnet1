<?php
echo "<script>isdes_onenetworkNot_zero();</script>";
if ($notifications != '0') {
$notifications_ids = implode(',', (array_map(function($x) {
return $x['campaign_id'];
}, $notifications)));
?>

<div onclick="onenetwork_oneid_notif_cam('<?php echo $notifications_ids; ?>')" class = "mmcMainInnerWrapper">
<span class = "mmciconWrapper"><img src = "<?php echo base_url() . 'assets/' ?>Images/contentImages/recomend.png"></span>
<span class = "mmcTextWrapper">
 <h2><?php echo count($notifications); ?></h2>
<p>Campaigns</p>
</span>
<div class = "mmcMarqueWrapper">
<marquee class="mmcmarqueClass"><?PHP foreach ($campaigns as $campaigns){ ?>
            <span><?PHP echo $campaigns.","; ?></span>
            <?PHP } ?></marquee>
</div>
</div>
<script> isdes_onenetwork_ncount(<?php echo count($notifications); ?>);</script>  
<?php
}