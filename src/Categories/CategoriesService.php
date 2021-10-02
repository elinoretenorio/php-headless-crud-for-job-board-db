<?php

declare(strict_types=1);

namespace JobBoard\Categories;

class CategoriesService implements ICategoriesService
{
    private ICategoriesRepository $repository;

    public function __construct(ICategoriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(CategoriesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(CategoriesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?CategoriesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new CategoriesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var CategoriesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new CategoriesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?CategoriesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new CategoriesDto($row);

        return new CategoriesModel($dto);
    }
}