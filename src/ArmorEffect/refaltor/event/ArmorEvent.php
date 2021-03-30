<?php

namespace ArmorEffect\refaltor\event;

use ArmorEffect\refaltor\Main;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\entity\EntityArmorChangeEvent;
use pocketmine\event\Listener;
use pocketmine\Player;

class ArmorEvent implements Listener
{
    public function onArmorChangeEvent(EntityArmorChangeEvent $event){
    $player = $event->getEntity();
    $getAll = Main::Config()->getConfig()->getAll();
    $ancien = $event->getOldItem();
    $nouveau = $event->getNewItem();
     if ($player instanceof Player){
     $inConfigIds = array_keys($getAll);
     if (in_array($nouveau->getId(), $inConfigIds)){
      $armor = Main::Config()->getConfig()->getAll()[$nouveau->getId()];
      $effect = $armor["effect"];
       foreach($effect as $id => $values){
       $player->addEffect(new EffectInstance(Effect::getEffect($id), 2147483646, $values["niveau"], $values["visible"]));
       }
      }elseif(in_array($ancien->getId(), $inConfigIds)){
       $armor = Main::Config()->getConfig()->getAll()[$ancien->getId()];
       $effect = $armor["effect"];
        foreach ($effect as $id => $values){
        $player->removeEffect($id);
        }
      }
     }
    }
}
