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

// Usage: php 4.php [secret] [zero length]
for ($i = 0; true; $i++) {
    if (substr(md5($argv[1] . $i), 0, (int)$argv[2]) === str_repeat('0', (int)$argv[2])) {
        echo 'Number is: ' . $i . PHP_EOL;
        exit(0);
    }
}