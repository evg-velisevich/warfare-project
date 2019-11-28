<?php

ini_set("display_errors", "On");
error_reporting(E_ALL);

class Script
{

    protected $userModel = [];

    /**
     * @param int $achievementIndex
     * @return array
     */
    public function getCompletedAchievementData(int $achievementIndex): array
    {
        return $this->getAchievementData($this->getCompletedAchievements(), $achievementIndex);
    }

    /**
     * @param array $array
     * @param int $achievementCategory
     * @param int $achievementIndex
     * @return array
     */
    public function getAchievementData(array $array, int $achievementIndex, int $achievementCategory = -1): array
    {
        $result = [
            'index' => -1,
            'time' => 0,
        ];

        if ($achievementCategory > 0) {
            if ($data = $this->getValue($array, [$achievementCategory, $achievementIndex])) {
                $result = [
                    'index' => $data[0],
                    'time' => $data[1],
                ];
            }
        } else {
            if ($data = $this->getValue($array, [$achievementIndex])) {
                $result = [
                    'index' => 0,
                    'time' => $data,
                ];
            }
        }

        return $result;
    }

    /**
     * @param $array
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function getValue($array, $key, $default = null)
    {
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
     * @return array
     */
    private function getCompletedAchievements(): array
    {
        return $this->getValue($this->getUserModel(), 'completed_achievements', []);
    }

    /**
     * @return array
     */
    public function getUserModel(): array
    {
        return !empty($this->userModel) ? $this->userModel : [];
    }

    /**
     * @param array $model
     */
    public function setUserModel(array $model): void
    {
        if (!empty($model) && is_array($model) && $this->isValidModel($model)) {
            $this->userModel = $model;
        }
    }

    /**
     * @param array $model
     * @return bool
     */
    protected function isValidModel(array $model): bool
    {
        return array_key_exists('completed_categorized_achievements', $model) && array_key_exists('last_login', $model);
    }

    /**
     * @param int $achievementIndex
     * @param int $achievementCategory
     * @return array
     */
    public function getCompletedCategorizedAchievementData(int $achievementIndex, int $achievementCategory): array
    {
        return $this->getAchievementData($this->getCompletedCategorizedAchievements(), $achievementIndex, $achievementCategory);
    }

    /**
     * @return array
     */
    public function getCompletedCategorizedAchievements(): array
    {
        return $this->getValue($this->getUserModel(), 'completed_categorized_achievements', []);
    }

    /**
     * @return string
     */
    public function getUserGuildID(): string
    {
        return $this->getValue($this->getUserGuild(), 'id', '');
    }

    /**
     * @return array
     */
    public function getUserGuild(): array
    {
        return $this->getValue($this->getUserModel(), 'user_guild', []);
    }

    /**
     * @return int
     */
    public function getUsedTalents(): int
    {
        return $this->getValue($this->getStaticResources(), 'used_talents', 0);
    }

    /**
     * @return array
     */
    public function getStaticResources(): array
    {
        return $this->getValue($this->getUserModel(), 'static_resources', []);
    }

    /**
     * @return int
     */
    public function getArmyStrength(): int
    {
        return $this->getValue($this->getStaticResources(), 'army_strength', 0);
    }

    /**
     * @return int
     */
    public function getSrutAmount(): int
    {
        return $this->getValue($this->getSrut(), 'amount', 0);
    }

    /**
     * @return array
     */
    public function getSrut(): array
    {
        $value = $this->getValue($this->getStaticMaximumResources(), 'srut', []);

        return is_array($value) ? $value : [];
    }

    /**
     * @return array
     */
    public function getStaticMaximumResources(): array
    {
        return $this->getValue($this->getUserModel(), 'static_maximum_resources', []);
    }

    /**
     * @return array
     */
    public function getInterimResources(): array
    {
        return $this->getValue($this->getUserModel(), 'interim_resources', []);
    }

