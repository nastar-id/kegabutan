<?php
// Coded By N4ST4R_ID //
// php subdocek.php web=maklo.com //
class start {
  public function ayy($url) {
    $this->banner($url);
    echo "\n";
    $bjir = $this->nah($url);
    preg_match_all("@\"id\": \"(.*?)\"@", $bjir["body"], $cok);
    if(preg_match("@\"id\": \"@", $bjir["body"])) {
      foreach($cok[1] as $coek) {
        echo $coek."\n";
      }
    } else {
      exit("[-] Error Bos! \n");
    }
  }
  
  public function nah($url) {
    $cuih = curl_init();
    $opt = [
    		CURLOPT_URL => "https://www.virustotal.com/ui/domains/$url/subdomains",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10
            ];
    curl_setopt_array($cuih, $opt);
    $ex = curl_exec($cuih);
    curl_close($cuih);
    return ["body" => $ex];
  }
    
  public function banner($url) {
    echo "
          .-.              .-.           
             `/          /`             
              --   ``   --              
              `+.  ::  `+`              
                -/.++./-                
             .:/+o+ss+o+/-.             
         `/oyhhhy/ oo /yhhhyo/`         
       -shhhhhy+- `hh. .+yhhhhhs-       
     `shhhhyo/`-/ -hh- :-`:oyhhhhs`     
       ...` `+ ./ .hh. /. +` `...       
           `:: `+  yy  +` -:`           
          :-   `+  :/  +`   -:`         
        `-     /`      `/`    -`        
             `/`         /`             
            `:            :`            
           `:              :`           
      
[*] Subdomain Finder By N4ST4R_ID
[!] Visit: www.NyamuXpl0it.xyz
[*] Checking $url
    ";
  }
}
$starting = new start();
parse_str(implode("&", array_slice($argv, 1)), $_GET);
$sa = @$_GET['web'];
$starting->ayy($sa);
?>
