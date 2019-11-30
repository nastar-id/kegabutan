<?php
// Kegabutan part 1 :"v
// Usage: php revip.php domain/ip
echo "
_________________________   ____        ._____________ 
\______   \_   _____/\   \ /   /        |   \______   \
 |       _/|    __)_  \   Y   /  ______ |   ||     ___/
 |    |   \|        \  \     /  /_____/ |   ||    |    
 |____|_  /_______  /   \___/           |___||____|    
        \/        \/                                   
            N4ST4R_ID | www.nyamuxpl0it.xyz \n\n	
";
if($argv[1] == "") {
	echo "Usage: php ".$argv[0]." domain.com \n";
} else {
	$domip = $argv[1];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.hackertarget.com/reverseiplookup/?q=".$domip);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$ex = curl_exec($ch);
	curl_close($ch);
	echo $ex."\n";
	echo "\nMau simpan hasilnya ke file? [y/n] ";
	$nganu = trim(fgets(STDIN));
	if ($nganu == "y" or $nganu == "Y") {
		echo "Masukan nama file: ";
		$nemfel = trim(fgets(STDIN));
		$file = fopen($nemfel, "w");
		fwrite($file, $ex."\n");
		fclose($file);
		sleep(1.5);
		echo "Bisa cek hasil di > ".$nemfel."\n";
	} else {
		echo "Okelah kalo begitu\n";
		sleep(0.5);
		echo "Exiting....\n";
		sleep(1);
		exit;
	}
}
?>
