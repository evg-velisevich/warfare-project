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
            "src\\Script\\Data",
            "parent",
            "dimsog\\arrayhelper\\ArrayHelper"
        ],
        "parents": [
            "src\\Script\\Data"
        ],
        "lcom": 2,
        "length": 83,
        "vocabulary": 26,
        "volume": 390.14,
        "difficulty": 7.14,
        "effort": 2786.69,
        "level": 0.14,
        "bugs": 0.13,
        "time": 155,
        "intelligentContent": 54.62,
        "number_operators": 23,
        "number_operands": 60,
        "number_operators_unique": 5,
        "number_operands_unique": 21,
        "cloc": 51,
        "loc": 103,
        "lloc": 52,
        "mi": 88.49,
        "mIwoC": 44.15,
        "commentWeight": 44.33,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 1.02,
        "relativeSystemComplexity": 65.02,
        "totalStructuralComplexity": 576,
        "totalDataComplexity": 9.22,
        "totalSystemComplexity": 585.22,
        "package": "src\\Script\\",
        "pageRank": 0.08,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
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
                "name": "startRender",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getViewData",
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
        "ccnMethodMax": 2,
        "externals": [
            "src\\Script\\ViewData"
        ],
        "parents": [],
        "lcom": 1,
        "length": 38,
        "vocabulary": 9,
        "volume": 120.46,
        "difficulty": 10.4,
        "effort": 1252.75,
        "level": 0.1,
        "bugs": 0.04,
        "time": 70,
        "intelligentContent": 11.58,
        "number_operators": 12,
        "number_operands": 26,
        "number_operators_unique": 4,
        "number_operands_unique": 5,
        "cloc": 25,
        "loc": 63,
        "lloc": 38,
        "mi": 91.98,
        "mIwoC": 50.57,
        "commentWeight": 41.41,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.72,
        "relativeSystemComplexity": 25.72,
        "totalStructuralComplexity": 150,
        "totalDataComplexity": 4.33,
        "totalSystemComplexity": 154.33,
        "package": "src\\Script\\",
        "pageRank": 0.04,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "src\\Script\\UserModel",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "get",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "set",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "has",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getModel",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setModel",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 6,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "src\\Script\\App",
            "src\\Script\\UserModel"
        ],
        "parents": [
            "src\\Script\\App"
        ],
        "lcom": 1,
        "length": 28,
        "vocabulary": 7,
        "volume": 78.61,
        "difficulty": 4.2,
        "effort": 330.14,
        "level": 0.24,
        "bugs": 0.03,
        "time": 18,
        "intelligentContent": 18.72,
        "number_operators": 7,
        "number_operands": 21,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 24,
        "loc": 51,
        "lloc": 27,
        "mi": 98.92,
        "mIwoC": 55.24,
        "commentWeight": 43.68,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 3.1,
        "relativeSystemComplexity": 4.1,
        "totalStructuralComplexity": 5,
        "totalDataComplexity": 15.5,
        "totalSystemComplexity": 20.5,
        "package": "src\\Script\\",
        "pageRank": 0.25,
        "afferentCoupling": 3,
        "efferentCoupling": 3,
        "instability": 0.5,
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
        "pageRank": 0.09,
        "afferentCoupling": 2,
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
                "name": "prepare",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getScript",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGame",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getApp",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 4,
        "nbMethodsPrivate": 3,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 12,
        "ccn": 8,
        "ccnMethodMax": 5,
        "externals": [
            "src\\Script\\App",
            "src\\Script\\Script",
            "src\\Script\\Game",
            "src\\Script\\App"
        ],
        "parents": [
            "src\\Script\\App"
        ],
        "lcom": 1,
        "length": 62,
        "vocabulary": 20,
        "volume": 267.96,
        "difficulty": 12.67,
        "effort": 3394.15,
        "level": 0.08,
        "bugs": 0.09,
        "time": 189,
        "intelligentContent": 21.15,
        "number_operators": 24,
        "number_operands": 38,
        "number_operators_unique": 8,
        "number_operands_unique": 12,
        "cloc": 29,
        "loc": 77,
        "lloc": 48,
        "mi": 85.94,
        "mIwoC": 45.25,
        "commentWeight": 40.69,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 81.5,
        "totalStructuralComplexity": 405,
        "totalDataComplexity": 2.5,
        "totalSystemComplexity": 407.5,
        "package": "src\\Script\\",
        "pageRank": 0.1,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "src\\Script\\Script",
        "interface": false,
        "abstract": false,
        "methods": [
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
            }
        ],
        "nbMethodsIncludingGettersSetters": 46,
        "nbMethods": 46,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 45,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 81,
        "ccn": 36,
        "ccnMethodMax": 12,
        "externals": [
            "src\\Script\\Formatter",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "src\\Script\\UserModel",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper",
            "src\\Script\\Data",
            "src\\Script\\Data",
            "dimsog\\arrayhelper\\ArrayHelper",
            "dimsog\\arrayhelper\\ArrayHelper"
        ],
        "parents": [
            "src\\Script\\Formatter"
        ],
        "lcom": 1,
        "length": 799,
        "vocabulary": 150,
        "volume": 5775.83,
        "difficulty": 40.43,
        "effort": 233527.15,
        "level": 0.02,
        "bugs": 1.93,
        "time": 12974,
        "intelligentContent": 142.85,
        "number_operators": 206,
        "number_operands": 593,
        "number_operators_unique": 18,
        "number_operands_unique": 132,
        "cloc": 156,
        "loc": 489,
        "lloc": 333,
        "mi": 52.17,
        "mIwoC": 13.79,
        "commentWeight": 38.38,
        "kanDefect": 2.65,
        "relativeStructuralComplexity": 2500,
        "relativeDataComplexity": 0.91,
        "relativeSystemComplexity": 2500.91,
        "totalStructuralComplexity": 115000,
        "totalDataComplexity": 41.78,
        "totalSystemComplexity": 115041.78,
        "package": "src\\Script\\",
        "pageRank": 0.08,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    },
    {
        "name": "src\\Script\\App",
        "interface": false,
        "abstract": false,
        "methods": [
            {
                "name": "getMethod",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHeaders",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "hasHeader",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHeader",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isGet",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isAjax",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 6,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 18,
        "ccn": 13,
        "ccnMethodMax": 8,
        "externals": [],
        "parents": [],
        "lcom": 1,
        "length": 97,
        "vocabulary": 28,
        "volume": 466.31,
        "difficulty": 7.39,
        "effort": 3446.66,
        "level": 0.14,
        "bugs": 0.16,
        "time": 191,
        "intelligentContent": 63.09,
        "number_operators": 29,
        "number_operands": 68,
        "number_operators_unique": 5,
        "number_operands_unique": 23,
        "cloc": 30,
        "loc": 93,
        "lloc": 63,
        "mi": 78.85,
        "mIwoC": 40.31,
        "commentWeight": 38.53,
        "kanDefect": 1.33,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 2.07,
        "relativeSystemComplexity": 18.07,
        "totalStructuralComplexity": 96,
        "totalDataComplexity": 12.4,
        "totalSystemComplexity": 108.4,
        "package": "src\\Script\\",
        "pageRank": 0.33,
        "afferentCoupling": 2,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "src\\Script\\Formatter",
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
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 19,
        "ccn": 14,
        "ccnMethodMax": 7,
        "externals": [],
        "parents": [],
        "lcom": 3,
        "length": 139,
        "vocabulary": 55,
        "volume": 803.61,
        "difficulty": 16.9,
        "effort": 13582.95,
        "level": 0.06,
        "bugs": 0.27,
        "time": 755,
        "intelligentContent": 47.54,
        "number_operators": 40,
        "number_operands": 99,
        "number_operators_unique": 14,
        "number_operands_unique": 41,
        "cloc": 28,
        "loc": 66,
        "lloc": 38,
        "mi": 85.63,
        "mIwoC": 43.31,
        "commentWeight": 42.32,
        "kanDefect": 0.45,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 1.79,
        "relativeSystemComplexity": 10.79,
        "totalStructuralComplexity": 54,
        "totalDataComplexity": 10.75,
        "totalSystemComplexity": 64.75,
        "package": "src\\Script\\",
        "pageRank": 0.04,
        "afferentCoupling": 1,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    }
]