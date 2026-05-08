<?php

declare(strict_types=1);

namespace RB\Contract\Action;

use RB\Contract\Item\ItemType;
use RB\Contract\Map\Direction;

/**
 * Ranged attack: fires a projectile in a direction, hits the first robot within range.
 *
 * $preferredWeapon — which weapon to use (Gun, SniperRifle, …).
 *   null  → use the first weapon found in inventory.
 *   set   → prefer that weapon; fall back to any other weapon if not found.
 *   If no weapon in inventory at all → falls back to a melee attack.
 *
 * Damage is calculated as: max(1, robot.attack - opponent.defense - 2)
 */
final readonly class ShootAction implements ActionInterface
{
    public function __construct(
        public Direction $direction,
        public ?ItemType $preferredWeapon = null,
    ) {}
}
