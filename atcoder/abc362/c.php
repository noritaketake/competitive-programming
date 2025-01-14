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
$l = $r = [];
for ($i = 0; $i < $n; $i++) {
    [$l[$i], $r[$i]] = ia();
}

$sum_min = array_reduce($l, fn($total, $curr) => $total + $curr, 0);
$sum_max = array_reduce($r, fn($total, $curr) => $total + $curr, 0);

if ($sum_min > 0 || $sum_max < 0) return no();

$res = $l;
for ($i = 0; $i < $n; $i++) {
    $diff = $r[$i] - $l[$i];

    if ($sum_min + $diff < 0) {
        $res[$i] = $r[$i];
        $sum_min += $diff;
    } else {
        $res[$i] += abs($sum_min);
        $sum_min = 0;
        break;
    }
}

yes();
p(implode(' ', $res));