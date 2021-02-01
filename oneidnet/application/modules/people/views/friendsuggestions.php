<?php
if ($connectSuggestion != 0) {
    foreach ($connectSuggestion as $connectinfo) {
        ?>
        <li id="<?php echo bin2hex($connectinfo["profile_id"]); ?>" class="usersug">

            <img src="<?php if ($connectinfo["img_path"]) {
            echo base_url() . "data/" . $connectinfo["img_path"];
        } else {
            echo base_url() . "assets/Images/contentImages/person.png";
        } ?>">
            <h3><?php echo $connectinfo["fullname"]; ?></h3>

        </li>

        <?php
    }
} else {
   echo "EMPTY";
}
?>

