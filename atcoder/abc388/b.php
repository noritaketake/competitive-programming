<?php

declare(strict_types=1);

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function p($val) { echo $val, PHP_EOL; }
function mid($l, $r) { return intval(floor(($l + $r) / 2)); } // for binary search
const EXPO_9 = 1000_000_000;

[$n, $d] = ia();
$t = $l = [];
for ($i = 0; $i < $n; $i++) {
    [$t[$i], $l[$i]] = ia();
}

for ($k = 1; $k <= $d; $k++) {
    $res = 0;
    for ($i = 0; $i < $n; $i++) {
        $res = max($res, $t[$i] * ($l[$i] + $k));
    }
    p($res);
}