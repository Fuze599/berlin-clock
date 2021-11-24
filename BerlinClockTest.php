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
}