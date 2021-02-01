<?php
/******************************************************************************
 * 
 * Function: Aim to load the instances of provided module.
 * Author: MD Danish <danish@oneidnet.com>
 * Date Written: Dec 2, 2015
 * 
 ******************************************************************************/
class WrapperInit{
    
    function index(){  }
    
    function loadModules( $modulesArray ){
        $ci = &get_instance();
        foreach( $modulesArray as $module ){
            $ci->load->module( $module );
        }
    }    
}
