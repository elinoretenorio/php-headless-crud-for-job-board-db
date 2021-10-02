<?php

declare(strict_types=1);

namespace JobBoard\Banlist;

interface IBanlistService
{
    public function insert(BanlistModel $model): int;

    public function update(BanlistModel $model): int;

    public function get(int $id): ?BanlistModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?BanlistModel;
}