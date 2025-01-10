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

$n = i();
$x = ia();
$p = ia();

$sum = array_fill(0, $n, 0);
$sum[$n - 1] = $p[$n - 1];
for ($i = $n - 2; $i >= 0; $i--) {
    $sum[$i] = $sum[$i + 1] + $p[$i];
}

$q = i();
for ($i = 0; $i < $q; $i++) {
    [$l, $r] = ia();
    $l--;
    $r--;

    p($sum[$l] - $sum[$r] + $p[$r]);
}