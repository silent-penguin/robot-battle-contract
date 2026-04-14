<?php

declare(strict_types=1);

namespace RB\Contract\Map;

enum Direction: string
{
    case Up = 'up';
    case Down = 'down';
    case Left = 'left';
    case Right = 'right';

    public function apply(Position $pos): Position
    {
        $offset = match ($this) {
            Direction::Up => ['dx' => 0, 'dy' => -1],
            Direction::Down => ['dx' => 0, 'dy' => 1],
            Direction::Left => ['dx' => -1, 'dy' => 0],
            Direction::Right => ['dx' => 1, 'dy' => 0],
        };

        return new Position($pos->x + $offset['dx'], $pos->y + $offset['dy']);
    }
}
