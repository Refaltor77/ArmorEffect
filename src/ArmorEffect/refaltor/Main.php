<?php

namespace ArmorEffect\refaltor;

use ArmorEffect\refaltor\event\ArmorEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class Main extends PluginBase
{
    /** @var Main */
    private static $ArmorEffect;

    public static function Config(){
    return self::$ArmorEffect;
    }

    public function onEnable(){
    self::$ArmorEffect = $this;
    $this->saveDefaultConfig();
    Server::getInstance()->getPluginManager()->registerEvents(new ArmorEvent(), $this);
    }
}
