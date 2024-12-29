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

[$a, $b, $c, $d, $e, $f] = ia();
[$g, $h, $i, $j, $k, $l] = ia();

function hasIntersection($l1, $r1, $l2, $r2) {
    return !($r1 <= $l2 || $r2 <= $l1);
}

if (
    hasIntersection($a, $d, $g, $j)
    && hasIntersection($b, $e, $h, $k)
    && hasIntersection($c, $f, $i, $l)
) {
    yes();
} else {
    no();
}