<?php

declare(strict_types=1);

namespace JobBoard\Banlist;

interface IBanlistRepository
{
    public function insert(BanlistDto $dto): int;

    public function update(BanlistDto $dto): int;

    public function get(int $id): ?BanlistDto;

    public function getAll(): array;

    public function delete(int $id): int;
}