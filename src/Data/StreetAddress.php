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

namespace Awoods\UtilityBelt\Data;

/**
 * Class StreetAddress
 *
 * This class is to be used to create value objects. Instead of using arrays to pass address information,
 * this provides more value due to being type hint-able.
 *
 * @package Awoods\UtilityBelt\Data
 */
class StreetAddress
{
    public $address = '';

    public $address2 = '';

    public $city = '';

    /** @var string  holds a U.S. State, Canadian Province, in the same field */
    public $division = '';

    public $postal = '';

    public $country = '';


    /**
     * StreetAddress constructor.
     *
     * @param $address
     * @param $city
     * @param $postal
     * @param string $country
     */
    public function __construct($address, $city, $postal, $country = '')
    {
        $this->address = $address;
        $this->city = $city;
        $this->postal = $postal;
        if ($country) {
            $this->country = $country;
        }
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        $value = $this->asPlainText();

        // @todo add conditional to allow for intelligent string formatting

        return $value;
    }

    /**
     * Get a U.S. State
     *
     * @return string
     */
    public function getState() : string
    {
        return $this->division;
    }

    /**
     * @param string $state a U.S. State
     *
     * @return void
     */
    public function setState(string $state) : void
    {
        $this->division = $state;
    }

    /**
     * Get a Canadian Province
     *
     * @return string
     */
    public function getProvince() : string
    {
        return $this->division;
    }

    /**
     * @param string $province Canadian Province
     * @return void
     */
    public function setProvince(string $province) : void
    {
        $this->division = $province;
    }

    /**
     * @return string
     */
    public function asPlainText() : string
    {
        $value = $this->address;

        $value .= ' ' . $this->city;

        if ($this->city && $this->division) {
            $value .= ', ';
        }
        $value .= $this->division;

        $value .= ' ' . $this->postal;

        if ($this->country) {
            $value .= ' ' . $this->country;
        }

        return $value;
    }
}
