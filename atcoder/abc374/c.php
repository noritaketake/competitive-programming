<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }
const EXPO_9 = 1000000000;

$n = i();
$k = ia();

$total = array_reduce($k, function($total, $curr) {
    return $total + $curr;
}, 0);

$res = 2 * EXPO_9 + 5;
for ($i = 0; $i < 1<<$n; $i++) {
    $sum_group_a = 0;
    for ($j = 0; $j < $n; $j++) {
        if (1<<$j & $i) {
            $sum_group_a += $k[$j];
        }
    }
    
    $res = min(
        $res,
        max($sum_group_a, $total - $sum_group_a)
    );
}

echo $res;