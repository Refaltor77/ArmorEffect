<?php

namespace ArmorEffect\refaltor\event;

use ArmorEffect\refaltor\Main;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\entity\EntityArmorChangeEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\Player;

class ArmorEvent implements Listener
{
    public function onArmorChangeEvent(EntityArmorChangeEvent $event)
    {
        $player = $event->getEntity();
        $getAll = Main::Config()->getConfig()->getAll();
        $ancien = $event->getOldItem();
        $nouveau = $event->getNewItem();
        if ($player instanceof Player) {
            $inConfigIds = array_keys($getAll);
            if (in_array($nouveau->getId() . ':' . $nouveau->getDamage(), $inConfigIds)) {
                $armor = Main::Config()->getConfig()->getAll()[$nouveau->getId() . ':' . $nouveau->getDamage()];
                $effect = $armor["effect"];
                foreach ($effect as $id => $values) {
                    $player->addEffect(new EffectInstance(Effect::getEffect($id), 2147483646, intval($values["niveau"]), (bool)$values["visible"]));
                }
            } elseif (in_array($ancien->getId(), $inConfigIds)) {
                $armor = Main::Config()->getConfig()->getAll()[$ancien->getId() . ':' . $ancien->getDamage()];
                $effect = $armor["effect"];
                foreach ($effect as $id => $values) {
                    $player->removeEffect($id);
                }
            }
        }
    }

    public function onRespawn(PlayerRespawnEvent $event): void
    {
        $player = $event->getPlayer();
        $armor = $player->getArmorInventory();
        $array = [$armor->getHelmet(), $armor->getChestplate(), $armor->getLeggings(), $armor->getBoots()];
        foreach ($array as $item) {
            if ($item instanceof Item) {
                if ($item->getId() !== 0) {
                    if (in_array($item->getId() . ':' . $item->getDamage(), Main::Config()->getConfig()->getAll())) {
                        $effect = Main::Config()->getConfig()->get($item->getId() . ':' . $item->getDamage())['effect'];
                        foreach ($effect as $id => $values) {
                            $player->addEffect(new EffectInstance(Effect::getEffect($id), 2147483646, intval($values["niveau"]), (bool)$values["visible"]));
                        }
                    }
                }
            }
        }
    }
}
