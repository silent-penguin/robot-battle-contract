<?php

declare(strict_types=1);

namespace RB\Contract\Item;

use RB\Contract\Map\Position;

final readonly class Item
{
    public function __construct(
        public ItemType $type,
        public Position $position,
        public int $range = 0,
    ) {}

    public function getAttackBonus(): int
    {
        return match ($this->type) {
            ItemType::Shield,
            ItemType::Medkit,
            ItemType::Scope,
            ItemType::Gun,
            ItemType::SniperRifle => 0,
        };
    }

    public function getDefenseBonus(): int
    {
        return match ($this->type) {
            ItemType::Shield => 3,
            ItemType::Medkit,
            ItemType::Scope,
            ItemType::Gun,
            ItemType::SniperRifle => 0,
        };
    }

    public function getHealthBonus(): int
    {
        return match ($this->type) {
            ItemType::Medkit => 20,
            ItemType::Shield,
            ItemType::Scope,
            ItemType::Gun,
            ItemType::SniperRifle => 0,
        };
    }

    public function getViewRangeBonus(): int
    {
        return match ($this->type) {
            ItemType::Scope => 5,
            ItemType::Medkit,
            ItemType::Shield,
            ItemType::Gun,
            ItemType::SniperRifle => 0,
        };
    }

    public function getShootRangeBonus(): int
    {
        return match ($this->type) {
            ItemType::Scope => 3,
            ItemType::Medkit,
            ItemType::Shield,
            ItemType::Gun,
            ItemType::SniperRifle => 0,
        };
    }
}
