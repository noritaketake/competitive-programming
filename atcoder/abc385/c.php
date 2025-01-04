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

$res = 0;
for ($d = 1; $d <= $n; $d++) {
    $map = [];
    for ($i = 0; $i < $n; $i++) {
        $map[$i % $d][] = $h[$i];
    }

    foreach ($map as $arr) {
        $cnt = 0;
        $prev = -1;
        foreach ($arr as $val) {
            if ($val === $prev) {
                $cnt++;
            } else {
                $cnt = 1;
                $prev = $val;
            }
            $res = max($res, $cnt);
        }
    }
}
p($res);