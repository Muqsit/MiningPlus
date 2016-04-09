<?php

namespace Muqsit;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\command\ConsoleCommandSender;

class Main extends PluginBase implements Listener{
/** @var array $breaks */
private $breaks;

// Thanks to @PrimusLV
public function e_block_break(BlockBreakEvent $event){
   if($event->isCancelled()) return;
   $name = strtolower(trim($event->getPlayer()->getName()));
   $this->breaks[]);
   if($this->breaks[$name] >= 128){
      $event->getPlayer()->sendMessage("§bWOHOOOO!"));
      $this->getServer()->dispatchCommand("effect $name 3 100 5");
     }
   }
}
