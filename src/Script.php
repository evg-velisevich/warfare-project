<?php

namespace src\Script;

class Script extends MyFormatter
{

    /**
     * @var array
     */
    protected $userModel = [];

    /**
     * @var Data
     */
    private $data = null;

    public function __construct()
    {
        $this->data = new Data();
    }

    /**
     * @return array
     */
    public function renderHtml(): array
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
        $html['status']['active'] = $this->isActiveStatus();
        $html['srut'] = $this->getSrutAmount();
        $html['last_login'] = $this->getLastLogin();
        $html['squad_name'] = $this->getSquadName();
        $html['damage'] = $this->getDamage();
        $html['spirit'] = $this->getResourceData('spirit', 1, 6);
        $html['money'] = $this->getResourceData('money', 1, 5);
        $html['energy'] = $this->getResourceData('energy', 1, 19);
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

        for ($k = 0; $k < 2; $k++) {
            $html['guild_resources'][$k] = $this->getGuildResources($k);
        }

        return $html;
    }

    /**
     * @return int
     */
    public function getMaxLevel(): int
    {
        return $this->getValue($this->getExperience(), 'max_level', 0);
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
    public function getExperience(): array
    {
        $value = $this->getValue($this->getExperiences(), 'experience', []);

        return is_array($value) ? $value : [];
    }

    /**
     * @return array
     */
    public function getExperiences(): array
    {
        return $this->getValue($this->getUserModel(), 'experiences', []);
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
     * @return int
     */
    public function getAchievementsPoints(): int
    {
        return $this->getValue($this->getStaticResources(), 'achievement_points', 0);
    }

    /**
     * @return array
     */
    public function getStaticResources(): array
    {
        return $this->getValue($this->getUserModel(), 'static_resources', []);
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
    public function getUserGuildLevel(): int
    {
        return $this->getValue($this->getUserGuild(), 'level', 0);
    }

    /**
     * @return array
     */
    public function getUserGuild(): array
    {
        $guild =  $this->getValue($this->getUserModel(), 'user_guild', []);

        return is_array($guild) ? $guild : [];
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
    public function getInterimResources(): array
    {
        return $this->getValue($this->getUserModel(), 'interim_resources', []);
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
     * @param int $achievementIndex
     * @param int $achievementCategory
     * @return array
     */
    public function getCompletedCategorizedAchievementData(int $achievementIndex, int $achievementCategory): array
    {
        return $this->getAchievementData($this->getCompletedCategorizedAchievements(), $achievementIndex, $achievementCategory);
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
     * @return array
     */
    public function getCompletedCategorizedAchievements(): array
    {
        return $this->getValue($this->getUserModel(), 'completed_categorized_achievements', []);
    }

    /**
     * @param int $achievementIndex
     * @return array
     */
    public function getCompletedAchievementData(int $achievementIndex): array
    {
        return $this->getAchievementData($this->getCompletedAchievements(), $achievementIndex);
    }

    /**
     * @return array
     */
    private function getCompletedAchievements(): array
    {
        return $this->getValue($this->getUserModel(), 'completed_achievements', []);
    }

    /**
     * @return string
     */
    public function getStatusInfo(): string
    {
        return ($this->isActiveStatus() ? $this->asDuration($this->getStatusTime() - time(), true) : 'не активна');
    }

    public function getExpData(): array
    {
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
            $result['percentage'] = floor($result['left'] / (($pack[$level + 1] - $pack[$level]) / 100));
        }

        foreach ($result as &$val) {
            $val = $this->numFormat($val);
        }

        return $result;
    }

    /**
     * @return int
     */
    public function getExperienceAmount(): int
    {
        return $this->getValue($this->getExperience(), 'amount', 0);
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
    public function getDivision(): array
    {
        return $this->getValue($this->getUserModel(), 'division', []);
    }

    /**
     * @return array
     */
    public function getDivisionData(): array
    {
        $pack = (new Data)->get('divisions');
        $packNames = (new Data)->get('names');
        $result = [
            'name' => '',
            'time' => '0'
        ];

        foreach ($pack as $index => $exp) {
            if ($this->getExperienceAmount() >= $exp) {
                $result = [
                    'name' => $packNames[$index] . ' дивизион',
                    'icon' => 'icons/div_' . $index . '.png'
                ];
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getUserGuildID(): string
    {
        return $this->getValue($this->getUserGuild(), 'id', '');
    }

    /**
     * @return int
     */
    public function getUsedTalents(): int
    {
        return $this->getValue($this->getStaticResources(), 'used_talents', 0);
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
     * @return string
     */
    public function getLastLogin(): string
    {
        $value = $this->getValue($this->getUserModel(), 'last_login');

        return $value !== null ? $this->asDuration(time() - $value) . ' назад' : 'никогда';
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
     * @return array
     */
    public function getDamage(): array
    {
        $pack = $this->getData()->get('damage');
        $achievement = $this->getCompletedCategorizedAchievementData(29, 2);

        $result = $this->getAchievementText($pack, $achievement);
        $result['ranks'] = '';

        for ($k = 0, $i = 0; $k < 2; $k++) {
            $result['ranks'] .= '<div id="ranks-line">';
            for ($x = 0; $x < 31; $x++, $i++) {
                $img = ($achievement['index'] >= $i ? 'rank_open.png' : 'rank_close.png');
                $result['ranks'] .= '<img style="width: 10px;height: 10px;" src="images/' . $img . '">';
            }
            $result['ranks'] .= '</div>';
        }

        return $result;
    }

    /**
     * @return Data
     */
    public function getData(): Data
    {
        return $this->data;
    }

    /**
     * @param array $pack
     * @param array $achievement
     * @return array
     */
    public function getAchievementText(array $pack, array $achievement): array
    {
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
     * @param string $packKey
     * @param int $c
     * @param int $i
     * @return array
     */
    public function getResourceData(string $packKey, int $c, int $i): array
    {
        $pack = $this->getData()->get($packKey);
        $achievement = $this->getCompletedCategorizedAchievementData($i, $c);

        return $this->getAchievementText($pack, $achievement);
    }

    /**
     * @return int
     */
    public function getDecksCount(): int
    {

        for ($k = 1, $decks = $this->getDecks(), $res = 0; $k < count($decks); $k++) {
            $res += count($this->getValue($decks, [$k, 'parts'], []));
        }

        return $res;
    }

    /**
     * @return array
     */
    public function getDecks(): array
    {
        return $this->getValue($this->getUserModel(), 'decks', []);
    }

    /**
     * @param int $wpn
     * @return array
     */
    public function getWeapon(int $wpn): array
    {
        $pack = $this->getData()->get('weapons');
        $indexes = [3 => 6, 4 => 7, 5 => 8, 6 => 9, 7 => 10, 8 => 11, 9 => 12];
        $achievement = $this->getCompletedCategorizedAchievementData($indexes[$wpn], 2);

        return $this->getAchievementText($pack, $achievement);
    }

    /**
     * @param int $wpn
     * @return array
     */
    public function getGuildWeapon(int $wpn): array
    {
        $pack = $this->getData()->get('weapons');
        $indexes = [0, 1, 2];
        $achievement = $this->getCompletedCategorizedAchievementData($indexes[$wpn], 5);

        return $this->getAchievementText($pack, $achievement);
    }

    /**
     * @param int $resource
     * @return array
     */
    public function getGuildResources(int $resource): array
    {
        $pack = $this->getData()->get('guild');
        $indexes = [3, 4];
        $achievement = $this->getCompletedCategorizedAchievementData($indexes[$resource], 5);

        return $this->getAchievementText($pack, $achievement);
    }

    /**
     * @param array $model
     * @return bool
     */
    protected function isValidModel(array $model): bool
    {
        return array_key_exists('completed_categorized_achievements', $model) && array_key_exists('last_login', $model);
    }
}