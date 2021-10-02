<?php

declare(strict_types=1);

namespace JobBoard\Cities;

interface ICitiesService
{
    public function insert(CitiesModel $model): int;

    public function update(CitiesModel $model): int;

    public function get(int $id): ?CitiesModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?CitiesModel;
}