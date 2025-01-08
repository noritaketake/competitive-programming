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
$a = [];
for ($i = 0; $i < $n; $i++) {
    $a[] = ia();
}

$i = 0;
for ($j = 0; $j < $n; $j++) {
    if ($i >= $j) {
        $i = $a[$i][$j];
    } else {
        $i = $a[$j][$i];
    }
    $i--;
}

p($i + 1);