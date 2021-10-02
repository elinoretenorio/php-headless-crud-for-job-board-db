<?php

declare(strict_types=1);

namespace JobBoard\Cities;

class CitiesService implements ICitiesService
{
    private ICitiesRepository $repository;

    public function __construct(ICitiesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CitiesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CitiesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CitiesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CitiesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CitiesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CitiesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CitiesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CitiesDto($row);

        return new CitiesModel($dto);
    }
}