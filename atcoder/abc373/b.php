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

$key_map = [];
for ($i = 65; $i <= 90; $i++) {
    $char = chr($i);
    
    for ($j = 0; $j < strlen($s); $j++) {
        if ($s[$j] === $char) {
            $key_map[$char] = $j;
            break;
        }
    }
}
ksort($key_map);

$res = 0;
$prev_i = null;
foreach ($key_map as $key => $i) {
    if ($key !== 'A') {
        $res += abs($i - $prev_i);
    }
    $prev_i = $i;
}

echo $res;