    /**
     * @return int
     */
    public function getAchievementsPoints(): int
    {
        return $this->getValue($this->getStaticResources(), 'achievement_points', 0);
    }

    /**
     * @return array
     */
    public function getBossLimit(): array
    {
        $limit = [
            'limit' => 0,
            'guild_boost' => 0,
            'territories_boost' => 0,
            'status_boost' => 0,
            'talents_boost' => 0,
            'hero_boost' => 0
        ];

        if ($this->getMaxLevel() >= 3) {
            $limit['limit'] = 15;

            $guildLevelsBoost = [10 => 20, 15 => 30, 27 => 40, 45 => 50, 55 => 60];
            foreach ($guildLevelsBoost as $level => $boost) {
                if ($this->getUserGuildLevel() >= $level) {
                    $limit['limit'] += $boost;
                    $limit['guild_boost'] += $boost;
                }
            }

            if ($this->isActiveStatus()) {
                $statusLevelsBoost = [15 => 20, 13 => 15, 10 => 12, 7 => 8, 4 => 5];
                foreach ($statusLevelsBoost as $level => $boost) {
                    if ($this->getStatusLevel() >= $level) {
                        $limit['limit'] += $boost;
                        $limit['status_boost'] += $boost;
                        break;
                    }
                }
            }

            $talentsBoost = [72, 49, 31];
            foreach ($talentsBoost as $boost) {
                $limit['limit'] += $this->getTalent($boost);
                $limit['talents_boost'] += $this->getTalent($boost);
            }

            $territoriesBoost = $this->getCompletedCategorizedAchievementData(14, 1);

            if ($territoriesBoost['index'] > 0) {
                $limit['limit'] += $territoriesBoost['index'] * 5;
                $limit['territories_boost'] = $territoriesBoost['index'] * 5;
            }

            $heroBoost = [0, 1, 2, 3, 14, 15, 13, 7, 4];

            foreach ($heroBoost as $boost) {
                $boostData = $this->getCompletedAchievementData($boost);
                if ($boostData['index'] === 0 && $boostData['time'] <= time()) {
                    $limit['limit'] += 5;
                    $limit['hero_boost'] += 5;
                }
            }
        }

        return $limit;
    }

    /**
     * @return int
     */
    public function getMaxLevel(): int
    {
        return $this->getValue($this->getExperience(), 'max_level', 0);
    }

    /**
     * @return array
     */
    public function getExperience(): array
    {
        $value = $this->getValue($this->getExperiences(), 'experience', []);

        return is_array($value) ? $value : [];
    }

    /**
     * @return int
     */
    public function getExperienceAmount(): int
    {
        return $this->getValue($this->getExperience(), 'amount', 0);
    }

    /**
     * @return array
     */
    public function getExperiences(): array
    {
        return $this->getValue($this->getUserModel(), 'experiences', []);
    }

    /**
     * @return int
     */
    public function getUserGuildLevel(): int
    {
        return $this->getValue($this->getUserGuild(), 'level', 0);
    }

    /**
     * @return int
     */
    public function getStatusLevel(): int
    {
        return $this->getValue($this->getStatus(), 'max_level', 0);
    }

    /**
     * @return array
     */
    public function getStatus(): array
    {
        return $this->getValue($this->getExperiences(), 'status', []);
    }

    /**
     * @param int $talent
     * @return int
     */
    public function getTalent(int $talent): int
    {
        return $this->getValue($this->getTalents(), $talent, 0);
    }

    /**
     * @return array
     */
    public function getTalents(): array
    {
        return $this->getValue($this->getUserModel(), 'talents', []);
    }

    /**
     * @return string
     */
    public function getStatusInfo(): string
    {
        return ($this->isActiveStatus() ? $this->asDuration($this->getStatusTime() - time()) : 'не активна');
    }

    /**
     * @return bool
     */
    public function isActiveStatus(): bool
    {
        return $this->getStatusTime() > time();
    }

    /**
     * @return int
     */
    public function getStatusTime(): int
    {
        return $this->getValue($this->getInterimResources(), 'status_time', 0);
    }

