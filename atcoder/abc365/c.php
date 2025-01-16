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
function sum(array $arr) { return array_reduce($arr, fn($total, $curr) => $total + $curr, 0); }
const EXPO_9 = 1000_000_000;

[$n, $m] = ia();
$a = ia();

$sum = sum($a);
if ($sum <= $m) return p("infinite");

sort($a);

$ok = 0;
$ng = EXPO_9 + 1;
while (abs($ok - $ng) > 1) {
    $mid = mid($ok, $ng);

    $tmp_sum = 0;
    foreach ($a as $num) {
        $tmp_sum += min($mid, $num);
    }

    if ($tmp_sum <= $m) $ok = $mid;
    else $ng = $mid;
}
p($ok);