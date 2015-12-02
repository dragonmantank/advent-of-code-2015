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
    $dimensions = explode('x', $line);
    sort($dimensions);
    $total += (2 * $dimensions[0]) + (2 * $dimensions[1]) + ($dimensions[0] * $dimensions[1] * $dimensions[2]);
}

echo 'Total ribbon: ' . $total . PHP_EOL;