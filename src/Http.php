<?php
/**
 * This file is part of the Utility Belt package.
 *
 * @author Andrew Woods <andrew@andrewwoods.net>
 * @copyright 2018 Andrew Woods
 * @license https://opensource.org/licenses/GPL-3.0 GNU General Public License version 3
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Awoods\UtilityBelt;

/**
 * Class Http
 *
 * Acts as a wrapper for common HTTP actions
 *
 * @package Awoods\UtilityBelt
 */
class Http
{
    /**
     * Send the request to a new permanent location using 301 HTTP status code
     *
     * The requested resource has been assigned a new permanent URI and any
     * future references to this resource SHOULD use one of the returned URIs
     *
     * @see http://www.php.net/manual/en/function.header.php
     * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10.3.2
     * @param $url
     *
     * @return void
     */
    public static function redirect($url)
    {
        $replace = true;
        header('Location: ' . $url, $replace, 301);
    }


    /**
     * Send the request to a new location using 302 HTTP status code
     *
     * The requested resource resides temporarily under a different URI.
     *
     * @see http://www.php.net/manual/en/function.header.php
     * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10.3.3
     *
     * @param $url
     *
     * @return void
     */
    public static function found($url)
    {
        $replace = true;
        header('Location: ' . $url, $replace, 302);
    }


    /**
     * Send the request to a new location using 303 HTTP status code
     *
     * The response to the request can be found under a different URI and
     * SHOULD be retrieved using a GET method on that resource.
     *
     * @see http://www.php.net/manual/en/function.header.php
     * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10.3.4
     *
     * @param $url
     *
     * @return void
     */
    public static function redirectSeeOther($url)
    {
        $replace = true;
        header('Location: ' . $url, $replace, 303);
    }


    /**
     * Send the request to a new location using 307 HTTP status code
     *
     * The resource resides temporarily at a different URI, but keep using this
     * one since it MAY change on occasion
     *
     * @see http://www.php.net/manual/en/function.header.php
     * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10.3.8
     *
     * @param $url
     *
     * @return void
     */
    public static function redirectTemporarily($url)
    {
        $replace = true;
        header('Location: ' . $url, $replace, 307);
    }

    /**
     * The URI set is the new permanent location for the resource.
     *
     * The 308 (Permanent Redirect) status code indicates that the target
     * resource has been assigned a new permanent URI and any future
     * references to this resource ought to use one of the enclosed URIs.
     *
     * @see http://www.php.net/manual/en/function.header.php
     * @see https://tools.ietf.org/html/rfc7538#section-3
     *
     * @param $url
     *
     * @return void
     */
    public static function redirectPermanently($url)
    {
        $replace = true;
        header('Location: ' . $url, $replace, 308);
    }
}

