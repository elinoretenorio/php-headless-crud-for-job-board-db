<?php

declare(strict_types=1);

namespace JobBoard\Subscriptions;

interface ISubscriptionsService
{
    public function insert(SubscriptionsModel $model): int;

    public function update(SubscriptionsModel $model): int;

    public function get(int $id): ?SubscriptionsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?SubscriptionsModel;
}