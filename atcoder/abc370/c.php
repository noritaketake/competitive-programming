<?php

declare(strict_types=1);

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function p($val) { echo $val, PHP_EOL; }
function hs() { echo ' '; } // half space
const EXPO_9 = 1000000000;

$s = s();
$t = s();

$cost_increasings = [];
$cost_decreasings = [];
for ($i = 0; $i < strlen($s); $i++) {
    $sc = $s[$i];
    $tc = $t[$i];
    if ($sc === $tc) continue;

    $diff = ord($tc) - ord($sc);
    if ($diff > 0) {
        $cost_increasings[] = $i;
    } else {
        $cost_decreasings[] = $i;
    }
}

sort($cost_decreasings);
rsort($cost_increasings);

$res = [];
foreach ($cost_decreasings as $key) {
    $s[$key] = $t[$key];
    $res[] = $s;
}
foreach ($cost_increasings as $key) {
    $s[$key] = $t[$key];
    $res[] = $s;
}

p(count($res));
foreach ($res as $str) {
    p($str);
}