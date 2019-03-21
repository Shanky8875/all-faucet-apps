<?php
include('config.php');
function claim4($PHPSESSID, $url){
        reset4($PHPSESSID, $url);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 5.1; A1603 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.110 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['confirm_exploaration_point_claim'] = '4';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $info = curl_getinfo($ch);
        $info_code = $info["http_code"];
        if ($info_code == 200){
                sleep(1);
                echo $result;
        }
        else{
                claim4($PHPSESSID, $url);
        }
}
function reset4($PHPSESSID, $url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $headers = array();
        $headers[] = "Cookie: PHPSESSID=".$PHPSESSID;
        $headers[] = "User-Agent: Mozilla/5.0 (Linux; Android 5.1; A1603 Build/LMY47I; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.110 Mobile Safari/537.36";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data['reset_contest_button'] = '4';
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_reset($ch);
}
claim4($PHPSESSID, $url);
?>
