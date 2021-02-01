<?php
$activitymsg = '';
if ($product_data != 0) {
    $i=1;
  foreach ($product_data as $plist) {
    ?>
    <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $plist['product_code'] ?></td>
        <td><?php echo $plist['product_name'] ?></td>
        <td><?php echo $plist['qty'] ?></td>
        <td><?php echo $plist['costprice'] ?></td>
        <td><?php echo $plist['type'] ?></td>
    </tr>
    <?php
  }
} else {
  $activitymsg = "No Record Found";
}
?>
<!--<div class="osdes_rightbar_headingsbg_wrap mat20"   >
    <div class="nodata_found_bgwrap">
        <p> <?php echo $activitymsg; ?></p>
    </div>
</div>-->