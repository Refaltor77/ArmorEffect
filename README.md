## ArmorEffect

- Welcome to the plugin ArmorEffect created by Refaltor.</br>
It is a plugin that allows to easily add effects when the player wears armor.
  
## How to install ?

- Vous devez télécharger le plugin sur poggit puis le mettre dans le dossier </br>
'plugins' sur votre serveur PocketMine-MP</br>
  
- https://poggit.pmmp.io/p/ArmorEffect/1.5.0

## API

- Pour get l'API de ArmorEffect:
````PHP
$api = $this->getServer()->getPluginManager()->getPlugin('ArmorEffect');
````

- Functions:
````PHP
$api = $this->getServer()->getPluginManager()->getPlugin('ArmorEffect');

$array = $api->getAllArmors(); // array
$armor = $api->getArmorFromString('317:0'); // array
$effects = $api->getEffectByArmor('317:0'); // array
````

## Crédits

Creator: Refaltor</br>
Github: https://github.com/Refaltor77 </br>
Youtube: https://www.youtube.com/channel/UCN5uYUbzlozB9G5L5ph_eDw