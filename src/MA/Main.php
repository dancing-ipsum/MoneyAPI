<?php

namespace MA;

use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerPreLoginEvent;

class Main extends PluginBase implements Listener{



public function onEnable(){
$this->getServer()->getLogger()->info("[MoneyAPI]Loaded!");

$this->getServer()->getPluginManager()->registerEvents($this,$this);
		 @mkdir($this->getDataFolder());
@mkdir($this->getDataFolder()."Players/");	
}

public function addMoney(Player $p, $amount){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
		$this->PlayerFile->set("Money",$amount);
	$this->PlayerFile->save();
}
public function onPlayerLogin(PlayerPreLoginEvent $event){
        $ign = $event->getPlayer()->getName();
        $player = $event->getPlayer();
        $file = ($this->getDataFolder()."Players/".$ign.".yml");  
            if(!file_exists($file)){
                $this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
                		$this->PlayerFile->set("Money",0);
                $this->PlayerFile->save();
            }
        }

}