    /**
     * @return array
     */
    public function renderHtml (): array
    {
        $html = [];

        $html['level'] = $this->getMaxLevel() + 1;
        $html['achievement_points'] = $this->getAchievementsPoints();
        $html['boss_limit'] = $this->getBossLimit();
        $html['status']['time'] = $this->getStatusInfo();
        $html['experience'] = $this->getExpData();
        $html['division'] = $this->getDivisionNumeric() + 1;
        $html['division_info'] = $this->getDivisionData();
        $html['guild']['level'] = $this->getUserGuildLevel() + 1;
        $html['guild']['id'] = $this->getUserGuildID();
        $html['talents'] = $this->getUsedTalents();
        $html['army'] = $this->getArmyStrength();
        $html['status']['level'] = $this->getStatusLevel();
        $html['srut'] = $this->getSrutAmount();
        $html['last_login'] = $this->getLastLogin();
        $html['squad_name'] = $this->getSquadName();
        $html['damage'] = $this->getDamage();
        $html['decks_count'] = $this->getDecksCount();

        if ($html['last_login'] < 0) {
            $html['last_login'] = 'никогда';
        }

        for ($k = 3; $k < 10; $k++) {
            $html['weapons'][$k] = $this->getWeapon($k);
        }

        for ($k = 0; $k < 3; $k++) {
            $html['guild_weapons'][$k] = $this->getGuildWeapon($k);
        }

        return $html;
    }

    /**
     * @return array
     */
    public function getDivision(): array
    {
        return $this->getValue($this->getUserModel(), 'division', []);
    }

    /**
     * @return int
     */
    public function getDivisionNumeric(): int
    {
        return $this->getValue($this->getDivision(), 'h_div', 0);
    }

    /**
     * @return array
     */
    public function getDecks(): array {
        return $this->getValue($this->getUserModel(), 'decks', []);
    }

    /**
     * @return int
     */
    public function getDecksCount(): int {

        for ($k = 1, $decks = $this->getDecks(), $res = 0; $k < count($decks); $k++) {
            $res += count($this->getValue($decks, [$k, 'parts'], []));
        }

        return $res;
    }

    /**
     * @return array
     */
    public function getDivisionData(): array
    {
        $pack = (new Data)->get('divisions');
        $packNames = (new Data)->get('names');

        foreach ($pack as $index => $exp) {
            if ($this->getExperienceAmount() >= $exp) {
                $result = [
                    'name' => $packNames[$index] . ' дивизион',
                    'icon' => 'images/div_' . $index . '.png'
                ];
            }
        }

        return $result;
    }

    /**
     * @return int
     */
    public function getLastLogin(): int
    {
        $value = $this->getValue($this->getUserModel(), 'last_login', -1);

        return is_numeric($value) ? $value : -1;
    }

