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

$codeCharacters = 0;
$memoryCharacters = 0;
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
foreach ($input as $line) {
    $memoryCharacters += strlen(eval('return ' . $line . ';'));
    $codeCharacters += strlen($line);
}

echo 'Difference is: ' . ($codeCharacters - $memoryCharacters) . PHP_EOL;