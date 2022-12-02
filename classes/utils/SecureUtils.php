
<?php

class SecureUtils {
    
    function cryptPassword($password, $salt, $keysalt) {
        $checkChr = $salt[$keysalt];
        $checkOrd = ord($checkChr);
        
        if ($checkOrd % 5 == 0) {
            $sSecure = $password.$salt;
            
        } else if ($checkOrd % 3 == 0) {
            $sSecure = $salt.$password;
            
        } else if ($checkOrd % 2 == 0) {
            $sSecure = substr($salt, 0,8).$password.substr($salt, 8,8);
            
        } else {
            $sSecure = substr($salt, 8,8).$password.substr($salt, 0,8);;
            
        }
        
        $hSecure = hash('sha256', $sSecure);
        
        return $hSecure;
    }
    
    function newSalt() {
        $esp = 16;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_';
        $base = strlen($characters);
        
        $result = '';
        for ($i = 0; $i < $esp; $i++)
            $result .= $characters[mt_rand(0, strlen($characters)-1)];
            
        return $result;
    }
    
    function newKeysalt() {
        $min = 0;
        $max = 15;
        
        return rand($min, $max);
    }
    
    
}

?>