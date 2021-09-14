<?php

/*$data = file_get_contents("https://imgs.xkcd.com/comics/trained_a_neural_net.png");
//var_dump(json_decode($data));

echo $data;*/

$json_url = "https://xkcd.com/info.0.json";
$json = file_get_contents($json_url);
$data1 = json_decode($json, TRUE);
$attach = $data1['img'];
$img = 'images/img.png';

$down = file_put_contents($img,$attach);

print_r($attach);

////echo "<pre>";
//print_r($attach);
//echo $data;
//echo "</pre>";






?>