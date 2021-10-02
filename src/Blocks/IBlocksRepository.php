<?php

declare(strict_types=1);

namespace JobBoard\Blocks;

interface IBlocksRepository
{
    public function insert(BlocksDto $dto): int;

    public function update(BlocksDto $dto): int;

    public function get(int $id): ?BlocksDto;

    public function getAll(): array;

    public function delete(int $id): int;
}