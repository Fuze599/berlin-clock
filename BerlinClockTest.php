<?php
use PHPUnit\Framework\TestCase;
require_once('BerlinClock.php');

class BerlinClockTest extends TestCase {

    // Tests __construct()
    public function testConstructorShouldThrowAnErrorTooMuchHour() {
        self::expectException(InvalidArgumentException::class);
        $berlinClock = new BerlinClock(24, 5, 1);

    }

    public function testConstructorShouldThrowAnErrorTooMuchMinutes() {
        self::expectException(InvalidArgumentException::class);
        $berlinClock = new BerlinClock(23, 60, 1);

    }

    public function testConstructorShouldThrowAnErrorNegativeValue() {
        self::expectException(InvalidArgumentException::class);
        $berlinClock = new BerlinClock(23, -1, 1);

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
        $berlinClock = new BerlinClock(5, 1, 1);
        $response = $berlinClock->getSimpleHours();
        self::assertEquals(0, $response);
    }

    public function testGetSimpleHoursShouldReturn1() {
        $berlinClock = new BerlinClock(1, 1, 1);
        $response = $berlinClock->getSimpleHours();
        self::assertEquals(1, $response);
    }

    public function testGetSimpleHoursShouldReturn3() {
        $berlinClock = new BerlinClock(23, 1, 1);
        $response = $berlinClock->getSimpleHours();
        self::assertEquals(3, $response);
    }

    // Tests getFiveHours()
    public function testGetFiveHoursShouldReturn0() {
        $berlinClock = new BerlinClock(1, 1, 1);
        $response = $berlinClock->getFiveHours();
        self::assertEquals(0, $response);
    }

    public function testGetFiveHoursShouldReturn1() {
        $berlinClock = new BerlinClock(5, 1, 1);
        $response = $berlinClock->getFiveHours();
        self::assertEquals(1, $response);
    }

    public function testGetFiveHoursShouldReturn4() {
        $berlinClock = new BerlinClock(21, 1, 1);
        $response = $berlinClock->getFiveHours();
        self::assertEquals(4, $response);
    }

    // Tests getSeconds()
    public function testGetSecondsShouldReturnTrue() {
        $berlinClock = new BerlinClock(1, 1, 0);
        $response = $berlinClock->getSeconds();
        self::assertTrue($response);
    }

    public function testGetSecondsShouldReturnFalse() {
        $berlinClock = new BerlinClock(1, 1, 1);
        $response = $berlinClock->getSeconds();
        self::assertFalse($response);
    }

    public function testGetSecondsShouldReturnTrueBis() {
        $berlinClock = new BerlinClock(1, 1, 26);
        $response = $berlinClock->getSeconds();
        self::assertTrue($response);
    }

    // Tests createClockLine()
    public function testCreateClockLine1() {
        $response = BerlinClock::createClockLine(" ", "   ", 4, 6);
        self::assertEquals($response, " ▮   ▮   ▮   ▮   ▯   ▯\n");
    }

    public function testCreateClockLine2() {
        $response = BerlinClock::createClockLine("    ", "  ", 10, 15);
        self::assertEquals($response, "    ▮  ▮  ▮  ▮  ▮  ▮  ▮  ▮  ▮  ▮  ▯  ▯  ▯  ▯  ▯\n");
    }

    public function testCreateClockLine3() {
        $response = BerlinClock::createClockLine("         ", "", true, 1);
        self::assertEquals($response, "         ▮\n");
    }

    public function testCreateClockLine4() {
        $response = BerlinClock::createClockLine("         ", "", false, 1);
        self::assertEquals($response, "         ▯\n");
    }

    // Tests horloge()
    public function testHorloge1() {
        $berlinClock = new BerlinClock(1, 1, 26);
        $response = $berlinClock->horloge();
        $expected =
                "         ▮\n" .
                "  ▯   ▯   ▯   ▯\n" .
                "  ▮   ▯   ▯   ▯\n" .
                " ▯▯▯▯▯▯▯▯▯▯▯\n" .
                "  ▮   ▯   ▯   ▯\n";
        self::assertEquals($expected, $response);
    }

    public function testHorloge2() {
        $berlinClock = new BerlinClock(19, 21, 51);
        $response = $berlinClock->horloge();
        $expected =
            "         ▯\n" .
            "  ▮   ▮   ▮   ▯\n" .
            "  ▮   ▮   ▮   ▮\n" .
            " ▮▮▮▮▯▯▯▯▯▯▯\n" .
            "  ▮   ▯   ▯   ▯\n";
        self::assertEquals($expected, $response);
    }

    public function testHorloge3() {
        $berlinClock = new BerlinClock(15, 37, 36);
        $response = $berlinClock->horloge();
        $expected =
            "         ▮\n" .
            "  ▮   ▮   ▮   ▯\n" .
            "  ▯   ▯   ▯   ▯\n" .
            " ▮▮▮▮▮▮▮▯▯▯▯\n" .
            "  ▮   ▮   ▯   ▯\n";
        self::assertEquals($expected, $response);
    }


    public function testHorloge4() {
        $berlinClock = new BerlinClock(7, 15, 55);
        $response = $berlinClock->horloge();
        $expected =
            "         ▯\n" .
            "  ▮   ▯   ▯   ▯\n" .
            "  ▮   ▮   ▯   ▯\n" .
            " ▮▮▮▯▯▯▯▯▯▯▯\n" .
            "  ▯   ▯   ▯   ▯\n";
        self::assertEquals($expected, $response);
    }

    public function testHorloge5() {
        $berlinClock = new BerlinClock(0, 0, 1);
        $response = $berlinClock->horloge();
        $expected =
            "         ▯\n" .
            "  ▯   ▯   ▯   ▯\n" .
            "  ▯   ▯   ▯   ▯\n" .
            " ▯▯▯▯▯▯▯▯▯▯▯\n" .
            "  ▯   ▯   ▯   ▯\n";
        self::assertEquals($expected, $response);
    }

}