<?php

namespace HenryDM\Compact;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\item\ItemFactory;
use pocketmine\player\Player;
use pocketmine\event\block\BlockBreakEvent;

class Main extends PluginBase implements Listener {

    public $autocompact = [];
    
    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this); 
        $this->loadVersion();
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
        switch ($command->getName()) {
            case "compact":
                if($sender instanceof Player) {
                    $this->compact($sender);
                } else {
                    $sender->sendMessage($this->getConfig()->get("in-game"));
                break;
            }
        }
        return true;
    }

    public function compact($sender) {

# =========================================================================        
        $inv = $sender->getInventory()->getItemInHand()->getId();
        $count = $sender->getInventory()->getItemInHand()->getCount();
        $mcompact = $this->getConfig()->get("min-ores-compact");
        $world = $sender->getWorld();
        $worldName = $world->getFolderName();
        $coalOID = $this->getConfig()->get("coal-ore-id");
        $coalBID = $this->getConfig()->get("coal-block-id");
        $ironOID = $this->getConfig()->get("iron-ore-id");
        $ironBID = $this->getConfig()->get("iron-block-id");
        $goldOID = $this->getConfig()->get("gold-ore-id");
        $goldBID = $this->getConfig()->get("gold-block-id");
        $diamondOID = $this->getConfig()->get("diamond-ore-id");
        $diamondBID = $this->getConfig()->get("diamond-block-id");
        $emeraldOID = $this->getConfig()->get("emerald-ore-id");
        $emeraldBID = $this->getConfig()->get("emerald-block-id");
        $cbg = $this->getConfig()->get("blocks-give-compact");
        $mtype = $this->getConfig()->get("message-type");
        $nhitemsa = $this->getConfig()->get("no-sufficient-items-alert");
        $nhitemm = str_replace(["&", "{line}"], ["§", "\n"], $this->getConfig()->get("no-sufficient-items-message"));
        $sucesscma = $this->getConfig()->get("sucess-compact-alert"); 
        $sucessm = str_replace(["&", "{line}"], ["§", "\n"], $this->getConfig()->get("sucess-compact-message"));
# =========================================================================

# ==================
#    COAL COMPACT
# ==================

        if($this->getConfig()->get("coal-compact") === true) {
                if($inv === $coalOID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem(ItemFactory::getInstance()->get($coalOID, 0, $mcompact));
                            $sender->getInventory()->addItem(ItemFactory::getInstance()->get($coalBID, 0, $cbg));
                            if($sucesscma === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitems === true) {
                            if($mtype === "message") {
                                $sender->sendMessage($nhitemsm);
                            }
    
                            if($mtype === "popup") {
                                $sender->sendPopup($nhitemsm);
                            }
                        }
                    }
                }
            }

# ==================
#    IRON COMPACT
# ==================

        if($this->getConfig()->get("iron-compact") === true) {
                if($inv === $ironOID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem(ItemFactory::getInstance()->get($ironOID, 0, $mcompact));
                            $sender->getInventory()->addItem(ItemFactory::getInstance()->get($ironBID, 0, $cbg));
                            if($sucesscma === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitems === true) {
                            if($mtype === "message") {
                                $sender->sendMessage($nhitemsm);
                            }
    
                            if($mtype === "popup") {
                                $sender->sendPopup($nhitemsm);
                            }
                        }
                    }
                }
            }
            
# ==================
#    GOLD COMPACT
# ==================

        if($this->getConfig()->get("gold-compact") === true) {
                if($inv === $ironOID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem(ItemFactory::getInstance()->get($goldOID, 0, $mcompact));
                            $sender->getInventory()->addItem(ItemFactory::getInstance()->get($goldBID, 0, $cbg));
                            if($sucesscma === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitems === true) {
                            if($mtype === "message") {
                                $sender->sendMessage($nhitemsm);
                            }
    
                            if($mtype === "popup") {
                                $sender->sendPopup($nhitemsm);
                            }
                        }
                    }
                }
            }
            
# ==================
#  DIAMOND COMPACT
# ==================

        if($this->getConfig()->get("diamond-compact") === true) {
                if($inv === $diamondOID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem(ItemFactory::getInstance()->get($diamondOID, 0, $mcompact));
                            $sender->getInventory()->addItem(ItemFactory::getInstance()->get($diamondBID, 0, $cbg));
                            if($sucesscma === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitems === true) {
                            if($mtype === "message") {
                                $sender->sendMessage($nhitemsm);
                            }
    
                            if($mtype === "popup") {
                                $sender->sendPopup($nhitemsm);
                            }
                        }
                    }
                }
            }
            
# ==================
#  EMERALD COMPACT
# ==================

        if($this->getConfig()->get("emerald-compact") === true) {
                if($inv === $emeraldOID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem(ItemFactory::getInstance()->get($emeraldOID, 0, $mcompact));
                            $sender->getInventory()->addItem(ItemFactory::getInstance()->get($emeraldBID, 0, $cbg));
                            if($sucesscma === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitems === true) {
                            if($mtype === "message") {
                                $sender->sendMessage($nhitemsm);
                            }
    
                            if($mtype === "popup") {
                                $sender->sendPopup($nhitemsm);
                            }
                        }
                    }
                }
            } 
        }
        
        public function onBreak(BlockBreakEvent $event) {

        }
        
        private function loadVersion() : void {
            if($this->getConfig()->get("plugin-version") < "1.0.0") {
                $this->getLogger()->warning("Your configuration is outdate! Please consider update.");
                rename($this->getDataFolder() . "config.yml", $this->getDataFolder() . "config_outdate.yml");  
        }
    }
}