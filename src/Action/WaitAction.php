<?php

declare(strict_types=1);

namespace RB\Contract\Action;

/**
 * This is simply a "do nothing" action (skip a turn).
 * It's needed for cases where the bot can't perform any meaningful action: for example, if it wanted to move toward the enemy, but the direction wasn't determined.
 * The bot can also explicitly return it from step() if it decides to skip a turn.
 */
final readonly class WaitAction implements ActionInterface {}
