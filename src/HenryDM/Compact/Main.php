<?php

namespace HenryDM\Compact;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\item\LegacyStringToItemParser;
use pocketmine\player\Player;

class Main extends PluginBase implements Listener {
    
    public function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this); 
        $this->loadVersion();
        $this->saveResource("config.yml");
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
#                COMPARATIONS TO GET ITEM ID IN HAND
# =========================================================================

        $coalcID = $this->getConfig()->get("coal-ore-id");
        $ironcID = $this->getConfig()->get("iron-ore-id");
        $goldcID = $this->getConfig()->get("gold-ore-id");
        $diamondcID = $this->getConfig()->get("diamond-ore-id");
        $emeraldcID = $this->getConfig()->get("emerald-ore-id");

# =========================================================================
#                         GENERAL VARIABLES
# ========================================================================= 

        $mcompact = $this->getConfig()->get("min-ores-compact");
        $bgc = $this->getConfig()->get("blocks-give-compact");
        $mtype = $this->getConfig()->get("message-type");
        $inv = $sender->getInventory()->getItemInHand()->getId();
        $count = $sender->getInventory()->getItemInHand()->getCount();
        $sucessca = $this->getConfig()->get("sucess-compact-alert");
        $sucessm = str_replace(["&", "{line}"], ["§", "\n"], $this->getConfig()->get("sucess-compact-message"));
        $nhitemsa = $this->getConfig()->get("no-sufficient-items-alert");
        $nhitemsm = str_replace(["&", "{line}"], ["§", "\n"], $this->getConfig()->get("no-sufficient-items-message"));

# =========================================================================
#                          WORLD VARIABLES
# =========================================================================         

        $world = $sender->getWorld();
        $worldName = $world->getFolderName();

# =========================================================================
#                     REMOVE & AND ITEMS VARIABLES
# =========================================================================     
        
        $coalOIDL = $this->getConfig()->get("coal-ore-id");
        $coalOID = LegacyStringToItemParser::getInstance()->parse($coalOIDL);
        $ironOIDL = $this->getConfig()->get("iron-ore-id");
        $ironOID = LegacyStringToItemParser::getInstance()->parse($ironOIDL);
        $goldOIDL = $this->getConfig()->get("gold-ore-id");
        $goldOID = LegacyStringToItemParser::getInstance()->parse($goldOIDL);
        $diamondOIDL = $this->getConfig()->get("diamond-ore-id");
        $diamondOID = LegacyStringToItemParser::getInstance()->parse($diamondOIDL);
        $emeraldOIDL = $this->getConfig()->get("emerald-ore-id");
        $emeraldOID = LegacyStringToItemParser::getInstance()->parse($emeraldOIDL);

        $coalBIDL = $this->getConfig()->get("coal-block-id");
        $coalBID = LegacyStringToItemParser::getInstance()->parse($coalBIDL);
        $ironBIDL = $this->getConfig()->get("iron-block-id");
        $ironBID = LegacyStringToItemParser::getInstance()->parse($ironBIDL);
        $goldBIDL = $this->getConfig()->get("gold-block-id");
        $goldBID = LegacyStringToItemParser::getInstance()->parse($goldBIDL);
        $diamondBIDL = $this->getConfig()->get("diamond-block-id");
        $diamondBID = LegacyStringToItemParser::getInstance()->parse($diamondBIDL);
        $emeraldBIDL = $this->getConfig()->get("emerald-block-id");
        $emeraldBID = LegacyStringToItemParser::getInstance()->parse($emeraldBIDL);

# =========================================================================

# ==================
#    COAL COMPACT
# ==================

        if($this->getConfig()->get("coal-compact") === true) {
                if($inv === $coalcID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem($coalOID->setCount($mcompact));
                            $sender->getInventory()->addItem($coalBID->setCount($bgc));
                            if($sucessca === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitemsa === true) {
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
                if($inv === $ironcID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem($ironOID->setCount($mcompact));
                            $sender->getInventory()->addItem($ironBID->setCount($bgc));
                            if($sucessca === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitemsa === true) {
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
                if($inv === $goldcID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem($goldOID->setCount($mcompact));
                            $sender->getInventory()->addItem($goldBID->setCount($bgc));
                            if($sucessca === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitemsa === true) {
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
                if($inv === $diamondcID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem($diamondOID->setCount($mcompact));
                            $sender->getInventory()->addItem($diamondBID->setCount($bgc));
                            if($sucessca === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitemsa === true) {
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
                if($inv === $emeraldcID) {
                    if($count >= $mcompact) {
                        if(in_array($worldName, $this->getConfig()->get("compact-worlds", []))) {
                            $sender->getInventory()->removeItem($emeraldOID->setCount($mcompact));
                            $sender->getInventory()->addItem($emeraldBID->setCount($bgc));
                            if($sucessca === true) {
                                if($mtype === "message") {
                                    $sender->sendMessage($sucessm);
                                }
        
                                if($mtype === "popup") {
                                    $sender->sendPopup($sucessm);
                                }
                            }
                        }
                    } else {
                        if($nhitemsa === true) {
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
    
        private function loadVersion() : void {
            if($this->getConfig()->get("plugin-version") < "1.0.0") {
                $this->getLogger()->warning("Your configuration is outdate! Please consider update.");
                rename($this->getDataFolder() . "config.yml", $this->getDataFolder() . "config_outdate.yml");  
        }
    }
}
