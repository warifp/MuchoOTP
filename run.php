<?php
echo "Nomor: ";
$no      = trim(fgets(STDIN));

function otp_mucho($no)
{
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://api.mucho.id/core/authorization/mobile/code');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"countryCode\":\"62\",\"mobile\":\"$no\"}");
    curl_setopt($ch, CURLOPT_POST, 1);
    
    $headers   = array();
    $headers[] = 'Host: api.mucho.id';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: 43';
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'Origin: https://mucho.id';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36';
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}
$arif = otp_mucho("$no");
?>