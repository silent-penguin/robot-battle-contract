<?php

declare(strict_types=1);

namespace RB\Contract\Map;

final readonly class Position
{
    public function __construct(
        public int $x,
        public int $y,
    ) {}

    public function isEquals(self $otherPosition): bool
    {
        return $this->x === $otherPosition->x && $this->y === $otherPosition->y;
    }

    public function getDistanceTo(self $other): float
    {
        return sqrt(($this->x - $other->x) ** 2 + ($this->y - $other->y) ** 2);
    }

    public function getManhattanDistanceTo(self $other): int
    {
        return abs($this->x - $other->x) + abs($this->y - $other->y);
    }

    public function isAdjacentTo(self $other): bool
    {
        return $this->getManhattanDistanceTo($other) === 1;
    }
}
