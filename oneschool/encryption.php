<?php
    function encript($data)
    {
    $firstkey='Aqa33232323444343212k';
    $secondkey='asasqw2ewasaSAAaedrf12';
    $first_key = base64_decode($firstkey);
    $second_key = base64_decode($secondkey);    
    $method = "aes-256-cbc";    
    $iv_length = openssl_cipher_iv_length($method);
    $iv = openssl_random_pseudo_bytes($iv_length);
    $first_encrypted = openssl_encrypt($data,$method,$first_key, OPENSSL_RAW_DATA ,$iv);    
    $second_encrypted = hash_hmac('sha3-512', $first_encrypted, $second_key, TRUE); 
    $output = base64_encode($iv.$second_encrypted.$first_encrypted);    
    return $output;        
    }
    function decript($input)
    {
    $firstkey='Aqa33232323444343212k';
    $secondkey='asasqw2ewasaSAAaedrf12';
    $first_key = base64_decode($firstkey);
    $second_key = base64_decode($secondkey);            
    $mix = base64_decode($input);
    $method = "aes-256-cbc";    
    $iv_length = openssl_cipher_iv_length($method);    
    $iv = substr($mix,0,$iv_length);
    $second_encrypted = substr($mix,$iv_length,64);
    $first_encrypted = substr($mix,$iv_length+64);
    $data = openssl_decrypt($first_encrypted,$method,$first_key,OPENSSL_RAW_DATA,$iv);
    $second_encrypted_new = hash_hmac('sha3-512', $first_encrypted, $second_key, TRUE);
    if (hash_equals($second_encrypted,$second_encrypted_new))
    return $data;
    }
    //require("connect.php");
    //$w=mysqli_query($conn,"select * from users where id='20'");
    //$wrr=mysqli_fetch_array($w);
    //$pass=$wrr['upassword'];
    //echo $pass;
    //echo decript($pass);
    ?>