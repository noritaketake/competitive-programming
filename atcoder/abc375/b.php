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
$x = $y = [0]; // takahashi is at the origin(0)

for ($i = 0; $i < $n; $i++) {
    [$_x, $_y] = ia();
    $x[] = $_x;
    $y[] = $_y;
}

$res = 0;
for ($i = 0; $i < $n; $i++) {
    $res += sqrt(
        pow($x[$i] - $x[$i + 1], 2) + pow($y[$i] - $y[$i + 1], 2)
    );
}
$res += sqrt(
    pow($x[$n] - $x[0], 2) + pow($y[$n] - $y[0], 2)
);

echo $res;