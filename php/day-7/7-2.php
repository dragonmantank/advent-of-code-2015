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

$wires = [];
$instructions = [];
function getSignal($wire)
{
    global $wires;
    global $instructions;

    if (isset($wires[$wire])) {
        return $wires[$wire];
    }

    $chunks = explode(' ', $instructions[$wire]);
    if (count($chunks) == 1) {
        if (is_numeric($chunks[0])) {
            $wires[$wire] = $chunks[0];
        } else {
            $wires[$wire] = getSignal($chunks[0]);
        }

        return $wires[$wire];
    }
    if (count($chunks) == 2) {
        $originalSignal = getSignal($chunks[1]);
        $wires[$wire] = ~ $originalSignal & 0xFFFF;
        return $wires[$wire];
    } else {
        if (is_numeric($chunks[0])) {
            $signal1 = $chunks[0];
        } else {
            $signal1 = getSignal($chunks[0]);
        }

        if (is_numeric($chunks[2])) {
            $signal2 = $chunks[2];
        } else {
            $signal2 = getSignal($chunks[2]);
        }

        switch ($chunks[1]) {
            case 'OR':
                $wires[$wire] = $signal1 |  $signal2;
                break;
            case 'AND':
                $wires[$wire] = $signal1 &  $signal2;
                break;
            case 'LSHIFT':
                $wires[$wire] = $signal1 <<  $signal2;
                break;
            case 'RSHIFT':
                $wires[$wire] = $signal1 >>  $signal2;
                break;
        }
        return $wires[$wire];
    }
}

$input = file_get_contents('input.txt');
foreach (explode("\n", $input) as $line) {
    list($operation, $wire) = explode(' -> ', $line);

    $instructions[$wire] = $operation;
}

$wires['b'] = 3176;
$a = getSignal('a');

echo 'Signal to A is: ' . $a . PHP_EOL;