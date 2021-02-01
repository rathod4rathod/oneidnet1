

<?php if($udetails!=0){
    foreach($udetails as $udetailsinfo){
        ?>
<tr>
    <td><?php echo $udetailsinfo["fullname"];?></td>
    <td><?php echo $udetailsinfo["country_name"];?></td>
    <td><?php if($udetailsinfo["is_verified"]){ echo "<span class='active'>Active</span>"; }else { echo "<span class='inactive'>Inactive</span>"; } ; ?></td>
    <td>
        <?php
                     $start_date = new DateTime();
                     $since_start = $start_date->diff(new DateTime($udetailsinfo["reg_date"]));
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
        </td>
</tr>            
            
            
            <?php
    }
}else{
    echo "NOREC";
} ?>