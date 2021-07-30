<?php

declare(strict_types=1);

namespace twiqk\LogDrops;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveResource("data.yml");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onDrop(PlayerDropItemEvent $event) {
        $data = $this->myConfig = new Config($this->getDataFolder() . "data.yml", Config::YAML);
        $data->set($event->getPlayer()->getName() . " dropped " . $event->getItem()->getName() . " of " . $event->getItem()->getName());
        $data->save();
    }

    public function onDisable(){
        $this->saveResource("data.yml");
    }

}
