<?php

declare(strict_types=1);

namespace RB\Contract\Map;

use RB\Contract\Item\Item;

final class Tile
{
    public function __construct(
        public readonly Position $position,
        public TileType $type = TileType::Empty,
        public ?Item $item = null,
    ) {}

    public function isEmpty(): bool
    {
        return $this->type === TileType::Empty;
    }

    public function isWall(): bool
    {
        return $this->type === TileType::Wall;
    }

    public function hasItem(): bool
    {
        return $this->item instanceof Item;
    }

    public function isPassable(): bool
    {
        return $this->type !== TileType::Wall && $this->type !== TileType::Robot;
    }
}
