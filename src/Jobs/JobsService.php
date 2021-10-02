<?php

declare(strict_types=1);

namespace JobBoard\Jobs;

class JobsService implements IJobsService
{
    private IJobsRepository $repository;

    public function __construct(IJobsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(JobsModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(JobsModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?JobsModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new JobsModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var JobsDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new JobsModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?JobsModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new JobsDto($row);

        return new JobsModel($dto);
    }
}