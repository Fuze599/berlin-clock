<?php
use PHPUnit\Framework\TestCase;
require_once('BerlinClock.php');

class BerlinClockTest extends TestCase {
    private BerlinClock $berlinClock;

    protected function setUp(): void {
        parent::setUp();
    }

    // Tests getSimpleMinutes()
    public function testGetSimpleMinutesShouldReturn0() {
        $berlinClock = new BerlinClock(1, 5, 1);
        $response = $berlinClock->getSimpleMinutes();
        self::assertEquals(0, $response);
    }

    public function testGetSimpleMinutesShouldReturn1() {
        $berlinClock = new BerlinClock(1, 1, 1);
        $response = $berlinClock->getSimpleMinutes();
        self::assertEquals(1, $response);
    }

    public function testGetSimpleMinutesShouldReturn1Bis() {
        $berlinClock = new BerlinClock(1, 6, 1);
        $response = $berlinClock->getSimpleMinutes();
        self::assertEquals(1, $response);
    }

    // Tests getFiveMinutes()
    public function testGetFiveMinutesShouldReturn0() {
        $berlinClock = new BerlinClock(1, 4, 1);
        $response = $berlinClock->getFiveMinutes();
        self::assertEquals(0, $response);
    }

    public function testGetFiveMinutesShouldReturn4() {
        $berlinClock = new BerlinClock(1, 24, 1);
        $response = $berlinClock->getFiveMinutes();
        self::assertEquals(4, $response);
    }

    public function testGetFiveMinutesShouldReturn11() {
        $berlinClock = new BerlinClock(1, 56, 1);
        $response = $berlinClock->getFiveMinutes();
        self::assertEquals(11, $response);
    }


    // Tests getSimpleHours()
    public function testGetSimpleHoursShouldReturn0() {
        $berlinClock = new BerlinClock(1, 1, 5);
        $response = $berlinClock->getSimpleHours();
        self::assertEquals(0, $response);
    }

    public function testGetSimpleHoursShouldReturn1() {
        $berlinClock = new BerlinClock(1, 1, 6);
        $response = $berlinClock->getSimpleHours();
        self::assertEquals(1, $response);
    }

    public function testGetSimpleHoursShouldReturn3() {
        $berlinClock = new BerlinClock(1, 1, 23);
        $response = $berlinClock->getSimpleHours();
        self::assertEquals(3, $response);
    }
}