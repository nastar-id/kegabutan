<?php
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
	$file = fopen("hsl.txt", "w");
	fwrite($file, $ex."\n");
	fclose($file);
	sleep(1.5);
	echo "\nBisa cek hasil di > hsl.txt\n";
}
?>
