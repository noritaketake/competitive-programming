<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

$n = i();
$a = ia();

$res = [];
$map = [];
for ($i = 0; $i < $n; $i++) {
    $val_a = $a[$i];

    if (!isset($map[$val_a])) {
        $res[] = -1;
    } else {
        $res[] = $map[$val_a];
    }
    $map[$val_a] = $i + 1;
}

echo implode(' ', $res);