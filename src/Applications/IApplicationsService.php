<?php

declare(strict_types=1);

namespace JobBoard\Applications;

interface IApplicationsService
{
    public function insert(ApplicationsModel $model): int;

    public function update(ApplicationsModel $model): int;

    public function get(int $id): ?ApplicationsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?ApplicationsModel;
}