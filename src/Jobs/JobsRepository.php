<?php

declare(strict_types=1);

namespace JobBoard\Jobs;

use JobBoard\Database\IDatabase;
use JobBoard\Database\DatabaseException;

class JobsRepository implements IJobsRepository
{
    private IDatabase $db;

    public function __construct(IDatabase $db)
    {
        $this->db = $db;
    }

    public function insert(JobsDto $dto): int
    {
        $sql = "INSERT INTO `jobs` (`title`, `category`, `city`, `description`, `perks`, `how_to_apply`, `company_name`, `logo`, `url`, `email`, `is_featured`, `token`, `status`, `created`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->title,
                $dto->category,
                $dto->city,
                $dto->description,
                $dto->perks,
                $dto->howToApply,
                $dto->companyName,
                $dto->logo,
                $dto->url,
                $dto->email,
                $dto->isFeatured,
                $dto->token,
                $dto->status,
                $dto->created
            ]);

            return $this->db->lastInsertId();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function update(JobsDto $dto): int
    {
        $sql = "UPDATE `jobs` SET `title` = ?, `category` = ?, `city` = ?, `description` = ?, `perks` = ?, `how_to_apply` = ?, `company_name` = ?, `logo` = ?, `url` = ?, `email` = ?, `is_featured` = ?, `token` = ?, `status` = ?, `created` = ?
                WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([
                $dto->title,
                $dto->category,
                $dto->city,
                $dto->description,
                $dto->perks,
                $dto->howToApply,
                $dto->companyName,
                $dto->logo,
                $dto->url,
                $dto->email,
                $dto->isFeatured,
                $dto->token,
                $dto->status,
                $dto->created,
                $dto->id
            ]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }

    public function get(int $id): ?JobsDto
    {
        $sql = "SELECT `id`, `title`, `category`, `city`, `description`, `perks`, `how_to_apply`, `company_name`, `logo`, `url`, `email`, `is_featured`, `token`, `status`, `created`
                FROM `jobs` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);
            $row = $result->fetchAll();

            return (!empty($row)) ? new JobsDto($row[0]) : null;
        } catch (DatabaseException $exception) {
            return null;
        }
    }

    public function getAll(): array
    {
        $sql = "SELECT `id`, `title`, `category`, `city`, `description`, `perks`, `how_to_apply`, `company_name`, `logo`, `url`, `email`, `is_featured`, `token`, `status`, `created`
                FROM `jobs`";

        try {
            $result = $this->db->prepare($sql);
            $result->execute();
            $rows = $result->fetchAll();

            $result = [];
            foreach ($rows as $row) {
                $result[] = new JobsDto($row);
            }

            return $result;
        } catch (DatabaseException $exception) {
            return [];
        }
    }

    public function delete(int $id): int
    {
        $sql = "DELETE FROM `jobs` WHERE `id` = ?";

        try {
            $result = $this->db->prepare($sql);
            $result->execute([$id]);

            return $result->rowCount();
        } catch (DatabaseException $exception) {
            return -1;
        }
    }
}