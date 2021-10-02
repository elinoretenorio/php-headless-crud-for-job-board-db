<?php

declare(strict_types=1);

namespace JobBoard\Blocks;

interface IBlocksService
{
    public function insert(BlocksModel $model): int;

    public function update(BlocksModel $model): int;

    public function get(int $id): ?BlocksModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?BlocksModel;
}