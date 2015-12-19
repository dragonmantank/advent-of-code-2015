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

import Glibc

func stringFromBytes(bytes: UnsafeMutablePointer<UInt8>, count: Int) -> String {
    var chars: [Character] = []
    (0..<count).forEach {
        chars.append(Character(UnicodeScalar(bytes[$0])))
    }
    return String(chars)
}

func readStringFromFile(path: String) -> String {
    let fp = fopen(path, "r"); defer {fclose(fp)}
    var outputString = ""
    let buffer: UnsafeMutablePointer<UInt8> = UnsafeMutablePointer.alloc(1024); defer {buffer.dealloc(1024)}
    repeat {
        let count: Int = fread(buffer, 1, 1024, fp)
        if ferror(fp) != 0 {break}
        if count > 0 {
            outputString += stringFromBytes(buffer, count: count)
        }
    } while feof(fp) == 0

    return outputString
}

let path = "input.txt"
let outputString = readStringFromFile(path)
var floor = 0
var move = 0;

for i in outputString.characters {
    move++
    if i == "(" {
        floor++;
    } else {
        floor--;
    }

    if -1 == floor {
        print("Santa moved to the basement on move: \(move)")
        break
    }
}
