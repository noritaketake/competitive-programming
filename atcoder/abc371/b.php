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

[$n, $m] = ia();

$map = [];
for ($i = 0; $i < $m; $i++) {
    [$str_a, $b] = sa();
    $a = intval($str_a);

    if ($b === 'F') {
        no();
        continue;
    }

    if (isset($map[$a])) {
        no();
    } else {
        yes();
        $map[$a] = 1;
    }
}