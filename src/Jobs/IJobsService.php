<?php

declare(strict_types=1);

namespace JobBoard\Jobs;

interface IJobsService
{
    public function insert(JobsModel $model): int;

    public function update(JobsModel $model): int;

    public function get(int $id): ?JobsModel;

    public function getAll(): array;

    public function delete(int $id): int;

    public function createModel(array $row): ?JobsModel;
}