    public function getExpData (): array {
        $result = [
            'left' => 0,
            'have' => $this->getExperienceAmount(),
            'percentage' => 100,
        ];

        $pack = (new Data)->get('levels');
        $level = $this->getMaxLevel();

        if ($level < count($pack)) {
            $result['left'] = $pack[$level + 1] - $result['have'];
        }

        if ($result['left']) {
            $result['percentage'] = floor( $result['left'] / (($pack[$level + 1] - $pack[$level]) / 100) );
        }

        foreach ($result as &$val) {
            $val = $this->numFormat($val);
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getMoney(): array {
        $pack = (new Data)->get('money');
        $achievement = $this->getCompletedCategorizedAchievementData(5, 1);

        $result = ['count' => 0, 'time' => $this->ts2date(0)];

        if ($achievement['index'] > 0) {
            $result = [
                'count' => $this->numFormat($pack[$achievement['index']]),
                'time' => $this->ts2date($achievement['time']),
            ];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getSpirit(): array {
        $pack = (new Data)->get('spirit');
        $achievement = $this->getCompletedCategorizedAchievementData(6, 1);

        $result = ['count' => 0, 'time' => $this->ts2date(0)];

        if ($achievement['index'] > 0) {
            $result = [
                'count' => $this->numFormat($pack[$achievement['index']]),
                'time' => $this->ts2date($achievement['time']),
            ];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getEnergy(): array {
        $pack = (new Data)->get('energy');
        $achievement = $this->getCompletedCategorizedAchievementData(19, 1);

        $result = ['count' => 0, 'time' => $this->ts2date(0)];

        if ($achievement['index'] > 0) {
            $result = [
                'count' => $this->numFormat($pack[$achievement['index']]),
                'time' => $this->ts2date($achievement['time']),
            ];
        }

        return $result;
    }

    /**
     * @return array
     */
    public function getDamage(): array {
        $pack = (new Data)->get('damage');
        $achievement = $this->getCompletedCategorizedAchievementData(29, 2);

        $result = ['count' => 0, 'time' => $this->ts2date(0)];

        if ($achievement['index'] > 0) {
            $result = [
                'count' => $this->numFormat($pack[$achievement['index']]),
                'time' => $this->ts2date($achievement['time']),
            ];
        }

        return $result;
    }

    /**
     * @param int $wpn
     * @return array
     */
    public function getWeapon(int $wpn): array {
        $pack = (new Data)->get('weapons');
        $indexes = [3 => 6, 4 => 7, 5 => 8, 6 => 9, 7 => 10, 8 => 11, 9 => 12];
        $achievement = $this->getCompletedCategorizedAchievementData($indexes[$wpn], 1);

        $result = ['count' => 0, 'time' => $this->ts2date(0)];

        if ($achievement['index'] > 0) {
            $result = [
                'count' => $this->numFormat($pack[$achievement['index']]),
                'time' => $this->ts2date($achievement['time']),
            ];
        }

        return $result;
    }

    /**
     * @param int $wpn
     * @return array
     */
    public function getGuildWeapon(int $wpn): array {
        $pack = (new Data)->get('weapons');
        $indexes = [0, 1, 2];
        $achievement = $this->getCompletedCategorizedAchievementData($indexes[$wpn], 5);

        $result = ['count' => 0, 'time' => $this->ts2date(0)];

        if ($achievement['index'] > 0) {
            $result = [
                'count' => $this->numFormat($pack[$achievement['index']]),
                'time' => $this->ts2date($achievement['time']),
            ];
        }

        return $result;
    }

    /**
     * @param int $timestamp
     * @return string
     */
    public function asDuration(int $timestamp): string
    {
        $time = '';

        $plurals = [
            'd' => ['день', 'дня', 'дней'],
            'h' => ['час', 'часа', 'часов'],
            'm' => ['минута', 'минуты', 'минут'],
            's' => ['секунда', 'секунды', 'секунд']
        ];

        $strtime = [
            'd' => '',
            'h' => '',
            'm' => '',
            's' => ''
        ];

        $strtime['d'] = ($timestamp >= 86400 ? floor($timestamp / 86400) : false);
        $strtime['h'] = ($timestamp >= 3600 ? floor(($timestamp % 86400) / 3600) : false);
        $strtime['m'] = ($timestamp >= 60 ? floor(($timestamp % 3600) / 60) : false);
        $strtime['s'] = ($timestamp > 0 ? $timestamp % 60 : false);

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
    public function plural(int $n): int
    {
        if ($n % 10 == 1 && $n % 100 != 11) return 0;
        else if ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20)) return 1;
        else return 2;
    }

    /**
     * @return string
     */
    public function getSquadName(): string
    {
        return $this->getValue($this->getNames(), 'squad_name', 'Мой отряд');
    }

    /**
     * @return array
     */
    public function getNames(): array
    {
        return $this->getValue($this->getUserModel(), 'names', []);
    }

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
     * @return string
     */
    public function ts2date(int $timestamp): string
    {
        return date("d.m.Y в H:i:s", $timestamp);
    }
}