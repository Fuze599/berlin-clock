<?php
class BerlinClock {
    private int $secondes;
    private int $minutes;
    private int $heures;

    public function __construct($secondes, $minutes, $heures) {
        $this->secondes = $secondes;
        $this->minutes = $minutes;
        $this->heures = $heures;
    }

    public function getSimpleMinutes() : int {
        return $this->minutes % 5;
    }

    public function getFiveMinutes() : int {
        return 0;
    }

    public function getSimpleHours() : int {
        return 0;
    }

    public function getFiveHours() : int {
        return 0;
    }

    public function getSeconds() : int {
        return 0;
    }

    public function horloge() : string {
        return "";
    }
}