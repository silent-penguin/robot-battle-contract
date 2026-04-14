<?php

declare(strict_types=1);

namespace RB\Contract;

/**
 * The robot will receive this information once before the battle.
 */
final readonly class BattleInfo
{
    public function __construct(
        /** Map width including side walls. */
        public int $mapWidth,
        /** Map height including side walls. */
        public int $mapHeight,
        /** Number of turns in battle for all robots. */
        public int $maxTurns,
        /** Number of turns in battle for all robots. */
        public int $inventorySize,
        /** Maximum time per move of one robot in milliseconds. */
        public int $stepTimeoutMs,
        /** The robot's initial health */
        public int $startRobotHealth,
        /** The robot's initial attack */
        public int $startRobotAttack,
        /** The robot's initial defence */
        public int $startRobotDefence,
        /** The robot's initial view range (ray-cast radius). May increase via Scope item. */
        public int $startRobotViewRange,
    ) {}
}
