<?php
class BerlinClock {
    private int $secondes;
    private int $minutes;
    private int $heures;

    public function __construct($secondes, $minutes, $heures) {
        if ($secondes >= 60 or $minutes >= 60 or $heures >= 24)
            throw new InvalidArgumentException();

        $this->secondes = $secondes;
        $this->minutes = $minutes;
        $this->heures = $heures;
    }

    public function getSimpleMinutes() : int {
        return $this->minutes % 5;
    }

    public function getFiveMinutes() : int {
        return ($this->minutes - $this->getSimpleMinutes()) / 5;
    }

    public function getSimpleHours() : int {
        return $this->heures % 5;
    }

    public function getFiveHours() : int {
        return ($this->heures - $this->getSimpleHours()) / 5;
    }

    public function getSeconds(): bool {
        return $this->secondes % 2 == 0;
    }

    public function horloge() : string {
        return "";
    }
}