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

function binarySearch($val) {
    global $x, $n;

    // $x[$i] >= $valとなる最小の$iを求める
    $l = -1;
    $r = $n;
    while ($r > $l + 1) {
        $mid = intval(floor(($l + $r) / 2));

        if ($x[$mid] >= $val) $r = $mid;
        else $l = $mid;
    }

    // TODO: 存在しない場合は$nが返却されるので、呼び出し元で制御すること
    return $r;
}

$q = i();
for ($i = 0; $i < $q; $i++) {
    [$l, $r] = ia();

    $l_searched = binarySearch($l);
    $r_searched = binarySearch($r);

    // 条件を満たす要素が存在しない場合は累積和を0とする
    $sum_l = $l_searched === $n ? 0 : $sum[$l_searched];
    $sum_r = $r_searched === $n ? 0 : $sum[$r_searched];

    $res = $sum_l - $sum_r;

    // 引きすぎてしまっている場合は、加算する
    if ($r_searched !== $n && $r === $x[$r_searched]) {
        $res += $p[$r_searched];
    }

    p($res);
}