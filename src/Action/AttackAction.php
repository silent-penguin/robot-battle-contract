<?php

declare(strict_types=1);

namespace RB\Contract\Action;

use RB\Contract\Map\Direction;

/**
 * This action will be performed if the enemy robot is in an adjacent cell in the specified direction.
 * Damage is calculated as: max(1, robot.attack - opponent.defense).
 *
 * Example 1
 * ------------------------------------
 * RobotA: attack = 10
 * RobotB: defence = 20
 * Damage = max(1, 10 - 20) = max(1, -10) = 1
 * ------------------------------------
 * Example 2
 * ------------------------------------
 * RobotA: attack = 20
 * RobotB: defence = 10
 * Damage = max(1, 20 - 10) = max(1, 10) = 10
 * ------------------------------------
 */
final readonly class AttackAction implements ActionInterface
{
    public function __construct(
        public Direction $direction,
    ) {}
}
