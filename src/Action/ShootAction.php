<?php

declare(strict_types=1);

namespace RB\Contract\Action;

use RB\Contract\Map\Direction;

/**
 * Ranged attack: fires a projectile in a direction, hits the first robot within 7 tiles.
 *
 * Damage is calculated as: max(1, robot.attack - opponent.defense - 2)
 * Shooting is slightly weaker than melee: -2 damage penalty, as ranged attacks have an extra benefit.
 */
final readonly class ShootAction implements ActionInterface
{
    public function __construct(public Direction $direction) {}
}
