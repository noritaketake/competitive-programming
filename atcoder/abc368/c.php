<?php

declare(strict_types=1);

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function p($val) { echo $val, PHP_EOL; }
function hs() { echo ' '; } // half space
const EXPO_9 = 1000000000;

$n = i();
$h = ia();

$t = 0;
foreach ($h as $num) {
    $t += intval(floor(($num / 5))) * 3;

    $tmp = $num % 5;

    while ($tmp > 0) {
        $t++;

        if ($t % 3 === 0) {
            $tmp -= 3;
        } else {
            $tmp--;
        }
    }
}

p($t);