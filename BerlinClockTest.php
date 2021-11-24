<?php
use PHPUnit\Framework\TestCase;
require_once('BerlinClock.php');

class BerlinClockTest extends TestCase {
    private BerlinClock $berlinClock;

    protected function setUp(): void {
        parent::setUp();
    }

    public function testGetSimpleMinutesShouldReturn0() {
        // Arrange
        $berlinClock = new BerlinClock(1, 5, 1);

        // Act
        $response = $berlinClock->getSimpleMinutes();

        // Assert
        self::assertEquals(0, $response);
    }

    public function testGetSimpleMinutesShouldReturn1() {
        // Arrange
        $berlinClock = new BerlinClock(1, 1, 1);

        // Act
        $response = $berlinClock->getSimpleMinutes();

        // Assert
        self::assertEquals(1, $response);
    }

    public function testGetSimpleMinutesShouldReturn1Bis() {
        // Arrange
        $berlinClock = new BerlinClock(1, 6, 1);

        // Act
        $response = $berlinClock->getSimpleMinutes();

        // Assert
        self::assertEquals(1, $response);
    }

    public function testGetFiveMinutesShouldReturn0() {
        // Arrange
        $berlinClock = new BerlinClock(1, 4, 1);

        // Act
        $response = $berlinClock->getFiveMinutes();

        // Assert
        self::assertEquals(0, $response);
    }

    public function testGetFiveMinutesShouldReturn4() {
        // Arrange
        $berlinClock = new BerlinClock(1, 24, 1);

        // Act
        $response = $berlinClock->getFiveMinutes();

        // Assert
        self::assertEquals(4, $response);
    }

    public function testGetFiveMinutesShouldReturn11() {
        // Arrange
        $berlinClock = new BerlinClock(1, 56, 1);

        // Act
        $response = $berlinClock->getFiveMinutes();

        // Assert
        self::assertEquals(11, $response);
    }
}