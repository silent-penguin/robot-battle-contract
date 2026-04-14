<?php

declare(strict_types=1);

namespace RB\Contract;

use RB\Contract\Map\Position;
use RB\Contract\Map\Tile;
use RB\Contract\Robot\RobotInfo;

/**
 * The robot will receive this information every move.
 */
final readonly class Context
{
    /**
     * @param Tile[]     $visibleTiles   All tiles visible this turn (flat list, absolute coords via $tile->position).
     *                                   Rays are blocked by walls — use this to build your own map.
     * @param Position[] $visibleEnemies Positions of visible enemy robots
     */
    public function __construct(
        /** Information about your robot. */
        public RobotInfo $self,
        /**
         * All tiles visible this turn. Each tile carries absolute map coordinates via $tile->position->x / ->y.
         * Visibility is computed with ray casting — walls block the view behind them.
         * Use this list to progressively build your own internal map.
         */
        public array $visibleTiles,
        /** Absolute positions of enemy robots that are currently visible. */
        public array $visibleEnemies,
        /** Current turn number. */
        public int $currentTurn,
        /** Maximum view distance in tiles. May increase if you pick up a Scope item. */
        public int $viewRange,
    ) {}
}
