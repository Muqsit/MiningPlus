<?php

namespace Muqsit;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\entity\Effect;
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
	    $this->getServer()->getPluginManager()->registerEvents($this, $this);
		    @mkdir($this->getDataFolder());
	       # Config isn't used.
	       $this->getLogger()->info(" enabled"); # Don't add this log message at beggining of function it can be misleading
	}

	// Thanks to @PrimusLV
	public static function onBlockBreak(BlockBreakEvent $event){
	   if($event->isCancelled()) return;
	   $name = $event->getPlayer()->getName();
	   $player = $event->getPlayer();
	      if(self::$breaks[$name] >= 128){
	         $event->getPlayer()->sendMessage(TF::YELLOW . "You broke 128 blocks, " . TF::AQUA . "WHOOOO!");
	         self::giveEffect($player, 3, 100, 5);
	         self::$breaks[$name] = 0; # Reset the counter, to avoid ^^ spam.
	      }else{
	        self::$breaks[$name]++;
	      }
	}
	
	/**
	 * @param Player $player
	 * @param int $id
	 * @param int $duration
	 * @param int $amplifier
	 */
	public static function giveEffect(Player $player, $id, $duration, $amplifier){
		$effect = Effect::getEffect($id)->setDuration($duration)->setAmplifier($amplifier); # Fluent setters <3
		$player->addEffect($effect);
	}
}
