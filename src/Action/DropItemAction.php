<?php

declare(strict_types=1);

namespace RB\Contract\Action;

use RB\Contract\Item\ItemType;

/**
 * Drop an item from the robot's inventory onto its current tile.
 *
 * The robot must have at least one item of the given type in its inventory;
 * otherwise the action is silently ignored.
 * If the current tile already has an item, the action is silently ignored.
 *
 * Example:
 *   return new DropItemAction(ItemType::Gun); // drop weapon to free an inventory slot
 */
final readonly class DropItemAction implements ActionInterface
{
    public function __construct(
        public ItemType $itemType,
    ) {}
}
