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

[$n, $k] = ia();
$r = ia();

function search($curr_arr, $index) {
    global $n, $k, $r;

    if ($index === $n) {
        $sum = 0;
        foreach ($curr_arr as $num) {
            $sum += $num;
        }
        if ($sum % $k === 0) p(implode(' ', $curr_arr));

        return;
    }

    for ($j = 1; $j <= $r[$index]; $j++) {
        search(array_merge($curr_arr, [$j]), $index + 1);
    }
}

search([], 0);