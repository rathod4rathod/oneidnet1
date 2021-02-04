<?php
//print_r($contributors_list);
if ($contributors_list != 0) {
  foreach ($contributors_list as $clist) {
    $fullname = $clist["first_name"] . " " . $clist["last_name"];
    $str_fullname = substr($fullname, 0, 15);
    $profile_name = ucfirst($str_fullname);
    $logo_url = str_replace("onenetwork", "oneidnet", base_url());
    if ($clist["img_path"] != "") {
      $profile_img_url = $logo_url . "/data/" . $clist["img_path"];
    } else {
      $profile_img_url = base_url() . "assets/images/avatar.png";
    }
    $points = $clist["all_dev_bugs"] + $clist["design_issue"] + $clist["feedback"] + $clist["security_loophole"];
    $level_name = displayLevels($points);
    $points_earned = ($clist["all_dev_bugs"] * 8) + ($clist["design_issue"] * 4) + ($clist["feedback"] * 6) + ($clist["security_loophole"] * 10);
    ?>
    <tr>
        <td class="text-left">
            <span class="number">#<?php echo $clist["rank"] ?></span>
        </td>
        <td>
            <img src="<?php echo $profile_img_url ?>" class="person-pp" alt="profile-picture" >
            <span title="<?php echo ucfirst($clist["first_name"] . " " . $clist["last_name"]) ?>"><?php echo $profile_name ?></span>
            <span class="person-title" style="font-weight: bold"><?php echo $level_name; ?>(<?php echo $points_earned ?> points)</span>
        </td>
        <td class="text-left"><?php echo $clist["all_dev_bugs"] ?></td>
        <td class="text-left"><?php echo $clist["design_issue"] ?></td>
        <td class="text-left"><?php echo $clist["feedback"] ?></td>
        <td class="text-left"><?php echo $clist["security_loophole"] ?></td>
    </tr>
    <?php
  }
} else {
  echo "No contributors";
}

function displayLevels($pts) {
  if ($pts > 0 && $pts <= 24) {
    return "Prisage";
  } elseif ($pts <= 48 && $pts >= 25) {
    return "Secsage";
  } elseif ($pts >= 98 && $pts <= 49) {
    return "Tersage";
  } elseif ($pts >= 99 && $pts <= 148) {
    return "Quasage";
  } elseif ($pts >= 149 && $pts <= 198) {
    return "Quisage";
  } elseif ($pts >= 199 && $pts <= 248) {
    return "Sensage";
  } elseif ($pts >= 249 && $pts <= 398) {
    return "Sepsage";
  } elseif ($pts >= 399 && $pts <= 548) {
    return "Octsage";
  } elseif ($pts >= 549 && $pts <= 698) {
    return "Nonsage";
  } elseif ($pts >= 699) {
    return "Densage";
  }
}
?>