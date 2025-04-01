<?php
    $html = file_get_contents('template.html');
    $data = file_get_contents('words.md');
    $data = explode("\n", $data);
    $data = array_map('trim', $data);
    $data = array_filter($data);
    sort($data);
    $out = '';
    foreach($data as $d) {
        $out .= '    <dt>'.str_replace(' - ','</dt><dd>',$d).'</dd>'."\n";
    }
    $html = str_replace('{{ words }}', $out, $html);
    $html = str_replace('{{ count }}', count($data), $html);
    file_put_contents('index.html', $html);
    $all = file_get_contents('all-template.html');
    $all = str_replace('{{ words }}', $out, $all);
    file_put_contents('all.html', $all);
?> 