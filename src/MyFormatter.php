<?php


namespace src\Script;


class MyFormatter
{

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
        $time = '';

        $plurals = [
            'd' => ['день', 'дня', 'дней'],
            'h' => ['час', 'часа', 'часов'],
            'm' => ['минута', 'минуты', 'минут'],
            's' => ['секунда', 'секунды', 'секунд']
        ];

        $stringTime = [
            'd' => '',
            'h' => '',
            'm' => '',
            's' => ''
        ];

        $stringTime['d'] = ($timestamp >= 86400 ? floor($timestamp / 86400) : false);
        $stringTime['h'] = ($timestamp >= 3600 ? floor(($timestamp % 86400) / 3600) : false);
        $stringTime['m'] = ($timestamp >= 60 ? floor(($timestamp % 3600) / 60) : false);
        $stringTime['s'] = ($timestamp > 0 ? $timestamp % 60 : false);

        $result = [];

        foreach ($stringTime as $time_key => $time_value) {
            if ($time_value > 0 && is_numeric($time_value)) {
                $result[] = $time_value . ' ' . ($short ? mb_substr($plurals[$time_key][$this->plural($time_value)], 0, 1) : $plurals[$time_key][$this->plural($time_value)]);
            }
        }

        if (count($result)) $time = implode(" ", $result);

        return $time;
    }

    /**
     * @param int $n
     * @return int
     */
    public function plural(int $n): int
    {
        if ($n % 10 == 1 && $n % 100 != 11) return 0;
        else if ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20)) return 1;
        else return 2;
    }

}