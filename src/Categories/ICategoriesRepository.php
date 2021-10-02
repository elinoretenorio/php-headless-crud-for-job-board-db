<?php

declare(strict_types=1);

namespace JobBoard\Categories;

interface ICategoriesRepository
{
    public function insert(CategoriesDto $dto): int;

    public function update(CategoriesDto $dto): int;

    public function get(int $id): ?CategoriesDto;

    public function getAll(): array;

    public function delete(int $id): int;
}