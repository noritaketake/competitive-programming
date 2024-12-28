<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

$m = i();

$res = [];
$i = 0;
while ($m !== 0) {
    $res = array_merge(
        $res,
        array_fill(0, $m % 3, $i)
    );

    $i++;
    $m = intval(floor($m / 3));
}

echo count($res), PHP_EOL;
echo implode(' ', $res);