<?php
//$msgList = $this->oshop_popup->getAllRecievedMessages();
foreach ($msgList as $msgInfo) {
    ?>
    <li style="<?php if ($uid != $msgInfo["sender_id_fk"] and $msgInfo["read_or_not"] != 2) {
        echo "background-color: rgba(148, 147, 147, 0.3)";
    } ?>">

        <div class="np_messages_leftimagediv">  <img src="<?php echo base_url() . "data/profile/si/" . $msgInfo["profile_img"]; ?>" class="fll"> 

        </div>

        <div class="np_messages_rightcontentmaindiv fll">
            <div class="fll" style="width:260px;">

                <p class="fs12 bold" style="width: 345px;"> <span><?php echo $msgInfo["first_name"] . " " . $msgInfo["middle_name"] . " " . $msgInfo["last_name"]; ?> </span> <span class="fs10 flr">
                        <?php if ($uid == $msgInfo["sender_id_fk"]) {
                            ?>
                            <img src="<?php echo base_url() . "assets/images/send.png"; ?>" width="20" style="float:left;">
                            <?php }
                        ?>
                        <?php
                        $start_date = new DateTime();
                        $since_start = $start_date->diff(new DateTime($msgInfo["sent_on"]));
                        if ($since_start->y == 1) {
                            echo $since_start->y . " year ago";
                        } else if ($since_start->y >= 1) {
                            echo $since_start->y . " Years Ago";
                        } else if ($since_start->m == 1) {
                            echo $since_start->m . " Month ago";
                        } else if ($since_start->m >= 1) {
                            echo $since_start->m . " Months Ago";
                        } else if ($since_start->d == 1) {
                            echo $since_start->d . " day ago";
                        } else if ($since_start->d >= 1) {
                            echo $since_start->d . " days ago";
                        } else if ($since_start->h == 1) {
                            echo $since_start->h . " hour ago";
                        } else if ($since_start->h >= 1) {
                            echo $since_start->h . " Hours Ago";
                        } else if ($since_start->i >= 1) {
                            echo $since_start->i . " Minutes Ago";
                        } else if ($since_start->s >= 0) {
                            echo "A Few Seconds Ago";
                        }
                        ?>
                    </span>  </p>
                <p class="wi100pstg mat3"><strong>subject :</strong> <a href="javascript:golivechat('<?php echo $msgInfo["subject_aid"]; ?>','<?php echo $msgInfo["user_id"]; ?>','<?php echo $msgInfo["read_or_not"]; ?>')"><?php echo $msgInfo["subject"]; ?></a> </p>
				<p class="wi100pstg mat3"><strong>Message :</strong> <a href="javascript:golivechat('<?php echo $msgInfo["subject_aid"]; ?>','<?php echo $msgInfo["user_id"]; ?>','<?php echo $msgInfo["read_or_not"]; ?>')"><?php echo $msgInfo["message"]; ?></a> </p>
				
            </div>

        </div>
    </li>
<?php } ?>