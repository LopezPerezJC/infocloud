<?php
    class Priva
    {
        function encriptar($data) 
            {
                $key = "SP4rr0w5";
               
                $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

                $encripted = openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);

                return base64_encode($encripted."::".$iv);
            }

        function desencriptar($data) 
            {
                $key = "SP4rr0w5";
                list($encripted_data, $iv) = explode('::', base64_decode($data), 2);
                return openssl_decrypt($encripted_data, 'aes-256-cbc', $key, 0, $iv); 
            }
    }
?>