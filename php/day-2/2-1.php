<?php
/**
 * Advent of Code 2015 http://adventofcode.com/
 *
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE', which is part of this source code package.
 *
 * @link      https://github.com/dragonmantank/advent-of-code-2015 for the canonical source repository
 * @copyright Copyright (c) 2015 Chris Tankersley
 * @license   See LICENSE
 */

$input = file_get_contents('input.txt');

$total = 0;
foreach (explode("\n", $input) as $line) {
    list($l, $w, $h) = explode('x', $line);
    $total += (2*$l*$w) + (2*$w*$h) + (2*$h*$l) + min(($l*$w), ($w*$h), ($h*$l));
}

echo 'Total paper: ' . $total . PHP_EOL;