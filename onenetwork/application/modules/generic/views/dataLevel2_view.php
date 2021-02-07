<?php
$leveldata =explode("_", $string ); 
 $str_start = "<div class='basic_info'><div class='mab10 mat10 form_width'><p class='label_name'> Choose ". ucfirst($leveldata[1])." </p><p> ";
          
          $str_start .= "<select class='flight_searchfield_adult_and_childcontainer' id='".$string."'><option value=''>select</option></select></p>
                                        </div> </div> ";
          echo $str_start;
?>