<?php


/*
 *        db        88888888ba  88b           d88   ,ad8888ba,   88888888ba     88888888888 88888888888 88888888888 88888888888 ,ad8888ba, 888888888888
 *       d88b       88      "8b 888b         d888  d8"'    `"8b  88      "8b    88          88          88          88         d8"'    `"8b     88
 *      d8'`8b      88      ,8P 88`8b       d8'88 d8'        `8b 88      ,8P    88          88          88          88        d8'               88
 *     d8'  `8b     88aaaaaa8P' 88 `8b     d8' 88 88          88 88aaaaaa8P'    88aaaaa     88aaaaa     88aaaaa     88aaaaa   88                88
 *    d8YaaaaY8b    88""""88'   88  `8b   d8'  88 88          88 88""""88'      88"""""     88"""""     88"""""     88"""""   88                88
 *   d8""""""""8b   88    `8b   88   `8b d8'   88 Y8,        ,8P 88    `8b      88          88          88          88        Y8,               88
 *  d8'        `8b  88     `8b  88    `888'    88  Y8a.    .a8P  88     `8b     88          88          88          88         Y8a.    .a8P     88
 * d8'          `8b 88      `8b 88     `8'     88   `"Y8888Y"'   88      `8b    88888888888 88          88          88888888888 `"Y8888Y"'      88
 *
 * -----------------
 *
 * By refaltor - PocketMine-MP Plugin free (https://github.com/Refaltor77/ArmorEffect) (! Refaltor#1000 on discord)
 */


namespace ArmorEffect\refaltor;

use ArmorEffect\refaltor\event\ArmorEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase
{
    /** @var Main */
    private static $ArmorEffect;

    public static function Config(): Main
    {
        return self::$ArmorEffect;
    }

    public function onEnable()
    {
        self::$ArmorEffect = $this;
        $this->saveDefaultConfig();
        Server::getInstance()->getPluginManager()->registerEvents(new ArmorEvent(), $this);
    }


    /*
     *      *
     *        db        88888888ba  88
     *       d88b       88      "8b 88
     *      d8'`8b      88      ,8P 88
     *     d8'  `8b     88aaaaaa8P' 88
     *    d8YaaaaY8b    88""""""'   88
     *   d8""""""""8b   88          88
     *  d8'        `8b  88          88
     * d8'          `8b 88          88
     *
     */


    /**
     * You return all the armor configure on array.
     *
     * @return array
     */
    public function getAllArmor(): array{
        return $this->getConfig()->getAll();
    }


    /**
     * You return the carracteristics of an armor on array.
     *
     * @param string $string
     * @return array
     */
    public function getArmorFromString(string $string): array{
        return $this->getConfig()->get($string);
    }


    /**
     * You return the effects of a desired armor as an array.
     *
     * @param string $string
     * @return array
     */
    public function getEffectByArmor(string $string): array{
        return $this->getConfig()->get($string)['effect'];
    }
}
