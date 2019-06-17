<?php

/**
 * This file is part of the Utility Belt package.
 *
 * @copyright 2018 Andrew Woods
 * @license https://opensource.org/licenses/MIT MIT License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Awoods\UtilityBelt\StdStr;

class StdStrTest extends PHPUnit_Framework_TestCase
{
    public function testLength()
    {
        $expected = 5;
        $lastname = new StdStr('Obama');

        self::assertEquals($expected, $lastname->length());
    }

    public function testPosition()
    {
        $expected = 5;
        $email = new StdStr('obama@example.com');

        self::assertEquals($expected, $email->position('@'));

        $expected = 0;
        $url = new StdStr('http://example.com');

        self::assertEquals($expected, $url->position('http'));
        self::assertEquals($expected, $url->position('http', 0));
        // Use a different offset from the beginning of the string
        self::assertEquals(5, $url->position('//', 4));
    }

    public function testReplace()
    {
        $initial = new StdStr('one second three');
        $replaced = $initial->replace('second', 'two');

        self::assertEquals('one two three', $replaced);
    }

    public function testReverse()
    {
        $wa = new StdStr('washington');

        self::assertEquals('notgnihsaw', $wa->reverse());
        self::assertEquals('washington', $wa->reverse()->reverse());
    }

    public function testStripTags()
    {
        $markup = new StdStr('<span>content</span>');

        self::assertEquals('content', $markup->stripTags());
    }

    public function testSubstring()
    {
        $markup = new StdStr('<span>content</span>');

        self::assertEquals('content', $markup->stripTags()->search('content'));
    }

    public function testToLowerCase()
    {
        $washington = new StdStr('Washington State');
        $newYork = new StdStr('New York State');

        self::assertEquals('washington state', $washington->toLowerCase());
        self::assertEquals('new york state', $newYork->toUpperCase()->toLowerCase());
    }

    public function testToUpperCase()
    {
        $seattle = new StdStr('Seattle, WA');
        $nyc = new StdStr('New York, NY');

        self::assertEquals('SEATTLE, WA', $seattle->toUpperCase());
        self::assertEquals('NEW YORK, NY', $nyc->toLowerCase()->toUpperCase());
    }

    public function testTranslate()
    {
        $expected = 'THE QUICK BROWN FOX JUMPED OVER THE LAZY DOG';
        $quoteText = 'the quick brown fox jumped over the lazy dog';

        $quote = new StdStr($quoteText);
        $translated = $quote->translate('abcdefghijklmnopqrstuvwxyz', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        self::assertEquals($expected, $translated);
    }

    public function testTranslateArray()
    {
        $expected = 'THE QUICK BROWN FOX JUMPED OVER THE LAZY DOG';
        $content = 'the quick brown fox jumped over the lazy dog';

        $sentence = new StdStr($content);

        $letters = [
            'a' => 'A',
            'b' => 'B',
            'c' => 'C',
            'd' => 'D',
            'e' => 'E',
            'f' => 'F',
            'g' => 'G',
            'h' => 'H',
            'i' => 'I',
            'j' => 'J',
            'k' => 'K',
            'l' => 'L',
            'm' => 'M',
            'n' => 'N',
            'o' => 'O',
            'p' => 'P',
            'q' => 'Q',
            'r' => 'R',
            's' => 'S',
            't' => 'T',
            'u' => 'U',
            'v' => 'V',
            'w' => 'W',
            'x' => 'X',
            'y' => 'Y',
            'z' => 'Z',
        ];

        self::assertEquals($expected, $sentence->translate($letters));
    }

    public function testTranslateArrayStrings()
    {
        $expected = 'username@example.com';
        $content = 'username(at)example(dot)com';

        $sentence = new StdStr($content);

        $letters = [
            '(at)' => '@',
            '(dot)' => '.',
        ];

        self::assertEquals($expected, $sentence->translate($letters));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testTranslateZeroParameters()
    {
        $str = new StdStr('test');
        $str->translate();
    }

    public function testWordCount()
    {
        $seattle = new StdStr('Seattle, WA');
        $fiveWords = new StdStr('one two three four five');
        $withHyphens = new StdStr('one-two three-four five');

        self::assertEquals(2, $seattle->wordCount());
        self::assertEquals(3, $withHyphens->wordCount());
        self::assertEquals(5, $fiveWords->wordCount());
    }
}
