<?php

declare(strict_types=1);

namespace RB\Contract\Robot;

use RB\Contract\Item\Item;
use RB\Contract\Map\Position;

final readonly class RobotInfo
{
    /**
     * @param Item[] $inventory Items currently stored in the robot's inventory.
     *                          Use UseItemAction(ItemType) to apply one.
     *                          Gun items expose $item->range for shoot range.
     */
    public function __construct(
        /** Name of the robot */
        public string $name,
        /** Current position of the robot */
        public Position $position,
        /** The robot's current health */
        public int $health,
        /** The robot's current attack value */
        public int $attack,
        /** The robot's current defense value */
        public int $defense,
        /**
         * Items currently stored in the robot's inventory (max - see BattleInfo->inventorySize).
         * Medkit and Shield can be stored and used later.
         * Gun is always stored; needed for ShootAction.
         */
        public array $inventory,
    ) {}
}
