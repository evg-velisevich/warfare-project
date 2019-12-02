<?php


namespace src\Script;


class MyFormatter
{

    /**
     * @var array
     */
    private $plurals = ['d' => ['день', 'дня', 'дней'], 'h' => ['час', 'часа', 'часов'], 'm' => ['минута', 'минуты', 'минут'], 's' => ['секунда', 'секунды', 'секунд']];

    // TODO: Maintenance index >90

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
            'd' => $this->getDaysByTimeStamp($timestamp),
            'h' => $this->getHoursByTimeStamp($timestamp),
            'm' => $this->getMinutesByTimestamp($timestamp),
            's' => $this->getSecondsByTimestamp($timestamp),
        ];

        return implode(" ", $this->getParsedTime($stringTime, $short));
    }

    /**
     * @param int $timestamp
     * @return int
     */
    public function getDaysByTimeStamp(int $timestamp): int
    {
        return ($timestamp >= 86400 ? floor($timestamp / 86400) : false);
    }

    /**
     * @param int $timestamp
     * @return int
     */
    public function getHoursByTimeStamp(int $timestamp): int
    {
        return ($timestamp >= 3600 ? floor(($timestamp % 86400) / 3600) : false);
    }

    /**
     * @param int $timestamp
     * @return int
     */
    public function getMinutesByTimestamp(int $timestamp): int
    {
        return ($timestamp >= 60 ? floor(($timestamp % 3600) / 60) : false);
    }

    /**
     * @param int $timestamp
     * @return int
     */
    public function getSecondsByTimestamp(int $timestamp): int
    {
        return ($timestamp > 0 ? $timestamp % 60 : false);
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