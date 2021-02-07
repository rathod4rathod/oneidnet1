<?php 

/*******************************************t***********************************
 * 
 * Function: It returns the unique #tags from the user's post. 
 *  
 * Author: Pawani <pawani@oneidnet.com>
 * Optimized By: MD Danish <danish@oneidnet.com>
 * Date Written: Feb 14, 2015
 * Return Type: Array
 * 
 *  USAGE:  var_dump( $this->tag_filters->get_hashtags( $s_str = '#Tag1 #tag2 #No-Hash ' ) );  
 * 
 ******************************************************************************/
class Tag_Filters{
    
  //Function that returns array of unique hash tags
  function get_hashtags($s_str)
  { 
      $j=0;
      $a_pieces = explode(" ",$s_str);    
      for($i=0;$i<count($a_pieces);$i++) {
        if(substr($a_pieces[$i],0,1)=="#") {
          $a_hash_words[$j]=$a_pieces[$i];
          $j++;
        }
      } 

      if ( sizeof($a_hash_words) == 0 ) {
        return "NO_HASH_TAG_FOUND";
      } else {
      foreach ( array_unique($a_hash_words) as $s_elements ) {
        $a_unique_tags[] = $s_elements ;
      }
     }
    return $a_unique_tags;
    //Array ( [0] => #tag2 [1] => #tag1 ) 
  }  
       
       
    
}
?>