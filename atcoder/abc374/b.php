<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

$s = s();
$t = s();

if ($s === $t) {
    echo 0;
    return;
} else {
    $n = min(strlen($s), strlen($t));
    for ($i = 0; $i < $n; $i++) {
        if ($s[$i] !== $t[$i]) {
            echo $i + 1;
            return;
        }
    }
    echo $n + 1;
}