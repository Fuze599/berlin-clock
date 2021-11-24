<?php
class BerlinClock {
    private int $secondes;
    private int $minutes;
    private int $heures;

    public function __construct($heures, $minutes, $secondes) {
        if ($secondes >= 60 or $secondes < 0 or $minutes >= 60 or $minutes < 0  or $heures >= 24 or $heures < 0)
            throw new InvalidArgumentException();

        $this->heures = $heures;
        $this->minutes = $minutes;
        $this->secondes = $secondes;
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

    public static function createClockLine(string $mainSpacer, string $spacerBetweenIcons, int $nbIconActif, int $nbIconMax) : string {
        $line = "";
        $reste = $nbIconMax - $nbIconActif;
        for ($i = 1; $i <= $nbIconActif; $i++) {
            $line .= "▮" . $spacerBetweenIcons;
        }
        for ($i = 1; $i <= $reste; $i++) {
            $line .= "▯" . $spacerBetweenIcons;
        }
        return $mainSpacer . rtrim($line) . "\n";
    }

    public function horloge() : string {
        /*
                ▯
         ▮   ▯   ▯   ▯
         ▮   ▮   ▯   ▯
        ▮▮▮▮▮▮▯▯▯▯▯
         ▮   ▮   ▮   ▯
        */

        $seconds = $this->createClockLine("         ", "", $this->getSeconds(), 1);
        $fiveHour = $this->createClockLine("  ", "   ", $this->getFiveHours(), 4);
        $simpleHour = $this->createClockLine("  ", "   ", $this->getSimpleHours(), 4);
        $fiveMinutes = $this->createClockLine(" ", "", $this->getFiveMinutes(), 11);
        $simpleMinute = $this->createClockLine("  ", "   ", $this->getSimpleMinutes(), 4);
        return $seconds . $fiveHour . $simpleHour . $fiveMinutes . $simpleMinute;
    }
}