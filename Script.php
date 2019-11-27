<?php

use SafeMySQL;

class Script extends Game {

    protected $userModel = [];

    const DATA_GET_TEXT = "Дата получения достижения";
    const VK_GAME = "okop";
    const OK_GAME = "ok_okop";
    const MAIL_GAME = "mail_okop";
    const BEGIN_DIV_NAME = "Начальный дивизион";

    /**
     * @param array $model
     */
    public function setUserModel (array $model): void {
        if (!empty($model) && is_array($model) && $this->isValidModel($model)) {
            $this->userModel = $model;
        }
    }

    /**
     * @return array
     */
    public function getUserModel (): array {
        return !empty($this->userModel) ? $this->userModel : [];
    }
    /**
     * @param array $model
     * @return bool
     */
    protected function isValidModel (array $model): bool {
        return array_key_exists('completed_categorized_achievements', $model) && array_key_exists('last_login', $model);
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public function asDuration (int $timestamp): string {
        $time = '';

        $plurals = [
            'd' => ['день','дня','дней'],
            'h' => ['час','часа','часов'],
            'm' => ['минута','минуты','минут'],
            's' => ['секунда','секунды','секунд']
        ];

        $strtime = [
            'd' => '',
            'h' => '',
            'm' => '',
            's' => ''
        ];

        $strtime['d'] = ( $timestamp >= 86400 ? floor( $timestamp / 86400 ): false );
        $strtime['h'] = ( $timestamp >= 3600 ? floor( ($timestamp % 86400) / 3600 ): false );
        $strtime['m'] = ( $timestamp >= 60 ? floor( ($timestamp % 3600) / 60 ): false );
        $strtime['s'] = ( $timestamp > 0 ? $timestamp % 60 : false );

        $result = [];

        foreach ($strtime as $time_key => $time_value) {
            if ($time_value > 0 && is_numeric($time_value)) {
                $result[] = $time_value . ' ' . $plurals[$time_key][$this->plural($time_value)];
            }
        }

        if (count($result)) $time = implode(" ", $result);

        return $time;
    }

    /**
     * @param int $n
     * @return int
     */
    public function plural (int $n): int {
        if ($n % 10 == 1 && $n % 100 != 11) return 0;
        else if ($n % 10 >= 2 && $n % 10 <= 4 && ( $n % 100 < 10 || $n % 100 >= 20 )) return 1;
        else return 2;
    }

    /**
     * @param array $array
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function getValue(array $array, $key, $default = null) {
        if ($key instanceof \Closure) {
            return $key($array, $default);
        }
        if (is_array($key)) {
            $lastKey = array_pop($key);
            foreach ($key as $keyPart) {
                $array = $this->getValue($array, $keyPart);
            }
            $key = $lastKey;
        }
        if (is_array($array) && (isset($array[$key]) || array_key_exists($key, $array))) {
            return $array[$key];
        }
        if (($pos = strrpos($key, '.')) !== false) {
            $array = $this->getValue($array, substr($key, 0, $pos), $default);
            $key = substr($key, $pos + 1);
        }
        if (is_object($array)) {
            // this is expected to fail if the property does not exist, or __get() is not implemented
            // it is not reliably possible to check whether a property is accessible beforehand
            return $array->$key;
        } elseif (is_array($array)) {
            return (isset($array[$key]) || array_key_exists($key, $array)) ? $array[$key] : $default;
        }
        return $default;
    }

    /**
     * @param array $array
     * @param int $achievementCategory
     * @param int $achievementIndex
     * @return array
     */
    public function getAchievementData (array $array, int $achievementIndex, int $achievementCategory = -1): array {
        $result = [
            'index' => -1,
            'time' => 0,
        ];

        if (
            ($data = $this->getValue($array, [$achievementCategory, $achievementIndex]) && $achievementCategory > 0)
            || ($data = $this->getValue($array, [$achievementIndex]) && $achievementCategory < 0)
        ) {
            if (is_array($data)) {
                $result = [
                    'index' => $data[0],
                    'time' => $data[1],
                ];
            } else if (is_numeric($data) || is_string($data)) {
                $result = [
                    'index' => 0,
                    'time' => $data,
                ];
            }
        }

        return $result;
    }

    /**
     * @param int $achievementIndex
     * @return array
     */
    public function getCompletedAchievementData (int $achievementIndex): array {
        return $this->getAchievementData($this->getCompletedAchievements(), $achievementIndex);
    }

    /**
     * @param int $achievementIndex
     * @return array
     */
    public function getCompletedCategorizedAchievementData (int $achievementIndex): array {
        return $this->getAchievementData($this->getCompletedCategorizedAchievements(), $achievementIndex);
    }
    /**
     * @return array
     */
    private function getCompletedCategorizedAchievements (): array {
        return $this->getValue($this->getUserModel(), 'completed_categorized_achievements', []);
    }

    /**
     * @return array
     */
    private function getCompletedAchievements (): array {
        return $this->getValue($this->getUserModel(), 'completed_achievements', []);
    }

    /**
     * @return array
     */
    private function getNames (): array {
        return $this->getValue($this->getUserModel(), 'names', []);
    }

    /**
     * @return string
     */
    private function getSquadName (): string {
        return $this->getValue($this->getNames(), 'squad_name', 'Мой отряд');
    }

    /**
     * @param int $number
     * @return string
     */
    private function numFormat (int $number): string {
        return number_format($number, 0,'',' ');
    }

    /**
     * @param int $timestamp
     * @return string
     */
    private function ts2date (int $timestamp): string {
        return date("d.m.Y в H:i:s", $timestamp);
    }

    public function getUserGuild (): array {
        return $this->getValue($this->getUserModel(), 'user_guild', []);
    }

    public function getUserGuildLevel (): int {
        return $this->getValue($this->getUserGuild(), 'level', 0);
    }

    public function getUserGuildID (): string {
        return $this->getValue($this->getUserGuild(), 'id');
    }

    public function getExperiences (): array {
        return $this->getValue($this->getUserModel(), 'experiences', []);
    }

    public function getExperience (): array {
        return $this->getValue($this->getExperiences(), 'experience', []);
    }

    public function getMaxLevel (): int {
        return $this->getValue($this->getExperience(), 'max_level', 0);
    }

    public function getStaticResources (): array {
        return $this->getValue($this->getUserModel(), 'static_resources', []);
    }
}