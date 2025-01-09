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
$a = ia();

if ($n === 1) {
    p(1);
    return;
}

$res = 0;
$r = 0;
for ($l = 0; $l < $n; $l++) {
    while ($r < $n) {
        // 3 => checkするまでもなく等差数列だとわかる
        // 3,6 => checkするまでもなく等差数列だとわかる
        // 3,6,9 => checkが必要
        $not_ok = ($r > $l + 1) && (($a[$r] - $a[$r - 1]) !== ($a[$r - 1] - $a[$r - 2]));
        if ($not_ok) break;

        $r++;
    }
    
    // 3,6,9,3でlが0の場合、rは3まで進む
    // 考えられるペアは(0,0), (0,1), (0,2)の3つ
    // なので、r - l = 3をresに加えてあげればOK
    $res += $r - $l;
}

p($res);