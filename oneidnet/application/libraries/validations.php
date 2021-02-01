<?php


/******************************************************************************
 * 
 * Purpose: Global class for server side validations
 * Author: k shivajyothi <shivajyothi@oneidnet.com>
 * Date Written: Feb 17, 2016
 * USAGE: var_dump( $this->validations->checkinput ($data['email'=>shivajyothi@oneidnet.com,'username'=>shivajyothi13]) );
 * 
 ******************************************************************************/

class validations {

    
/***************************************************************
  Manual: function to test the input data before save  
  $data=array('username'=>shivajyothi);
  Usage: $this->validations->checkinput($data['username']); 
  it will return the data   
 ***************************************************************/
  function checkinput($data) {
       
	   foreach ($data as $key => $val) {
           
        $data[$key]= trim($data[$key]);
        $data[$key]= stripslashes($data[$key]);
        $data[$key] = htmlspecialchars($data[$key]);
         
	    
    }
        return $data;
   
}
/***************************************************************
  Manual: function to test the input alphabet type
  $data=array('firstname'=>shivajyothi);
  Usage: $this->validations->is_AplhabeticSeriesOnly($data['firstname']); 
  it returns 1 if the input data is alphabets other wise returns 0 ;
 ***************************************************************/
  
  function is_AplhabeticSeriesOnly($field) {

        if (!empty($field)) {

            if (!preg_match("/^[a-zA-Z]+$/", $field)) {
                return 0;
            }else {
            return 1;
             }
        } else {
            return 0;
        }
    }	
    
/***************************************************************
  Manual: function to test the input alphabet number type
  $data=array('username'=>shivajyothi13);
  Usage: $this->validations->is_AplhabeticnumberOnly($data['username']); 
  it returns 1 if the input data is alphabetnumbers other wise returns 0 ;
 ***************************************************************/
     function is_AplhabeticnumberOnly($field) {

        if (!empty($field)) {

            if (!preg_match('/^[a-zA-Z0-9]+$/', $field)) {
                return 0;
            }else {
            return 1;
             }
        } else {
            return 0;
        }
    }	
/***************************************************************
  Manual: function to test the input email
  $data=array('email'=>shivajyothi@oneidnet.com);
  Usage: $this->validations->is_Valid_Email($data['email']); 
  it returns 1 if the input valid email  other wise returns 0 ;
***************************************************************/
     
    function is_Valid_Email($field) {

        if (!empty($field)) {

            if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
                return 0;
             }else {
               return 1;
              }
        } else {
            return 0;
        }
    }
/***************************************************************
  Manual: function to test the input for image type
  $data=array('imagename'=>one.png);
  Usage: $this->validations->is_Validimage($data['imagename']); 
  it returns 1 if the input image   type is jpeg ,jpg,png,gif  other wise returns 0 ;
***************************************************************/
 
     function is_Validimage($image) {
		 $ext = end(explode('.', strtolower($image)));
			if($ext != '' && !in_array($ext,array('jpeg','jpg','png','gif')))
			{
				return 0;
			}else{
				
				return 1;
			}
		 
		 
	 }
	
/***************************************************************
  Manual: function to test the input for date
  $data=array('dateofbirth'=>02-13-1985);
  Usage: $this->validations->is_Validdate($data['dateofbirth']); 
  it returns 1 if the input valid date   other wise returns 0 ;
***************************************************************/
 
	  function is_Validdate($field) {
		 if(!empty($field)){
	     $result = preg_match ("/^(\d{2})\/(\d{2})\/(\d{4})$/", $field);
			
			if (!$result)
			{
				return 0;
			}else{
				return 1;
				}
		   }else{
			return 0;
			}	
		}
/***************************************************************
  Manual: function to test the input for number
  $data=array('cardnumber'=>443544354423);
  Usage: $this->validations->is_number($data['cardnumber']); 
  it returns 1 if the input valid number  other wise  returns 0 ;
***************************************************************/
 
	  function is_number($field){
		  if(!empty($field)){ 
		   if (!(preg_match($expr, $field) && filter_var($field, FILTER_VALIDATE_INT))) {
        
		   return 0;
		   }else{
			   return 1;
			   }
	     }else{
		  
		   return 0;
		  
		   }
	 
	}	
	
/***************************************************************
  Manual: function to test the input for price type
  $data=array('amount'=>1500.00);
  Usage: $this->validations->is_Validprice($data['amount']); 
  it returns 1 if the input valid price  other wise  returns 0 ;
***************************************************************/
 
	 function is_Validprice($field) {
	 if(!empty($field)){
	            $result = preg_match("/^[0-9\.]+$/", $field);
				if (!$result)
				{
					return 0;
				}else{
					return 1;
					}
	   }else {
            return 0;
        }
	 }
/***************************************************************
  Manual: function to test the input for price type
  $data=array('url'=>'http://localhost/oneidnet');
  Usage: $this->validations->is_Validurl($data['url']); 
  it returns 1 if the input valid url other wise  returns 0 ;
***************************************************************/
 
     function is_Validurl($field) {
        if (!empty($field)) {

            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $field)) {
                return 0;
            }else{
				 return 1;
				}
        } else {
            return 0;
        }
    }
/***************************************************************
  Manual: function to test the input empty or not
  $data=array('username'=>'');
  Usage: $this->validations->isEmpty($data['username']); 
  it returns 1 if the input value not empty   other wise  returns 0 ;
***************************************************************/
 
   
	 function isEmpty($field) {

        if (!empty($field)) {
            return 1;
        } else {
            return 0;
        }
    }
 /***************************************************************
  Manual: function to test the input for mobilevalidation
  $data=array('mobile'=>99867667);
  Usage: $this->validations->is_Validmobile($data['mobile']); 
  it returns 1 if the input valid  mobile  other wise  returns 0 ;
***************************************************************/
 
     
    function is_Validmobile($field) {
		  if(!empty($field)){
		  
			 if(!preg_match("/^[1-9][0-9]*$/", $field) )
					{
						return 0;
					}else{
						
						return 1;
						}
			}else{
				return 0;
				}
		}	

}
