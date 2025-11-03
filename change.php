<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Pragma: no-cache");

header("Content-Type: application/json;");

$writeJson = file_get_contents("/var/www/html/status.json");
$write = json_decode($writeJson, true);

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo '{"error":"not allowed"}';
    return;
}

$json = file_get_contents("php://input");
$content = json_decode($json, true);

if (array_key_exists("porker", $content) && !empty($content["porker"])) {
    $write["porker"] = $content["porker"];
}

if (array_key_exists("roulette", $content) && !empty($content["roulette"])) {
    $write["roulette"] = $content["roulette"];
}

if (array_key_exists("blackjack", $content) && !empty($content["blackjack"])) {
    $write["blackjack"] = $content["blackjack"];
}

if (array_key_exists("chinchiro", $content) && !empty($content["chinchiro"])) {
    $write["chinchiro"] = $content["chinchiro"];
}

unset($write["overview"]);
$count = array_count_values($write);

if (array_key_exists("入場中止中", $count) && $count["入場中止中"] == 4) {
    $res = "入場中止中";
}
elseif (array_key_exists("満席", $count) && $count["満席"] == 4) {
    $res = "並んだらすぐ";
}
elseif (!array_key_exists("空席あり", $count) || $count["空席あり"] == 0) {
    $res = "空席わずか";
}
else $res = "空席あり";

$write["overview"] = $res;

file_put_contents("/var/www/html/status.json", json_encode($write, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));

echo json_encode($write);

?>