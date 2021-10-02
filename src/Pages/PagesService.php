<?php

declare(strict_types=1);

namespace JobBoard\Pages;

class PagesService implements IPagesService
{
    private IPagesRepository $repository;

    public function __construct(IPagesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function insert(PagesModel $model): int
    {
        return $this->repository->insert($model->toDto());
    }

    public function update(PagesModel $model): int
    {
        return $this->repository->update($model->toDto());
    }

    public function get(int $id): ?PagesModel
    {
        $dto = $this->repository->get($id);
        if ($dto === null) {
            return null;
        }

        return new PagesModel($dto);
    }

    public function getAll(): array
    {
        $dtos = $this->repository->getAll();

        $result = [];
        /* @var PagesDto $dto */
        foreach ($dtos as $dto) {
            $result[] = new PagesModel($dto);
        }

        return $result;
    }

    public function delete(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function createModel(array $row): ?PagesModel
    {
        if (empty($row)) {
            return null;
        }

        $dto = new PagesDto($row);

        return new PagesModel($dto);
    }
}