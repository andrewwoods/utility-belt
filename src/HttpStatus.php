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

    /** @see https://tools.ietf.org/html/rfc2518 */
    const CODE_102 = 'Processing';

    /** @see https://tools.ietf.org/html/rfc8297 */
    const CODE_103 = 'Early Hints';

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

    /** @see https://tools.ietf.org/html/rfc4918 */
    const CODE_207 = 'Multi-Status';

    /** @see https://tools.ietf.org/html/rfc5842 */
    const CODE_208 = 'Already Reported';

    /** @see https://tools.ietf.org/html/rfc3229 */
    const CODE_226 = 'IM Used';

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

    /** @see https://tools.ietf.org/html/rfc7538 */
    const CODE_308 = 'Permanent Redirect';

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

    /**
     * Previous called 'Request Entity Too Large'
     *
     * @see https://tools.ietf.org/html/rfc7231
     */
    const CODE_413 = 'Payload Too Large';

    /**
     * Previous called 'Request-URI Too Long'
     *
     * @see https://tools.ietf.org/html/rfc7231
     */
    const CODE_414 = 'URI Too Long';

    const CODE_415 = 'Unsupported Media Type';

    /**
     * Previously named 'Requested Range Not Satisfiable'
     *
     * @see https://tools.ietf.org/html/rfc7233
     */
    const CODE_416 = 'Requested Range Not Satisfiable';

    const CODE_417 = 'Expectation Failed';

    /** @see https://tools.ietf.org/html/rfc2324 */
    const CODE_418 = 'I\'m a Teapot';

    /** @see https://tools.ietf.org/html/rfc7540 */
    const CODE_421 = 'Misdirected Request';

    /** @see https://tools.ietf.org/html/rfc4918 */
    const CODE_422 = 'Unprocessable Entity';

    /** @see https://tools.ietf.org/html/rfc4918 */
    const CODE_423 = 'Locked';

    /** @see https://tools.ietf.org/html/rfc4918 */
    const CODE_424 = 'Failed Dependency';

    /** @see https://tools.ietf.org/html/rfc2246 */
    const CODE_426 = 'Upgrade Required';

    /** @see https://tools.ietf.org/html/rfc6585 */
    const CODE_428 = 'Precondition Required';

    /** @see https://tools.ietf.org/html/rfc6585 */
    const CODE_429 = 'Too Many Requests';

    /** @see https://tools.ietf.org/html/rfc6585 */
    const CODE_431 = 'Request Header Fields Too Large';

    /** @see https://tools.ietf.org/html/rfc6585 */
    const CODE_451 = 'Unavailable for Legal Reasons';


    /*
     * Server Errors 5xx
     */
    const CODE_500 = 'Internal Server Error';
    const CODE_501 = 'Not Implemented';
    const CODE_502 = 'Bad Gateway';
    const CODE_503 = 'Service Unavailable';
    const CODE_504 = 'Gateway Timeout';
    const CODE_505 = 'HTTP Version Not Supported';

    /** @see https://tools.ietf.org/html/rfc2295 */
    const CODE_506 = 'Variant Also Negotiates';

    /** @see https://tools.ietf.org/html/rfc4918 */
    const CODE_507 = 'Insufficient Storage';

    /** @see https://tools.ietf.org/html/rfc5842 */
    const CODE_508 = 'Loop Detected';

    /** @see https://tools.ietf.org/html/rfc2774 */
    const CODE_510 = 'Not Extended';

    /** @see https://tools.ietf.org/html/rfc6585 */
    const CODE_511 = 'Network Authentication Required';
}
