<?php

declare(strict_types=1);

namespace JobBoard\Categories;

interface ICategoriesService
{
    public function insert(CategoriesModel $model): int;

    public function update(CategoriesModel $model): int;

    public function get(int $id): ?CategoriesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CategoriesModel;
}