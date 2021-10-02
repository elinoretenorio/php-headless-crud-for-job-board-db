<?php

declare(strict_types=1);

namespace JobBoard\Subscriptions;

interface ISubscriptionsRepository
{
    public function insert(SubscriptionsDto $dto): int;

    public function update(SubscriptionsDto $dto): int;

    public function get(int $id): ?SubscriptionsDto;

    public function getAll(): array;

    public function delete(int $id): int;
}