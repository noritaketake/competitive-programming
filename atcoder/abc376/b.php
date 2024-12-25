<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

[$n, $q] = ia();

function moveForward($position, $target, $collision) {
    global $n;
    $cnt = 0;
    while (1) {
        if ($position === $collision) {
            return [
                false,
                null,
                null,
            ];
        }
        if ($position === $target) {
            return [
                true,
                $position,
                $cnt,
            ];
        }
        
        $position++;
        $cnt++;
        if ($position === $n) $position = 0;
    }
}

function moveBackward($position, $target, $collision) {
    global $n;
    $cnt = 0;
    while (1) {
        if ($position === $collision) {
            return [
                false,
                null,
                null,
            ];
        }
        if ($position === $target) {
            return [
                true,
                $position,
                $cnt,
            ];
        }
        
        $position--;
        $cnt++;
        if ($position === -1) $position = $n - 1;
    }
}

// initial
$l = 0;
$r = 1;

$result = 0;
for ($i = 0; $i < $q; $i++) {
    [$h, $t] = sa();
    $t = intval($t);
    $t--;

    if ($h === 'L') {
        [$ok, $index, $cnt] = moveForward($l, $t, $r);
        if ($ok) {
            $l = $index;
            $result += $cnt;
            continue;
        }

        [$ok, $index, $cnt] = moveBackward($l, $t, $r);
        if ($ok) {
            $l = $index;
            $result += $cnt;
            continue;
        }
    } else {
        [$ok, $index, $cnt] = moveForward($r, $t, $l);
        if ($ok) {
            $r = $index;
            $result += $cnt;
            continue;
        }

        [$ok, $index, $cnt] = moveBackward($r, $t, $l);
        if ($ok) {
            $r = $index;
            $result += $cnt;
            continue;
        }
    }
}

echo $result;
