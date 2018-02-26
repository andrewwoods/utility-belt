<?php

/**
 * This file is part of the Utility Belt package.
 *
 * @copyright 2018 Andrew Woods
 * @license https://opensource.org/licenses/GPL-3.0 GNU General Public License 3
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\UtilityBelt;

/**
 * A prototype string class that wraps PHP native functions
 *
 * Native PHP string functions have awkward names, and inconsistent parameter orders.
 * Sometimes it's needle haystack, while other times they're haystack needle.
 * This class also allows you to chain the methods together when appropriate.
 * Hopefully, one day, this could be a blueprint for becoming part of core PHP.
 * Currently, the class requires using the constructor
 *
 * $name = new StdStr('Andrew');
 * $name->reverse();
 *
 * One day, I hope something like the following will be possible
 *
 * 'Andrew'->reverse();
 *
 * @category Main
 * @package Awoods\UtilityBelt
 * @author Andrew Woods <andrew@andrewwoods.net>
 * @license GPLv3 http://opensourcelicenses.org/gplv3
 */
class StdStr
{
    protected $data = '';

    protected $options;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Magic Methods
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     */

    /**
     * Constructor.
     *
     * @param string $value Value to wrap in this object
     * @param array $options Optional. allows you to override default behaviors.
     *              $options[
     *                  'caseSensitive' => (bool),
     *              ]
     */
    public function __construct($value, $options = [])
    {
        $defaults = ['caseSensitive' => false];

        $this->data = $value;
        $this->options = array_merge($defaults, $options);
    }

    /**
     * Allow this object to be used like a real string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->data;
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     * Public Methods
     * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
     */

    /**
     * Determine the number of characters in the string
     *
     * @uses strlen()
     *
     * @return int
     */
    public function length()
    {
        return strlen($this->data);
    }

    /**
     * Determine the numeric position of the needle.
     *
     * If not found, FALSE is returned. this is because if the needle is found
     * at the beginning of the string, zero is a valid result
     *
     * @param string $needle the string you're looking for
     * @param int $offset Optional
     *
     * @uses strpos()
     *
     * @return int|bool
     */
    public function position($needle, $offset = 0)
    {
        return strpos($this->data, $needle, $offset);
    }

    /**
     * Replace one string with another
     *
     * @param string $search The string you want to replace
     * @param string $replace The value you want to replace it with
     * @param int|bool $count Limit the number of replacements to perform
     *
     * @uses str_replace()
     *
     * @return StdStr
     */
    public function replace($search, $replace, $count = false)
    {
        $replaced = ($count) ?
            str_replace($search, $replace, $this->data, $count) :
            str_replace($search, $replace, $this->data);

        return new static($replaced);
    }

    /**
     * Reverse the order of characters in the string
     *
     * @uses strrev()
     *
     * @return StdStr
     */
    public function reverse()
    {
        return new static(strrev($this->data));
    }

    /**
     * Remove markup tags from the content
     *
     * @uses strip_tags()
     *
     * @return StdStr
     */
    public function stripTags()
    {
        return new static(strip_tags($this->data));
    }

    /**
     * Determine if a value occurs in the string
     *
     * @param string $needle the string you're looking for
     * @param bool $beforeNeedle Search occur before the needle. Default is false.
     *
     * @uses stristr()
     * @uses strstr()
     *
     * @return StdStr
     */
    public function search($needle, $beforeNeedle = false)
    {
        // using case-insensitive version as default.
        $substring = $this->options['caseSensitive'] ?
            strstr($this->data, $needle, $beforeNeedle) :
            stristr($this->data, $needle, $beforeNeedle);

        return new static($substring, $this->options);
    }

    /**
     * Convert the string to all lowercase letters.
     *
     * @uses strtolower()
     *
     * @return StdStr
     */
    public function toLowerCase()
    {
        $lower = strtolower($this->data);

        return new static($lower);
    }

    /**
     * Convert the string to all capital letters.
     *
     * @uses strtoupper()
     *
     * @return StdStr
     */
    public function toUpperCase()
    {
        $upper = strtoupper($this->data);

        return new static($upper);
    }

    /**
     * @return StdStr
     */
    public function translate()
    {
        $numArgs = func_num_args();

        if ($numArgs < 1 || $numArgs > 2) {
            $message = __METHOD__ . ' was called with an incorrect number of arguments';
            throw new \InvalidArgumentException($message);
        }

        $result = '';
        if ($numArgs == 2) {
            list($from, $to) = func_get_args();
            if (! is_string($from) || ! is_string($to)) {
                $message = 'both parameters must be strings';
                throw new \InvalidArgumentException($message);
            }

            $result = strtr($this->data, $from, $to);
        } elseif ($numArgs == 1) {
            list($pairs) = func_get_args();
            if (! is_array($pairs)) {
                $message = 'the parameter must be an array';
                throw new \InvalidArgumentException($message);
            }
            $result = strtr($this->data, $pairs);
        }

        return new static($result, $this->options);
    }

    /**
     * Determine the number of words in a string.
     *
     * @uses str_word_count()
     *
     * @return integer
     */
    public function wordCount()
    {
        return str_word_count($this->data, 0);
    }
}
