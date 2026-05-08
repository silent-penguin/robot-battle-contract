<?php

declare(strict_types=1);

namespace RB\Contract;

use RB\Contract\Action\ActionInterface;
use RB\Contract\Action\AttackAction;
use RB\Contract\Action\MoveAction;
use RB\Contract\Action\PickupAction;
use RB\Contract\Map\Direction;
use RB\Contract\Robot\RobotInterface;

/**
 * ExampleRobot — шаблон для участников хакатона.
 *
 * Скопируйте этот файл, переименуйте класс и реализуйте свою логику.
 *
 * Правила:
 *  - Метод step() вызывается каждый ход
 *  - Верните одно действие за ход
 *  - Лимит времени выполнения: 50ms
 *
 * Поле зрения (FOV):
 *  - $context->visibleTiles  — Tile[], плоский список видимых тайлов
 *    Каждый тайл: $tile->position->x, $tile->position->y (абсолютные координаты)
 *                 $tile->type  (Empty / Wall / Item / Robot)
 *                 $tile->item  (Item|null)
 *    Лучи блокируются стенами — используйте для построения собственной карты.
 *  - $context->visibleEnemies — Position[], позиции видимых врагов
 *
 * Доступные действия:
 *  - MoveAction(Direction)      — шаг в направлении (Up/Down/Left/Right)
 *  - AttackAction(Direction)    — удар по соседней клетке (урон = attack - defense)
 *  - ShootAction(Direction)     — выстрел (требует оружие (Gun или SniperRifle) в инвентаре), иначе удар на 1 клетку
 *                                 Дальность = gun->range (3–7). Урон = attack - defense - 2
 *  - PickupAction()             — подобрать и сразу применить предмет
 *  - PickupAction(store: true)  — положить в инвентарь (все предметы идут в инвентарь)
 *  - UseItemAction(ItemType)    — использовать предмет из инвентаря
 *                                 Пример: new UseItemAction(ItemType::Medkit)
 *                                 Доступный инвентарь: $context->self->inventory (Item[])
 *                                 Gun/SniperRifle кладётся в инвентарь ($item->range — дальность стрельбы)
 *                                 Scope даёт полную карту (все тайлы + все враги) на 1 ход
 *  - DropItemAction(ItemType)   — выбросить предмет из инвентаря на текущую клетку
 *                                 Игнорируется, если предмета нет или клетка уже занята предметом
 *  - WaitAction()               — пропустить действие
 */
final class ExampleRobot implements RobotInterface
{
    private ?BattleInfo $battleInfo = null;

    public function onBattleStart(BattleInfo $battleInfo): void
    {
        $this->battleInfo = $battleInfo;
    }

    /**
     * @param Context $context — информация об окружении
     */
    public function step(Context $context): ActionInterface
    {
        $selfPos = $context->self->position;

        // Подобрать предмет, если стоим на нём
        foreach ($context->visibleTiles as $tile) {
            if ($tile->position->isEquals($selfPos) && $tile->hasItem()) {
                return new PickupAction();
            }
        }

        // Атаковать врага, если он вплотную
        foreach ($context->visibleEnemies as $enemyPos) {
            foreach (Direction::cases() as $dir) {
                if ($dir->apply($selfPos)->isEquals($enemyPos)) {
                    return new AttackAction($dir);
                }
            }
        }

        $directions = Direction::cases();

        return new MoveAction($directions[random_int(0, \count($directions) - 1)]);
    }
}
