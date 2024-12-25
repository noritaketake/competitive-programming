<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

[$n, $k] = ia();
$s = s();

$strings = [];

// [l, r)
$l = 0;
$r = 1;
while (1) {
    if ($r === $n) {
        $strings[] = substr($s, $l, $r - $l);
        break;
    }

    if (($s[$l] !== $s[$r]) || ($s[$r - 1] !== $s[$r])) {
        $strings[] = substr($s, $l, $r - $l);
        $l = $r;
    } 

    $r++;
}

$target_index = -1;
$cnt = 0;
foreach ($strings as $key => $string) {
    if (strpos($string, '1') !== false) {
        $cnt++;
    }
    if ($cnt === $k) {
        $target_index = $key;
        break;
    }
}

for ($i = 0; $i < count($strings); $i++) {
    if ($i === $target_index) continue;

    if ($i === $target_index - 1) {
        echo $strings[$target_index];
    }
    echo $strings[$i];
}