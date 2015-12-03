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

$currentSantaCords = $currentRobotCords = ['x' => 0, 'y' => 0];
$cords = [$currentSantaCords];

foreach (str_split($input) as $move => $direction) {
    if ($move % 2 == 0) {
        $currentCords = $currentSantaCords;
    } else {
        $currentCords = $currentRobotCords;
    }

    switch ($direction) {
        case '^':
            $currentCords['y']++;
            break;
        case 'v':
            $currentCords['y']--;
            break;
        case '<':
            $currentCords['x']--;
            break;
        case '>':
            $currentCords['x']++;
            break;
    }

    if (!in_array($currentCords, $cords)) {
        $cords[] = $currentCords;
    }

    if ($move % 2 == 0) {
        $currentSantaCords = $currentCords;
    } else {
        $currentRobotCords = $currentCords;
    }
}

echo 'Total houses: ' . count($cords) . PHP_EOL;
