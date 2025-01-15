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

[$h, $w] = ia();
[$si, $sj] = ia();
$c = [];
for ($i = 0; $i < $h; $i++) {
    $tmp = s();
    $c[] = str_split($tmp, 1);
}
$x = s();

$si--;
$sj--;

function move($to) {
    global $c, $si, $sj, $h, $w;

    if ($to === 'U') {
        if ($si - 1 >= 0 && $c[$si - 1][$sj] === '.') {
            $si--;
        }
    } else if ($to === 'D') {
        if ($si + 1 < $h && $c[$si + 1][$sj] === '.') {
            $si++;
        }
    } else if ($to === 'L') {
        if ($sj - 1 >= 0 && $c[$si][$sj - 1] === '.') {
            $sj--;
        }
    } else if ($to === 'R') {
        if ($sj + 1 < $w && $c[$si][$sj + 1] === '.') {
            $sj++;
        }
    }
}

for ($i = 0; $i < strlen($x); $i++) {
    move($x[$i]);
}


p($si + 1 . ' ' . $sj + 1);