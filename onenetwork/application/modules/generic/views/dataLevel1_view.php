<?php
//print_r($result);
$campaing_name="";
$select1="";
//print_r($input_data);
if($input_data!=""){
    $basic_data=json_decode($input_data);
    for($i=0;$i<count($basic_data);$i++){
        $field_data=$basic_data[$i];                
        foreach($field_data as $key=>$val){
            if($key=="onenetwork_campagin"){
                $campaing_name=$val;
            } 
            if($key==$s_string){
                $select1=$val;
            }
        }
    }
}
//$campaing_name=($basic_info[0]["promo_name"]!="")?$basic_info[0]["promo_name"]:"";
$str_m='';
$str_mid='';
$str_start = " <div class='mab10 mat10 form_width'>
						<p class='label_name mat20 fll'> Promotion Name </p>
						<p> <input type='text' class='oneshop_productfield_textbox' id='onenetwork_campagin' value='".$campaing_name."'> </p>
					    </div> <div class='basic_info'><div class='mab10 mat10 form_width'><p class='label_name'> Choose ". ucfirst($sdata[1])." </p><p> ";
          
          $str_start .= "<select class='flight_searchfield_adult_and_childcontainer'  id='".$s_string."'>";                    
          $i=0;
         foreach( $result as $key =>$value ) {
             if($select1==$value[$i]){
                 $str_m.= 	"<option  value='".$value[$i]."' selected>".ucfirst($value[$i+1])."</option>";
             }else{
			$str_m.= 	"<option  value='".$value[$i]."'>".ucfirst($value[$i+1])."</option>";
             }	
		  }
                  if($select1==""){
                      $str_mid.="<option value=''>Select</option>".$str_m;
                  }else{
                      $str_mid=$str_m;
                  }
          $str_end =  $str_start . $str_mid."</select></p>
                                        </div> </div> ";
          echo $str_end;
          echo $hidden_input;
          ?>
