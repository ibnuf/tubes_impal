<?php
//echo 'Curl: ', function_exists('curl_version') ? 'Enabled' : 'Disabled';

include "smsGateway.php";
$smsGateway = new SmsGateway('ibnufanhar02@gmail.com', 'ibnufanhar02');
//$smsGateway = new SmsGateway('oktavianiqorr@gmail.com', 'qorrycantik');

//$deviceID = 50251;

$deviceID = 50674;
//$number = '+6282216340281';
//$message = 'Hello World! This is test 4 from SupervisorApp';

$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);

//echo '<pre>';
//print_r($result);
//echo '</pre><br>';

if($result['response']['success'] == 1){
    $success = count($result['response']['result']['success']);

    if($success > 0){
        $msg = 'Pesan berhasil dikirim!';
    }else{
        $msg = 'Pesan gagal dikirim (err=1)!';
    }
}else{
    $msg = 'Pesan gagal dikirim (err=0)!';
}
echo '<script>alert("'.$msg.'");document.location.href = "'.site_url('bk/data_pelanggaran_siswa/'.$list_data2->idSiswa).'";</script>';
?>