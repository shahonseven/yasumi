<?php
/**
 *  This file is part of the Yasumi package.
 *
 *  Copyright (c) 2015 - 2016 AzuyaLabs
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @author Sacha Telgenhof <stelgenhof@gmail.com>
 */

namespace Yasumi\tests\Ireland;

use Yasumi\Holiday;

/**
 * Class for testing holidays in Ireland.
 */
class IrelandTest extends IrelandBaseTestCase
{
    /**
     * @var int year random year number used for all tests in this Test Case
     */
    protected $year;

    /**
     * Tests if all national holidays in Ireland are defined by the provider class
     */
    public function testNationalHolidays()
    {
        $nationalHolidays = ['easter', 'easterMonday'];
        if ($this->year >= 1974) {
            $nationalHolidays[] = 'newYearsDay';
        }

        if ($this->year >= 1903) {
            $nationalHolidays[] = 'stPatricksDay';
        }

        if ($this->year >= 1994) {
            $nationalHolidays[] = 'mayDay';
        }

        if ($this->year <= 1973) {
            $nationalHolidays[] = 'pentecostMonday';
        }

        $this->assertDefinedHolidays($nationalHolidays, self::REGION, $this->year, Holiday::TYPE_NATIONAL);
    }

    /**
     * Tests if all observed holidays in Ireland are defined by the provider class
     */
    public function testObservedHolidays()
    {
        $this->assertDefinedHolidays(['goodFriday', 'pentecost'], self::REGION, $this->year, Holiday::TYPE_OBSERVANCE);
    }

    /**
     * Tests if all seasonal holidays in Ireland are defined by the provider class
     */
    public function testSeasonalHolidays()
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_SEASON);
    }

    /**
     * Tests if all bank holidays in Ireland are defined by the provider class
     */
    public function testBankHolidays()
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_BANK);
    }

    /**
     * Tests if all other holidays in Ireland are defined by the provider class
     */
    public function testOtherHolidays()
    {
        $this->assertDefinedHolidays([], self::REGION, $this->year, Holiday::TYPE_OTHER);
    }

    /**
     * Initial setup of this Test Case
     */
    protected function setUp()
    {
        $this->year = $this->generateRandomYear(1974);
    }
}
