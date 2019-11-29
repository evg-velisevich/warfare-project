/**
 * Main method
 */
$(document).ready(() => {
    $("#show").click(() => {
        $.getJSON("src/ajaxData.php", {"user_id": $("#userID").val()}, (response) => {
            if (response.error === false) {
                Script.show(response.response);
            } else {
                alert(response.error);
            }
        });
    });
});

/**
 *
 * @type {{setName: Script.setName, setMoney: Script.setMoney, setDecksCount: Script.setDecksCount, setWeapon: Script.setWeapon, setCountAchievementPoints: Script.setCountAchievementPoints, show: Script.show, setTitle: Script.setTitle, setEnergy: Script.setEnergy, setExpProgress: Script.setExpProgress, setStatusInfo: Script.setStatusInfo, setDamage: Script.setDamage, setWidth: Script.setWidth, setGuildInfo: Script.setGuildInfo, setLevel: Script.setLevel, setGuildWeapon: Script.setGuildWeapon, setDivisionInfo: Script.setDivisionInfo, setLogin: Script.setLogin, setSpirit: Script.setSpirit, setArmy: Script.setArmy, setGuildResource: Script.setGuildResource, getElem: (function(*=): any), setDecksLevel: Script.setDecksLevel, setTalents: Script.setTalents, setText: Script.setText}}
 */
