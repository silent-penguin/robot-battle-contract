<?php

declare(strict_types=1);

namespace RB\Contract\Action;

/**
 * Pick up the item in the robot's current cell.
 *
 * By default the item is applied immediately (stats updated at once).
 * Pass store: true to place the item in inventory instead of using it right away.
 * All items go to inventory. None are applied immediately on pickup.
 *
 * Examples:
 *   new PickupAction()             — pick up and apply immediately
 *   new PickupAction(store: true)  — pick up and put in inventory (max 5 slots)
 *
 * Use UseItemAction(ItemType) later to apply a stored item.
 */
final readonly class PickupAction implements ActionInterface
{
    public function __construct(
        public bool $store = false,
    ) {}
}
