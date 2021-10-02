<?php

declare(strict_types=1);

namespace JobBoard\Admin;

interface IAdminService
{
    public function insert(AdminModel $model): int;

    public function update(AdminModel $model): int;

    public function get(int $id): ?AdminModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?AdminModel;
}