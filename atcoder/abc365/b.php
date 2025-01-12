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

$n = i();
$a = ia();

$a2 = [];
foreach ($a as $i => $val) {
    $a2[] = [$i, $val];
}
usort($a2, function ($e1, $e2) {
    return $e1[1] <=> $e2[1];
});

p($a2[count($a) - 2][0] + 1);