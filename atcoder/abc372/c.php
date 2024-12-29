<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function p($val) { echo $val, PHP_EOL; }
function hs() { echo ' '; } // half space
const EXPO_9 = 1000000000;

[$n, $q] = ia();
$s = s();

function isABC(int $i): bool {
    global $n, $s;
    if ($i < 0) return false;
    if ($i >= $n) return false;

    return $s[$i] === 'A' && $s[$i + 1] === 'B' && $s[$i + 2] === 'C';
}

$total_cnt = 0;
for ($i = 0; $i < $n - 2; $i++) {
    if (isABC($i)) $total_cnt++;
}

for ($i = 0; $i < $q; $i++) {
    [$str_x, $c] = sa();
    $x = intval($str_x);
    $x--;

    if (isABC($x - 2) || isABC($x - 1) || isABC($x)) $total_cnt--;
    $s[$x] = $c;
    if (isABC($x - 2) || isABC($x - 1) || isABC($x)) $total_cnt++;
    p($total_cnt);
}
