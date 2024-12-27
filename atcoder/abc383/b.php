<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

[$h, $w, $d] = ia();
$s = [];
for ($i = 0; $i < $h; $i++) {
    $s[] = s();
}

function humidify($f_i, $f_j, $s_i, $s_j) {
    global $h, $w, $d, $s;
    $tmp_s = $s;
    
    $cnt = 0;
    for ($i = max($f_i - $d, 0); $i <= min($f_i + $d, $h - 1); $i++) {
        for ($j = max($f_j - $d, 0); $j <= min($f_j + $d, $w - 1); $j++) {
            if (abs($i - $f_i) + abs($j - $f_j) > $d) continue;
            if ($tmp_s[$i][$j] === '#') continue;
            $cnt++;
            $tmp_s[$i][$j] = '#';
        }
    }
    for ($i = max($s_i - $d, 0); $i <= min($s_i + $d, $h - 1); $i++) {
        for ($j = max($s_j - $d, 0); $j <= min($s_j + $d, $w - 1); $j++) {
            if (abs($i - $s_i) + abs($j - $s_j) > $d) continue;
            if ($tmp_s[$i][$j] === '#') continue;
            $cnt++;
            $tmp_s[$i][$j] = '#';
        }
    }
    return $cnt;
}

$result = 0;
// (i,j) is a first humidifier
for ($i = 0; $i < $h; $i++) {
    for ($j = 0; $j < $w; $j++) {
        if ($s[$i][$j] === '#') continue;

        // (k,l) is a second humidifier
        for ($k = 0; $k < $h; $k++) {
            for ($l = 0; $l < $w; $l++) {
                if ($k === $i && $l === $j) continue;
                if ($s[$k][$l] === '#') continue;

                $result = max($result, humidify($i, $j, $k, $l));
            }
        }
    }
}

echo $result;