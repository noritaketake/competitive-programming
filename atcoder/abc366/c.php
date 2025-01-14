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

$q = i();

$cnt = 0;
$map = [];
for ($i = 0; $i < $q; $i++) {
    $input = ia();

    if ($input[0] === 3) {
        p($cnt);
        continue;
    }

    $num = $input[1];
    if ($input[0] === 1) {
        if (!isset($map[$num]) || $map[$num] === 0) {
            $map[$num] = 1;
            $cnt++;
        } else {
            $map[$num]++;
        }
    } else {
        if ($map[$num] === 1) {
            $cnt--;
        }
        $map[$num]--;
    }
}