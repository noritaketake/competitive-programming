<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

[$n, $m] = ia();

$map = [];
for ($i = 0; $i < $m; $i++) {
    [$a, $b] = ia();
    $a--;
    $b--;
    $map[$a][$b] = 1;

    $map[$a + 2][$b + 1] = 1;
    $map[$a + 1][$b + 2] = 1;
    $map[$a - 1][$b + 2] = 1;
    $map[$a - 2][$b + 1] = 1;
    $map[$a - 2][$b - 1] = 1;
    $map[$a - 1][$b - 2] = 1;
    $map[$a + 1][$b - 2] = 1;
    $map[$a + 2][$b - 1] = 1;
}

$cnt = 0;
foreach ($map as $key_row => $row) {
    if ($key_row < 0 || $key_row >= $n) continue;

    foreach ($row as $key_col => $cell) {
        if ($key_col < 0 || $key_col >= $n) continue;
        $cnt++;
    }
}

echo $n * $n - $cnt, PHP_EOL;