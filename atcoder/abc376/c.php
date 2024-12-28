<?php

function s() { return trim(fgets(STDIN)); }
function i() { return intval(s()); }
function sa() { return explode(' ', trim(fgets(STDIN))); }
function ia() { return array_map('intval', sa()); }
function yes() { echo 'Yes', PHP_EOL;}
function no() { echo 'No', PHP_EOL;}
function lf() { echo PHP_EOL; }
function hs() { echo ' '; }

$n = i();
$a = ia();
$b = ia();

rsort($a);
rsort($b);

$i_box = 0;
$oversize_toy = null;
for ($i_toy = 0; $i_toy < $n; $i_toy++) {
    $toy = $a[$i_toy];
    $box = $b[$i_box];

    if ($toy > $box) {
        // encounter 2nd toy which can not be placed in box
        if (!is_null($oversize_toy)) {
            echo -1;
            return;
        } else {
            $oversize_toy = $toy;
        }
    } else {
        $i_box++;
    }
}

echo $oversize_toy;