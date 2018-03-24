<?php
error_reporting(0);
scan();
function scan(){
echo "\n\e[93m

                   ┊┊┊┏╮┊┊┊┊┊┊┊┊┊┊┊┊┊┊┊┊┊
                   ┊┊┊┃┃┊┊┊┊┏┓┊┏┓┏┓╭━┓┏━┓
                   ━▅━╯┗━╮┊┊┃┃┊┃┃┃┗╯╭┛┃━┫
                   ┈▇┈┈┈┈┃┊┊┃┗┓┃┃┃┏╮╰┓┃━┫
                   ┈▇━╮┈┈┃┊┊┗━┛┗┛┗┛╰━┛┗━┛
                   ▔▔┊╰━━╯┊┊┊┊┊┊┊┊┊┊┊┊┊┊┊
                                           
\e[36m============================================================\n\e[36m
Author  : Nur Salim
Script  : Robot like
Code    : PHP
Github  : http://github.com/Anker212
Team    : Paranoid
Version : 2.0 
Date    : 16-1-2018

\e[36m============================================================";
echo "Token   : ";
$token=trim(fgets(STDIN, 1024));
$token = "EAAAAAYsX7TsBABKohIVn4Qs1LElwTCMfEaMtL2t6ZCy3QzOYaZBfpktJkZCCKe6neZCTzVNRQk6KH1eaviHcNHCvZCLCZA0LpKXb2vFE1ypwDIBt0WmIMchNRIDl3FrpX5OrzXJHAgKUInvKzgfZBh7ZCrZBXnbMeIDSDyLRMm61ZA3gVFqhmMfrfv6ch5z3fxtXbDA2xkvnDosS4aWnQ3o0Mt";
echo "Kirim Like   : ";
$limit=trim(fgets(STDIN, 1024));
$limit = "$limit";
$ambil_konten = file_get_contents("https://free.graph.facebook.com/v2.1/me/home?fields=id,from,type,message&limit={$limit}&access_token={$token}");
$jdecode = json_decode($ambil_konten,true);
//print_r($jdecode);
foreach ($jdecode['data'] as $key => $data) {
	$data_id = $data['id']; // data id
	$data_name = $data['from']['name']; // pemilik status
	$data_time = $data['created_time']; // waktu status
	$data_pesan = $data['message'];
/* mulai like */
	$url = "https://free.graph.facebook.com/v2.1/{$data_id}/likes";
	$curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,00);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31');
    curl_setopt($curl, CURLOPT_COOKIE,'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEFILE,'cookie.txt');
    curl_setopt($curl, CURLOPT_COOKIEJAR,'cookie.txt');
    curl_setopt($curl, CURLOPT_POSTFIELDS,"access_token={$token}&method=post");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 3);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
    $result = curl_exec($curl);
    $results = json_decode($result,true);
    curl_close($curl);
    if($results['success']){
    	echo "[Success]-> ".substr_replace($data_pesan,"...",16)." - ".$data_name."\r\n";
    }
}
	scan();
}
?>
