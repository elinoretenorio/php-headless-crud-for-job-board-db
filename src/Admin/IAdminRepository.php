<?php

declare(strict_types=1);

namespace JobBoard\Admin;

interface IAdminRepository
{
    public function insert(AdminDto $dto): int;

    public function update(AdminDto $dto): int;

    public function get(int $id): ?AdminDto;

    public function getAll(): array;

    public function delete(int $id): int;
}