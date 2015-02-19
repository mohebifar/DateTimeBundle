<?php

namespace Mohebifar\DateTimeBundle\Tests\Services;

use Mohebifar\DateTimeBundle\Calendar\Proxy as DateTimeProxy;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ServiceTest extends WebTestCase
{
    /**
     * The calendar driver proxy
     *
     * @var DateTimeProxy
     */
    private $datetime;

    /**
     * Set up the Test with initiating the service container
     */
    public function setUp()
    {
        self::bootKernel();
        $this->datetime = $this->get("mohebifar.datetime");
    }

    /**
     * Test the formatting function in gregorian
     */
    public function testFormat()
    {
        $this->assertEquals($this->datetime->format('j F Y'), date('j F Y'));
    }

    /**
     * Test makeTime function in gregorian
     */
    public function testMakeTime()
    {
        $this->assertEquals($this->datetime->makeTime(), mktime());
    }
}
