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

$scores = ia();

$res = [];
for ($i = 1; $i < 1<<5; $i++) {
    $tmp_str = '';
    $tmp_score = 0;
    for ($j = 0; $j < 5; $j++) {
        if (1<<$j & $i) {
            $tmp_str .= chr(65 + $j);
            $tmp_score += $scores[$j];
        }
    }

    if (isset($res[$tmp_score])) {
        $res[$tmp_score][] = $tmp_str;
    } else {
        $res[$tmp_score] = [$tmp_str];
    }
}

krsort($res, SORT_NATURAL);

foreach ($res as $arr) {
    sort($arr);
    foreach ($arr as $str) {
        p($str);
    }
}