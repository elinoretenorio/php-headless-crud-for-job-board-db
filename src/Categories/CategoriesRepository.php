<?php

declare(strict_types=1);

namespace JobBoard\Categories;

use JobBoard\Database\IDatabase;
use JobBoard\Database\DatabaseException;

class CategoriesRepository implements ICategoriesRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(CategoriesDto $dto): int
    {
        $sql = "INSERT INTO `categories` (`name`, `description`, `url`, `sort`)
                VALUES (?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->description,
                $dto->url,
                $dto->sort
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(CategoriesDto $dto): int
    {
        $sql = "UPDATE `categories` SET `name` = ?, `description` = ?, `url` = ?, `sort` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->name,
                $dto->description,
                $dto->url,
                $dto->sort,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?CategoriesDto
    {
        $sql = "SELECT `id`, `name`, `description`, `url`, `sort`
                FROM `categories` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new CategoriesDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `name`, `description`, `url`, `sort`
                FROM `categories`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new CategoriesDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `categories` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}