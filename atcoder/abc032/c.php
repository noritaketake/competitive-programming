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


[$n, $k] = ia();
$s = [];
for ($i = 0; $i < $n; $i++) {
    $s[] = i();
}

if (in_array(0, $s)) {
    p($n);
    return;
}

$res = 0;
$r = 0;
$mul = 1;
for ($l = 0; $l < $n; $l++) {
    // [l,r)のrが条件を満たす最大のrになるようにする
    while ($r < $n && $s[$r] * $mul <= $k) {
        $mul *= $s[$r];
        $r++;
    }
    // この時点で[l,r)は条件を満たしていて、rを含めると条件を満たさなくなる
    
    $res = max($res, $r - $l);

    // r === lの時は次のループのためにrをインクリメントさせる
    // mulも1になっているはずなので割る必要はない
    if ($r === $l) $r++;
    // r < lの時は次のループでlを進める必要があるので、現在のs[l]を除去する
    else $mul /= $s[$l];
}

p($res);