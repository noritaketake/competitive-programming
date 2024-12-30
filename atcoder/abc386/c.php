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

$k = i();
$s = s();
$t = s();

$sl = strlen($s);
$tl = strlen($t);

if ($sl === $tl) {
    $is_first = true;
    for ($i = 0; $i < $sl; $i++) {
        if ($s[$i] === $t[$i]) continue;

        if ($is_first) {
            $is_first = false;
        } else {
            return no();
        }
    }
    return yes();
} else if ($sl === $tl - 1) {
    $si = $ti = 0;
    $is_first = true;
    while ($si < $sl) {
        if ($s[$si] !== $t[$ti]) {
            if ($is_first) {
                $ti++;
                $is_first = false;
            } else {
                return no();
            }
        }
        $si++;
        $ti++;
    }
    return yes();
} else if ($sl === $tl + 1) {
    $si = $ti = 0;
    $is_first = true;
    while ($ti < $tl) {
        if ($s[$si] !== $t[$ti]) {
            if ($is_first) {
                $si++;
                $is_first = false;
            } else {
                return no();
            }
        }
        $si++;
        $ti++;
    }
    return yes();
} else {
    return no();
}