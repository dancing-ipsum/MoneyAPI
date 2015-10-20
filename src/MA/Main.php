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
////////////////MONEY////////////////
public function addMoney(Player $p, $amount){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
		$this->PlayerFile->set("Money",$amount);
	$this->PlayerFile->save();
}

public function takeMoney(Player $p, $amount){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
$m = $this->PlayerFile->get("Money");
                $a = $m - $amount;
                $this->PlayerFile->set("Money", $a);
	$this->PlayerFile->save();
}

public function getMoney(Player $p){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
		//someone want to help?
}
////////////////MONEY////////////////

#BREAK

////////////////EXP////////////////
public function addEXP(Player $p, $amount){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
		$this->PlayerFile->set("EXP",$amount);
	$this->PlayerFile->save();
} 

public function takeEXP(Player $p, $amount){
				$ign = $p->getName();
			$this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
$m = $this->PlayerFile->get("EXP");
                $a = $m - $amount;
                $this->PlayerFile->set("EXP", $a);
	$this->PlayerFile->save();
}
////////////////EXP////////////////
public function onPlayerLogin(PlayerPreLoginEvent $event){
        $ign = $event->getPlayer()->getName();
        $player = $event->getPlayer();
        $file = ($this->getDataFolder()."Players/".$ign.".yml");  
        if(!file_exists($file)){
                $this->PlayerFile = new Config($this->getDataFolder()."Players/".$ign.".yml", Config::YAML);
                		$this->PlayerFile->set("Money",0);
                		 		$this->PlayerFile->set("EXP",0);
                $this->PlayerFile->save();
            }
        }

}
