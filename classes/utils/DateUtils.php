<?php

class DateUtils {
    
    function __construct(){
        date_default_timezone_set('Europe/Rome');
    }
    
    
    function getTodayToString() {
        
        return date('Y-m-d H:i:s');
    }
    
}