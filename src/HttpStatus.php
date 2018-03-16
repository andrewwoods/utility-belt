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
 * Class HttpStatus
 * @package Awoods\UtilityBelt
 *
 * @see https://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html
 *
 * Status codes that describe both success and error HTTP states, described by
 * RFCs. Unless otherwise specified, the code is specified in RFC 2616
 */
class HttpStatus
{
    /*
     * Informational 1xx
     */
    const CODE_100 = 'Continue';
    const CODE_101 = 'Switching Protocols';


    /*
     * Success 2xx
     */
    const CODE_200 = 'OK';
    const CODE_201 = 'Created';
    const CODE_202 = 'Accepted';
    const CODE_203 = 'Non-Authoritative Information';
    const CODE_204 = 'No Content';
    const CODE_205 = 'Reset Content';
    const CODE_206 = 'Partial Content';


    /*
     * Redirection 3xx
     */
    const CODE_300 = 'Multiple Choices';
    const CODE_301 = 'Moved Permanently';
    const CODE_302 = 'Found';
    const CODE_303 = 'See Other';
    const CODE_304 = 'Not Modified';
    const CODE_305 = 'Use Proxy';
    // 306 is deprecated but reserved
    const CODE_307 = 'Temporary Redirect';


    /*
     * Client Errors 4xx
     */
    const CODE_400 = 'Bad Request';
    const CODE_401 = 'Unauthorized';
    const CODE_402 = 'Payment Required';
    const CODE_403 = 'Forbidden';
    const CODE_404 = 'Not Found';
    const CODE_405 = 'Method Not Allowed';
    const CODE_406 = 'Not Acceptable';
    const CODE_407 = 'Proxy Authentication Required';
    const CODE_408 = 'Request Timeout';
    const CODE_409 = 'Conflict';
    const CODE_410 = 'Gone';
    const CODE_411 = 'Length Required';
    const CODE_412 = 'Precondition Failed';
    const CODE_413 = 'Request Entity Too Large';
    const CODE_414 = 'Request-URI Too Long';
    const CODE_415 = 'Unsupported Media Type';
    const CODE_416 = 'Requested Range Not Satisfiable';
    const CODE_417 = 'Expectation Failed';


    /*
     * Server Errors 5xx
     */
    const CODE_500 = 'Internal Server Error';
    const CODE_501 = 'Not Implemented';
    const CODE_502 = 'Bad Gateway';
    const CODE_503 = 'Service Unavailable';
    const CODE_504 = 'Gateway Timeout';
    const CODE_505 = 'HTTP Version Not Supported';
}
