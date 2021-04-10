<?php

/**
 * @name InterArmor
 * @author pju6791
 * @version 3.0.0
 * @api 3.0.0
 * @main pju6791\interarmor\InterArmor
 */

namespace pju6791\interarmor;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\item\Armor;
use pocketmine\item\Item;
use pocketmine\item\ItemIds;
use pocketmine\inventory\ArmorInventory;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\network\mcpe\protocol\types\inventory\ItemStackWrapper;

class InterArmor extends PluginBase implements Listener {

    /** @var string */
    public $helmet = "";

    /** @var string */
    public $chestplate = "";

    /** @var string */
    public $leggings = "";

    /** @var string */
    public $boots = "";

    public function onEnable() {

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    /**
     * @param PlayerInteractEvent $event
     */

    public function onInter(PlayerInteractEvent $event) :void
    {

        $player = $event->getPlayer();
        $item = $player->getInventory()->getItemInHand();

        switch ($item) {

            case 1:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::TURTLE_HELMET));
                $this->chestplate = ItemStackWrapper::legacy(Item::get(ItemIds::ELYTRA));
                break;

            case 2:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::LEATHER_HELMET));
                $this->chestplate = ItemStackWrapper::legacy(Item::get(ItemIds::LEATHER_CHESTPLATE));
                $this->leggings = ItemStackWrapper::legacy(Item::get(ItemIds::LEATHER_LEGGINGS));
                $this->boots = ItemStackWrapper::legacy(Item::get(ItemIds::LEATHER_BOOTS));
                break;

            case 3:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::CHAIN_HELMET));
                $this->chestplate = ItemStackWrapper::legacy(Item::get(ItemIds::CHAIN_CHESTPLATE));
                $this->leggings = ItemStackWrapper::legacy(Item::get(ItemIds::CHAIN_LEGGINGS));
                $this->boots = ItemStackWrapper::legacy(Item::get(ItemIds::CHAIN_BOOTS));
                break;

            case 4:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::MOB_HEAD));
                break;

            case 5:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::GOLD_HELMET));
                $this->chestplate = ItemStackWrapper::legacy(Item::get(ItemIds::GOLD_CHESTPLATE));
                $this->leggings = ItemStackWrapper::legacy(Item::get(ItemIds::GOLD_LEGGINGS));
                $this->boots = ItemStackWrapper::legacy(Item::get(ItemIds::GOLD_BOOTS));
                break;

            case 6:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::IRON_HELMET));
                $this->chestplate = ItemStackWrapper::legacy(Item::get(ItemIds::IRON_CHESTPLATE));
                $this->leggings = ItemStackWrapper::legacy(Item::get(ItemIds::IRON_LEGGINGS));
                $this->boots = ItemStackWrapper::legacy(Item::get(ItemIds::IRON_BOOTS));
                break;

            case 7:
                $this->helmet = ItemStackWrapper::legacy(Item::get(ItemIds::DIAMOND_HELMET));
                $this->chestplate = ItemStackWrapper::legacy(Item::get(ItemIds::DIAMOND_CHESTPLATE));
                $this->leggings = ItemStackWrapper::legacy(Item::get(ItemIds::DIAMOND_LEGGINGS));
                $this->boots = ItemStackWrapper::legacy(Item::get(ItemIds::DIAMOND_BOOTS));
                break;
        }
        $player->getArmorInventory()->setLeggings($this->leggings);
        $player->getArmorInventory()->setChestplate($this->chestplate);
        $player->getArmorInventory()->setHelmet($this->helmet);
        $player->getArmorInventory()->setBoots($this->boots);
    }
}
