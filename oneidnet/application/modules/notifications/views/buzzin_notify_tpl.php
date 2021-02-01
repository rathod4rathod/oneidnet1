<?php
if ($notifications != 0) {
    foreach ($notifications as $list) {
        $notify_cnt = 0;
        $marquee_txt = "";
        $nofity_text = "";
        if ($list["notification_type"] == "COMMENTED_ON_BUZZ") {
            $notify_cnt = $list["cnt"];
            $nofity_text = "buzz comments";
            $marquee_txt = $notify_cnt . " buzzer(s) commented on your buzz";
        } elseif ($list["notification_type"] == "LIKES_BUZZ") {
            $notify_cnt = $list["cnt"];
            $nofity_text = "buzz likes";
            $marquee_txt = $notify_cnt . " buzzers(s) likes your buzz";
        } elseif ($list["notification_type"] == "FOLLOW") {
            $notify_cnt = $list["cnt"];
            $nofity_text = "new buzzers";
            $marquee_txt = $notify_cnt . " buzzer(s) wants to follow you";
        }
        ?>
        <!--                	-->

        <div class="mmcMainInnerWrapper" id="bznotify_1">
            <span class="mmciconWrapper"><i class="sprite sprite-OD032_likes"></i></span>
            <span class="mmcTextWrapper">
        <!--        <h2>12</h2><p>New celebrities joined</p>-->
                <h2><?php echo $notify_cnt ?></h2><p><?php echo $nofity_text ?></p>
            </span>
            <div class="mmcMarqueWrapper">
                <marquee class="mmcmarqueClass"><?php echo $marquee_txt; ?></marquee>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="mmcMainInnerWrapper"  id="bznotify_1">
        <span class="mmciconWrapper3"><img src="<?php echo base_url() . 'assets/' ?>Images/contentImages/buzz.png"></span>
        <span class="mmcTextWrapper3">
            <h2>0 notifications</h2>
        </span>
    </div>
    <?php
}
?>

<div class="mmcMainInnerWrapper" id="bznotify_2">
    <span class="mmciconWrapper"><i class="sprite sprite-OD038_tcomments"></i></span>
    <span class="mmcTextWrapper">
<!--        <h2>12</h2><p>New celebrities joined</p>-->
        <h2><?php echo $MESSAGE ?></h2><p> messages(s) </p>
    </span>
    <div class="mmcMarqueWrapper">
        <marquee class="mmcmarqueClass"><?php echo $MESSAGE; ?> New Message (s)</marquee>
    </div>
</div>