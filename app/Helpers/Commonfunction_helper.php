<?php

namespace App\Helpers;

class Commonfunction
{
    public function formatDate($date, $format = 'Y-m-d')
    {
        return date($format, strtotime($date));
    }
  
  
    public function bannerEncrypt($string) {        
            $secret_key = 'omini';
            $secret_iv = 'omini123';  
            $output = false;
            $encrypt_method = "AES-256-CBC";
            $key = hash( 'sha256', $secret_key );
            $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );        
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
            return $output;
        }



}