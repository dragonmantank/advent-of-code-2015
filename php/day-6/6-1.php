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

function parseInstruction($instruction)
{
    $sections = explode(' through ', $instruction);
    $front = explode(' ', $sections[0]);

    if (count($front) == 2) {
        $type = 'toggle';
        $range = [$front[1], $sections[1]];
    } else {
        $type = $front[1];
        $range = [$front[2], $sections[1]];
    }
    return ['type' => $type, 'range' => $range];
}

$input = file_get_contents('input.txt');

$limit = 999;
$lights = new SplFixedArray($limit+1);
for ($i = 0; $i <= $limit; $i++) {
    $lights[$i] = \SplFixedArray::fromArray(array_fill(0, $limit+1, 0));
}

foreach (explode("\n", $input) as $instruction) {
    $instruction = parseInstruction($instruction);
    $start = explode(',', $instruction['range'][0]);
    $end = explode(',', $instruction['range'][1]);

    for ($j = $start[0]; $j <= $end[0]; $j++) {
        for ($k = $start[1]; $k <= $end[1]; $k++) {
            switch ($instruction['type']) {
                case 'on':
                    $lights[$j][$k] = 1;
                    break;
                case 'off':
                    $lights[$j][$k] = 0;
                    break;
                case 'toggle':
                    $lights[$j][$k] = $lights[$j][$k] ? 0 : 1;
                    break;
            }
        }
    }
}

$totalOn = 0;
foreach ($lights as $row) {
    $totalOn += substr_count(implode('', $row->toArray()), '1');
}

echo 'Total lights that are on: ' . $totalOn . PHP_EOL;
