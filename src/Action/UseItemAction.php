<?php

declare(strict_types=1);

namespace RB\Contract\Action;

use RB\Contract\Item\ItemType;

/**
 * Use an item stored in the robot's inventory.
 *
 * The robot must have at least one item of the given type in its inventory;
 * otherwise the action is silently ignored.
 *
 * Example:
 *   return new UseItemAction(ItemType::Medkit);   // heal now
 *   return new UseItemAction(ItemType::Shield);   // equip shield now
 *
 * Check what is in inventory via $context->self->inventory (array of ItemType).
 */
final readonly class UseItemAction implements ActionInterface
{
    public function __construct(
        public ItemType $itemType,
    ) {}
}
