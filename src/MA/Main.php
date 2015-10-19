
<?php

namespace MA;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerLoginEvent;

class Main extends PluginBase implements Listener{

public function onLoad(){
@mkdir($this->getDataFolder()."Players/");
$this->getServer()->getLogger()->info("[MoneyAPI]Loaded!");
}

public function onEnable(){
$this->getServer()->getLogger()->info("[MoneyAPI]Loaded!");
}

public function giveMoney(Player $p, $amount){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
		$this->PlayerFile->set("Money",$amount);
	$this->PlayerFile->save();
}

public function onLogin(PlayerLoginEvent $event){
$ign = $event->getPlayer()->getName();
$player = $event->getPlayer();
$file = ($this->getDataFolder()."Players/".$ign.".yml");  
if(!file_exists($file)){
$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
$this->PlayerFile->set("Money","0");
$this->PlayerFile->save();
		}
	}
}
