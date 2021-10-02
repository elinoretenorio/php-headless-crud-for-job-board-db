<?php

declare(strict_types=1);

namespace JobBoard\Pages;

interface IPagesService
{
    public function insert(PagesModel $model): int;

    public function update(PagesModel $model): int;

    public function get(int $id): ?PagesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?PagesModel;
}