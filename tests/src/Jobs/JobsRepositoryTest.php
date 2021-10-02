<?php

declare(strict_types=1);

namespace JobBoard\Tests\Jobs;

use PHPUnit\Framework\TestCase;
use JobBoard\Database\DatabaseException;
use JobBoard\Jobs\{ JobsDto, IJobsRepository, JobsRepository };

class JobsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private JobsDto $dto;
    private IJobsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("JobBoard\Database\IDatabase");
        $this->result = $this->createMock("JobBoard\Database\IDatabaseResult");
        $this->input = [
            "id" => 3128,
            "title" => "themselves",
            "category" => 9377,
            "city" => 6915,
            "description" => "Natural game my. Possible available according operation. Collection thank wall forget history.",
            "perks" => "Drive rock make talk surface. Whole not interest hotel claim.",
            "how_to_apply" => "Town only whom shake reality color animal. Worry hear and. Father me voice method center Mrs.",
            "company_name" => "try",
            "logo" => "Available prevent gas phone war fine. Security from price better sit kitchen.",
            "url" => "Woman training force suggest. Write tough table.",
            "email" => "morganruben@example.com",
            "is_featured" => 7207,
            "token" => "various",
            "status" => 5264,
            "created" => "2021-10-13 03:23:17",
        ];
        $this->dto = new JobsDto($this->input);
        $this->repository = new JobsRepository($this->db);
    }

    protected function tearDown(): void
    {
        unset($this->db);
        unset($this->result);
        unset($this->input);
        unset($this->dto);
        unset($this->repository);
    }

    public function testInsert_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testInsert_ReturnsId(): void
    {
        $expected = 6011;

        $sql = "INSERT INTO `jobs` (`title`, `category`, `city`, `description`, `perks`, `how_to_apply`, `company_name`, `logo`, `url`, `email`, `is_featured`, `token`, `status`, `created`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->title,
                $this->dto->category,
                $this->dto->city,
                $this->dto->description,
                $this->dto->perks,
                $this->dto->howToApply,
                $this->dto->companyName,
                $this->dto->logo,
                $this->dto->url,
                $this->dto->email,
                $this->dto->isFeatured,
                $this->dto->token,
                $this->dto->status,
                $this->dto->created
            ]);
        $this->db->expects($this->once())
            ->method("lastInsertId")
            ->willReturn($expected);

        $actual = $this->repository->insert($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsFailedOnException(): void
    {
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testUpdate_ReturnsRowCount(): void
    {
        $expected = 5702;

        $sql = "UPDATE `jobs` SET `title` = ?, `category` = ?, `city` = ?, `description` = ?, `perks` = ?, `how_to_apply` = ?, `company_name` = ?, `logo` = ?, `url` = ?, `email` = ?, `is_featured` = ?, `token` = ?, `status` = ?, `created` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->title,
                $this->dto->category,
                $this->dto->city,
                $this->dto->description,
                $this->dto->perks,
                $this->dto->howToApply,
                $this->dto->companyName,
                $this->dto->logo,
                $this->dto->url,
                $this->dto->email,
                $this->dto->isFeatured,
                $this->dto->token,
                $this->dto->status,
                $this->dto->created,
                $this->dto->id
            ]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->update($this->dto);
        $this->assertEquals($expected, $actual);
    }

    public function testGet_ReturnsEmptyOnException(): void
    {
        $id = 3905;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 6535;

        $sql = "SELECT `id`, `title`, `category`, `city`, `description`, `perks`, `how_to_apply`, `company_name`, `logo`, `url`, `email`, `is_featured`, `token`, `status`, `created`
                FROM `jobs` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->get($id);
        $this->assertEquals($this->dto, $actual);
    }

    public function testGetAll_ReturnsEmptyOnException(): void
    {
        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->getAll();
        $this->assertEmpty($actual);
    }

    public function testGetAll_ReturnsDtos(): void
    {
        $sql = "SELECT `id`, `title`, `category`, `city`, `description`, `perks`, `how_to_apply`, `company_name`, `logo`, `url`, `email`, `is_featured`, `token`, `status`, `created`
                FROM `jobs`";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute");
        $this->result->expects($this->once())
            ->method("fetchAll")
            ->willReturn([$this->input]);

        $actual = $this->repository->getAll();
        $this->assertEquals([$this->dto], $actual);
    }

    public function testDelete_ReturnsFailedOnException(): void
    {
        $id = 6353;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 554;
        $expected = 8985;

        $sql = "DELETE FROM `jobs` WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([$id]);
        $this->result->expects($this->once())
            ->method("rowCount")
            ->willReturn($expected);

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }
}