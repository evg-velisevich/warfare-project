var classes = [
    {
        "name": "src\\Script\\Game",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUserID",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "socialGet",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "gameApi",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserID",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAuthKey",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAuthKey",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "curlRequest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isCorrectPack",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 9,
        "nbMethods": 7,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 7,
        "nbMethodsGetter": 2,
        "nbMethodsSetters": 0,
        "wmc": 10,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "src\\Script\\Script"
        ],
        "parents": [],
        "lcom": 2,
        "length": 84,
        "vocabulary": 26,
        "volume": 394.84,
        "difficulty": 7.26,
        "effort": 2867.27,
        "level": 0.14,
        "bugs": 0.13,
        "time": 159,
        "intelligentContent": 54.37,
        "number_operators": 23,
        "number_operands": 61,
        "number_operators_unique": 5,
        "number_operands_unique": 21,
        "cloc": 51,
        "loc": 103,
        "lloc": 52,
        "mi": 88.45,
        "mIwoC": 44.12,
        "commentWeight": 44.33,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 1.15,
        "relativeSystemComplexity": 50.15,
        "totalStructuralComplexity": 441,
        "totalDataComplexity": 10.38,
        "totalSystemComplexity": 451.38,
        "package": "src\\Script\\",
        "pageRank": 0.11,
        "afferentCoupling": 2,
        "efferentCoupling": 1,
        "instability": 0.33,
        "violations": {}
    },
    {
        "name": "src\\Script\\Ajax",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "getReady",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getResponse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setResponse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isValidRequest",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "startRender",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setError",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "src\\Script\\Script",
            "src\\Script\\Game",
            "src\\Script\\ViewData"
        ],
        "parents": [],
        "lcom": 2,
        "length": 30,
        "vocabulary": 11,
        "volume": 103.78,
        "difficulty": 4.13,
        "effort": 428.1,
        "level": 0.24,
        "bugs": 0.03,
        "time": 24,
        "intelligentContent": 25.16,
        "number_operators": 8,
        "number_operands": 22,
        "number_operators_unique": 3,
        "number_operands_unique": 8,
        "cloc": 22,
        "loc": 52,
        "lloc": 30,
        "mi": 95.54,
        "mIwoC": 53.26,
        "commentWeight": 42.28,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.87,
        "relativeSystemComplexity": 16.87,
        "totalStructuralComplexity": 96,
        "totalDataComplexity": 5.2,
        "totalSystemComplexity": 101.2,
        "package": "src\\Script\\",
        "pageRank": 0.04,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "src\\Script\\Data",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 4,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [],
        "parents": [],
        "lcom": 1,
        "length": 10,
        "vocabulary": 5,
        "volume": 23.22,
        "difficulty": 2.67,
        "effort": 61.92,
        "level": 0.38,
        "bugs": 0.01,
        "time": 3,
        "intelligentContent": 8.71,
        "number_operators": 2,
        "number_operands": 8,
        "number_operators_unique": 2,
        "number_operands_unique": 3,
        "cloc": 13,
        "loc": 30,
        "lloc": 17,
        "mi": 105.93,
        "mIwoC": 63.33,
        "commentWeight": 42.6,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.67,
        "relativeSystemComplexity": 1.67,
        "totalStructuralComplexity": 3,
        "totalDataComplexity": 2,
        "totalSystemComplexity": 5,
        "package": "src\\Script\\",
        "pageRank": 0.39,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "src\\Script\\ViewData",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "prepare",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 5,
        "ccn": 3,
        "ccnMethodMax": 3,
        "externals": [
            "src\\Script\\Script",
            "src\\Script\\Game"
        ],
        "parents": [],
        "lcom": 1,
        "length": 43,
        "vocabulary": 18,
        "volume": 179.31,
        "difficulty": 7.75,
        "effort": 1389.63,
        "level": 0.13,
        "bugs": 0.06,
        "time": 77,
        "intelligentContent": 23.14,
        "number_operators": 12,
        "number_operands": 31,
        "number_operators_unique": 6,
        "number_operands_unique": 12,
        "cloc": 20,
        "loc": 49,
        "lloc": 29,
        "mi": 93.71,
        "mIwoC": 51.92,
        "commentWeight": 41.79,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.53,
        "relativeSystemComplexity": 16.53,
        "totalStructuralComplexity": 48,
        "totalDataComplexity": 1.6,
        "totalSystemComplexity": 49.6,
        "package": "src\\Script\\",
        "pageRank": 0.06,
        "afferentCoupling": 1,
        "efferentCoupling": 2,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "src\\Script\\Script",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "renderHtml",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMaxLevel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getValue",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getExperience",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getExperiences",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserModel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUserModel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAchievementsPoints",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStaticResources",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBossLimit",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserGuildLevel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserGuild",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isActiveStatus",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatusTime",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getInterimResources",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatusLevel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatus",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTalent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTalents",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCompletedCategorizedAchievementData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAchievementData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCompletedCategorizedAchievements",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCompletedAchievementData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCompletedAchievements",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStatusInfo",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getExpData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getExperienceAmount",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDivisionNumeric",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDivision",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDivisionData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUserGuildID",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUsedTalents",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getArmyStrength",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSrutAmount",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSrut",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStaticMaximumResources",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getLastLogin",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSquadName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNames",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDamage",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAchievementText",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getResourceData",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDecksCount",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDecks",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getWeapon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGuildWeapon",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGuildResources",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isValidModel",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 50,
        "nbMethods": 50,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 48,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 94,
        "ccn": 45,
        "ccnMethodMax": 12,
        "externals": [
            "src\\Script\\MyFormatter",
            "src\\Script\\Data",
            "src\\Script\\Data",
            "src\\Script\\Data",
            "src\\Script\\Data",
            "src\\Script\\Data"
        ],
        "parents": [
            "src\\Script\\MyFormatter"
        ],
        "lcom": 1,
        "length": 849,
        "vocabulary": 148,
        "volume": 6120.83,
        "difficulty": 44.31,
        "effort": 271199.67,
        "level": 0.02,
        "bugs": 2.04,
        "time": 15067,
        "intelligentContent": 138.14,
        "number_operators": 209,
        "number_operands": 640,
        "number_operators_unique": 18,
        "number_operands_unique": 130,
        "cloc": 171,
        "loc": 524,
        "lloc": 353,
        "mi": 50.55,
        "mIwoC": 11.86,
        "commentWeight": 38.7,
        "kanDefect": 3.09,
        "relativeStructuralComplexity": 2601,
        "relativeDataComplexity": 0.99,
        "relativeSystemComplexity": 2601.99,
        "totalStructuralComplexity": 130050,
        "totalDataComplexity": 49.42,
        "totalSystemComplexity": 130099.42,
        "package": "src\\Script\\",
        "pageRank": 0.28,
        "afferentCoupling": 3,
        "efferentCoupling": 2,
        "instability": 0.4,
        "violations": {}
    },
    {
        "name": "src\\Script\\MyFormatter",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "numFormat",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "asDuration",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDaysByTimeStamp",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHoursByTimeStamp",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMinutesByTimestamp",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSecondsByTimestamp",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPlurals",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getParsedTime",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "plural",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "ts2date",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 23,
        "ccn": 14,
        "ccnMethodMax": 7,
        "externals": [],
        "parents": [],
        "lcom": 3,
        "length": 155,
        "vocabulary": 55,
        "volume": 896.11,
        "difficulty": 18.95,
        "effort": 16982.39,
        "level": 0.05,
        "bugs": 0.3,
        "time": 943,
        "intelligentContent": 47.29,
        "number_operators": 44,
        "number_operands": 111,
        "number_operators_unique": 14,
        "number_operands_unique": 41,
        "cloc": 44,
        "loc": 98,
        "lloc": 54,
        "mi": 82.72,
        "mIwoC": 39.65,
        "commentWeight": 43.07,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 49,
        "relativeDataComplexity": 1.39,
        "relativeSystemComplexity": 50.39,
        "totalStructuralComplexity": 490,
        "totalDataComplexity": 13.88,
        "totalSystemComplexity": 503.88,
        "package": "src\\Script\\",
        "pageRank": 0.11,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    }
]