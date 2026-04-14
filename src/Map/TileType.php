<?php

declare(strict_types=1);

namespace RB\Contract\Map;

enum TileType: string
{
    case Empty = 'empty';
    case Wall = 'wall';
    case Item = 'item';
    case Robot = 'robot';
}
