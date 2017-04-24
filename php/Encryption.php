<?php


function protect($string){

    $string = mysql_real_escape_string(trim(strip_tags(addslashes($string))));
    return $string;

}

function encryptData($string, $key){

    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
    return $string;

}

function decryptData($string, $key){

    $string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string), MCRYPT_MODE_ECB));
    return $string;

}

function password_encrypt($password) {
    $hash_format = "$2y$10$";   // blowfish
    $salt = generate_salt();
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;
}
function generate_salt(){

    $unique_random_string = md5(uniqid(mt_rand(), true));
    $base64_string = base64_encode($unique_random_string);
    $modified_base64_string = str_replace('+', '.', $base64_string);
    $salt = substr($modified_base64_string, 0, 22);
    return $salt;

}