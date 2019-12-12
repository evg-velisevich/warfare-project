<?php

namespace src\Script;

class Formatter
{

    /**
     * @var array
     */
    private $plurals = ['d' => ['день', 'дня', 'дней'], 'h' => ['час', 'часа', 'часов'], 'm' => ['минута', 'минуты', 'минут'], 's' => ['секунда', 'секунды', 'секунд']];

    /**
     * @param int $number
     * @return string
     */
    public function numFormat(int $number): string
    {
        return number_format($number, 0, '', ' ');
    }

    /**
     * @param int $timestamp
     * @param bool $short
     * @return string
     */
    public function asDuration(int $timestamp, bool $short = false): string
    {
        $stringTime = [
            'd' => ($timestamp >= 86400 ? floor($timestamp / 86400) : false),
            'h' => ($timestamp >= 3600 ? floor(($timestamp % 86400) / 3600) : false),
            'm' => ($timestamp >= 60 ? floor(($timestamp % 3600) / 60) : false),
            's' => ($timestamp > 0 ? $timestamp % 60 : false),
        ];

        return implode(" ", $this->getParsedTime($stringTime, $short));
    }

    /**
     * @return array
     */
    public function getPlurals(): array
    {
        return $this->plurals;
    }

    /**
     * @param array $stringTime
     * @param bool $short
     * @return array
     */
    public function getParsedTime(array $stringTime, bool $short): array
    {
        $result = [];

        $plurals = $this->getPlurals();

        foreach ($stringTime as $time_key => $time_value) {
            if (is_numeric($time_value)) {
                $value_string = $plurals[$time_key][$this->plural($time_value)];
                $result[] = $time_value . ' ' . ($short ? mb_substr($value_string, 0, 1) : $value_string);
            }
        }

        return $result;
    }

    /**
     * @param int $n
     * @return int
     */
    public function plural(int $n): int
    {
        return ($n % 10 == 1 && $n % 100 != 11) ? 0 : ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20)) ? 1 : 2;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public function ts2date(int $timestamp): string
    {
        return date("d.m.Y в H:i:s", $timestamp);
    }

}