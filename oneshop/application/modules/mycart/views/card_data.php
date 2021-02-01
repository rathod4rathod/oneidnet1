<?php
$j=1;
    foreach($paybook_result as $prlist){
         echo '<div class="fll overflow wi100pstg">
         <p class="fll mar10 paybok_field"> '.$prlist["card_number"].'</p>
         <p class="lh26 fll pat5" style="width:150px;"> Last Used : '.$prlist["last_used_on"].'  </p>
         <p class="lh26 fll pat5" style="width:150px;"> <input type="radio" name="card" id="card_'.$j.'" value="'.$prlist["card_id"].'"/>  </p>
         </div>';
         $j++;
    }    
?>
