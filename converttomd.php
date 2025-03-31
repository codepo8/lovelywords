<?php
    $html = file_get_contents('index.html');
    preg_match_all("/<dt>([^<]+)<\/dt>/",$html,$words);
    preg_match_all("/<dd>([^<]+)<\/dd>/",$html,$explanations);
    $out = array();
    foreach($words[1] as $k=>$w){
        array_push($out, $w.' - '.$explanations[1][$k]);
    }
    sort($out);
    echo join("\n", $out);
    file_put_contents('words.md', join("\n", $out));

?> 