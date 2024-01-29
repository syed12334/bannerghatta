<?php

namespace App\Helpers;

class Date
{
    public function formatDate($date, $format = 'Y-m-d')
    {
        return date($format, strtotime($date));
    }
    if (!function_exists('bannerEncrypt')) {   
	function bannerEncrypt($string) {        
	        $secret_key = 'Bannerghatta';
	        $secret_iv = 'Bannerghatta@123';  
	        $output = false;
	        $encrypt_method = "AES-256-CBC";
	        $key = hash( 'sha256', $secret_key );
	        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );        
	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	        return $output;
	    }
	}

if (!function_exists('bannerDecrypt')) {   
    function bannerDecrypt($string) {     
        $secret_key = 'Bannerghatta';
        $secret_iv = 'Bannerghatta@123';   
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );    
        return $output;
    }
}
}