var Script = {
    /**
     *
     * @param elem
     * @returns object
     */
    getElem: (elem) => {
        return document.querySelector(elem);
    },

    /**
     *
     * @param elem
     * @param text
     */
    setText: (elem, text) => {
        Script.getElem(elem).innerHTML = text;
    },

    /**
     *
     * @param elem
     * @param tooltip
     */
    setTitle: (elem, tooltip) => {
        Script.getElem(elem).setAttribute('title', tooltip);
    },

    /**
     *
     * @param elem
     * @param width
     */
    setWidth: (elem, width) => {
        Script.getElem(elem).setAttribute('style', 'width: ' + width + ';');
    },

    /**
     *
     * @param level
     */
    setLevel: (level) => {
        Script.setText(".level", level);
    },

    /**
     *
     * @param army
     */
    setArmy: (army) => {
        Script.setText(".army", army);
    },

    /**
     *
     * @param points
     */
    setCountAchievementPoints: (points) => {
        Script.setText(".ach_t", points);
    },

    /**
     *
     * @param talents
     */
    setTalents: (talents) => {
        Script.setText(".talents", talents);
    },

    /**
     *
     * @param exp
     * @param progress
     */
    setExpProgress: (exp, progress) => {
        Script.setTitle('.exp', 'До след. уровня осталось: ' + exp);
        Script.setWidth(".exp_line", progress + '%');
        Script.setText(".exp_text", progress + '%');
    },

    /**
     *
     * @param name
     */
    setName: (name) => {
        Script.setText(".name", name);
    },

    /**
     *
     * @param division_info
     * @param div_num
     * @param level
     */
    setDivisionInfo: (division_info, div_num, level) => {
        Script.getElem(".div_icon").setAttribute('src', division_info.icon);
        Script.setText('.level_div_text', level);
        Script.setText('.div_name_text_user', division_info.name + " #" + div_num);
    },

    /**
     *
     * @param login
     */
    setLogin: (login) => {
        Script.setText('.login', "Последний вход: " + login);
    },

    /**
     *
     * @param damage
     * @param limit
     */
    setDamage: (damage, limit) => {
        Script.setText('.damage', damage.count + ' [' + limit.limit + ']');
        Script.setText('.ranks', damage.ranks);
        Script.setTitle('.damage', "Дата получения: " + damage.time + "\n\nЛимит по боссам:\nБазовый: +15\nФронты: +" + limit.territories_boost + "\nРоты: +" + limit.guild_boost + "\nТаланты: +" + limit.talents_boost + "\nОрдена: +" + limit.hero_boost);
    },

    /**
     *
     * @param count
     */
    setDecksCount: (count) => {
        Script.setText('.c_tech', count);
    },

    /**
     *
     * @param level
     */
    setDecksLevel: (level) => {
        Script.setText('.srut', level);
    },

    /**
     *
     * @param guild
     */
    setGuildInfo: (guild) => {
        if (guild.id.indexOf('_') !== -1) {
            Script.setText('.pvplvl', "Рота: " + " [" + guild.level + " ур]");
        } else {
            Script.setText('.pvplvl', "Не в роте");
        }
    },

    /**
     *
     * @param status
     */
    setStatusInfo: (status) => {
        if (status.active) {
            Script.setText('.pvp_c', "Элита:<br>Ещё:");
            Script.setText('.pvp_cnt', "активна [" + status.level + " ур]<br>" + status.time);
            Script.setText('.not_a_elite', "");
            Script.setText('.n_a_e_time', "");
        } else {
            Script.setText('.not_a_elite', "Элита:");
            Script.setText('.n_a_e_time', "не активна");
            Script.setText('.pvp_c', "");
            Script.setText('.pvp_cnt', "");
        }
    },

    /**
     *
     * @param energy
     */
    setEnergy: (energy) => {
        Script.setText(".snaba", energy.count);
        Script.setTitle(".snaba", energy.time);
    },

    /**
     *
     * @param money
     */
    setMoney: (money) => {
        Script.setText(".rubli", money.count);
        Script.setTitle(".rubli", money.time);
    },

    /**
     *
     * @param spirit
     */
    setSpirit: (spirit) => {
        Script.setText(".spirit", spirit.count);
        Script.setTitle(".spirit", spirit.time);
    },

    /**
     *
     * @param weapon
     * @param weaponData
     */
    setWeapon: (weapon, weaponData) => {
        let selectors = ['', '', '', '.wpn1', '.wpn2', '.wpn3', '.wpn4', '.wpn5', '.wpn6', '.wpn7'];
        Script.setText(selectors[weapon], weaponData.count);
        Script.setTitle(selectors[weapon], weaponData.time);
    },

    /**
     *
     * @param weapon
     * @param weaponData
     */
    setGuildWeapon: (weapon, weaponData) => {
        let selectors = ['.wpn3_new', '.wpn4_new', '.wpn5_new'];
        Script.setText(selectors[weapon], weaponData.count);
        Script.setTitle(selectors[weapon], weaponData.time);
    },

    /**
     *
     * @param weapon
     * @param weaponData
     */
    setGuildResource: (weapon, weaponData) => {
        let selectors = ['.wpn6_new', '.wpn7_new'];
        Script.setText(selectors[weapon], weaponData.count);
        Script.setTitle(selectors[weapon], weaponData.time);
    },

    /**
     *
     * @param model
     */
    show: (model) => {
        Script.setLevel(model.level);
        Script.setArmy(model.army);
        Script.setCountAchievementPoints(model.achievement_points);
        Script.setTalents(model.talents);
        Script.setExpProgress(model.experience.left, model.experience.percentage);
        Script.setName(model.squad_name);
        Script.setDivisionInfo(model.division_info, model.division, model.level);
        Script.setLogin(model.last_login);
        Script.setDamage(model.damage, model.boss_limit);
        Script.setDecksCount(model.decks_count);
        Script.setDecksLevel(model.srut);
        Script.setGuildInfo(model.guild);
        Script.setStatusInfo(model.status);
        Script.setEnergy(model.energy);
        Script.setMoney(model.money);
        Script.setSpirit(model.spirit);

        for (var key in model.weapons) {
            Script.setWeapon(key, model.weapons[key]);
        }

        for (var key in model.guild_weapons) {
            Script.setGuildWeapon(key, model.guild_weapons[key]);
        }

        for (var key in model.guild_resources) {
            Script.setGuildResource(key, model.guild_resources[key]);
        }
    }
};