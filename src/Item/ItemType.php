<?php

declare(strict_types=1);

namespace RB\Contract\Item;

enum ItemType: string
{
    case Shield = 'shield';
    case Medkit = 'medkit';
    case Scope = 'scope';
    case Gun = 'gun';
    case SniperRifle = 'sniper_rifle';

    /**
     * Weapon items can never be applied immediately — they have no stat effect
     * and can only be stored and used via ShootAction.
     */
    public function isWeapon(): bool
    {
        return $this === self::Gun || $this === self::SniperRifle;
    }
}
