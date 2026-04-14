<?php

declare(strict_types=1);

namespace RB\Contract\Action;

use RB\Contract\Map\Direction;

/**
 * Moves the robot one cell in the given direction, if possible.
 */
final readonly class MoveAction implements ActionInterface
{
    public function __construct(
        public Direction $direction,
    ) {}
}
