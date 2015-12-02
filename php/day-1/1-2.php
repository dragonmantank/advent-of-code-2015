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

$floor = 0;
foreach (str_split($input) as $key => $char) {
    if ($char == '(') {
        $floor++;
    } else {
        $floor--;
    }

    if ($floor == -1) {
        echo 'Basement move: ' . ($key+1);
        exit(0);
    }
}