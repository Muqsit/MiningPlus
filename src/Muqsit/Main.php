<?php

namespace Muqsit;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat as TF;

class Main extends PluginBase implements Listener{
/** @var array $breaks */
private $breaks;
// Will you even be needing this?? :o
public function onEnable(){
    $this->getLogger()->info(" enabled");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
	    @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->reloadConfig();
        $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->yml = $yml->getAll();
        $this->saveResource("config.yml");
}

// Thanks to @PrimusLV
public function e_block_break(BlockBreakEvent $event){
   $player = $event->getPlayer();
   if($event->isCancelled()){
      return;
      $name = strtolower(trim($event->getPlayer()->getName()));
      $this->breaks[]);
      if($this->breaks[$name] >= 128){
         $event->getPlayer()->sendMessage(TF::YELLOW ."You broke 128 blocks, "TF::AQUA ."WHOOOO!"));
         $this->getServer()->dispatchCommand("effect $name 3 100 5");
         
      }else{
         $this->getServer()->dispatchCommand("effect $name 3 100 5"); // idk, talk to me about this 'your plans'
         break;
      }
   }
}
