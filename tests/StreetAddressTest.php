<?php
/**
 * This file is part of the Utility Belt package.
 *
 * @author Andrew Woods <andrew@andrewwoods.net>
 * @copyright 2019 Andrew Woods
 * @license https://opensource.org/licenses/GPL-3.0 GNU General Public License version 3
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Awoods\UtilityBelt\Data\StreetAddress;

class StreetAddressTest extends PHPUnit\Framework\TestCase
{
    public function testConstructorOnlyData()
    {
        $address = '123 Main St';
        $city = 'Middletown';
        $postal = '12345';
        $expected = $address . ' ' . $city . ' ' . $postal;

        $streetAddress = new StreetAddress($address, $city, $postal);

        $this->assertEquals($expected, '' . $streetAddress);
    }

    public function testConstructorOnlyDataWithCountry()
    {
        $address = '123 Main St';
        $city = 'Middletown';
        $postal = '12345';
        $country = 'USA';
        $expected = $address . ' ' . $city . ' ' . $postal . ' ' . $country;

        $streetAddress = new StreetAddress($address, $city, $postal, $country);

        $this->assertEquals($expected, '' . $streetAddress);
    }

    public function testAddressWithState()
    {
        $address = '123 Main St';
        $city = 'Middletown';
        $postal = '12345';
        $state = 'WA';
        $country = 'USA';

        $expected = $address . ' ' . $city . ', ' . $state . ' ' . $postal . ' ' . $country;

        $streetAddress = new StreetAddress($address, $city, $postal, $country);
        $streetAddress->setState($state);

        $this->assertEquals($expected, '' . $streetAddress);
    }
}
