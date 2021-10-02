<?php

declare(strict_types=1);

namespace JobBoard\Tests\Applications;

use PHPUnit\Framework\TestCase;
use JobBoard\Database\DatabaseException;
use JobBoard\Applications\{ ApplicationsDto, IApplicationsRepository, ApplicationsRepository };

class ApplicationsRepositoryTest extends TestCase
{
    private $db;
    private $result;
    private array $input;
    private ApplicationsDto $dto;
    private IApplicationsRepository $repository;

    protected function setUp(): void
    {
        $this->db = $this->createMock("JobBoard\Database\IDatabase");
        $this->result = $this->createMock("JobBoard\Database\IDatabaseResult");
        $this->input = [
            "id" => 6445,
            "job_id" => 5835,
            "cover_letter" => "Spend coach interview man company. Manager end far western. Among record management.",
            "full_name" => "marriage",
            "email" => "carsonhenry@example.net",
            "location" => "thus",
            "websites" => "Often center must manage establish. Care similar left practice trouble. Region table sport around worry place fill. Spring guess their home son kind partner provide.",
            "attachment" => "Avoid program indeed among. Cell yard cold race. Place mind want data star.",
            "token" => "yet",
            "created" => "2021-09-18 07:59:44",
        ];
        $this->dto = new ApplicationsDto($this->input);
        $this->repository = new ApplicationsRepository($this->db);
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
        $expected = 6208;

        $sql = "INSERT INTO `applications` (`job_id`, `cover_letter`, `full_name`, `email`, `location`, `websites`, `attachment`, `token`, `created`)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->jobId,
                $this->dto->coverLetter,
                $this->dto->fullName,
                $this->dto->email,
                $this->dto->location,
                $this->dto->websites,
                $this->dto->attachment,
                $this->dto->token,
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
        $expected = 3143;

        $sql = "UPDATE `applications` SET `job_id` = ?, `cover_letter` = ?, `full_name` = ?, `email` = ?, `location` = ?, `websites` = ?, `attachment` = ?, `token` = ?, `created` = ?
                WHERE `id` = ?";

        $this->db->expects($this->once())
            ->method("prepare")
            ->with($sql)
            ->willReturn($this->result);
        $this->result->expects($this->once())
            ->method("execute")
            ->with([
                $this->dto->jobId,
                $this->dto->coverLetter,
                $this->dto->fullName,
                $this->dto->email,
                $this->dto->location,
                $this->dto->websites,
                $this->dto->attachment,
                $this->dto->token,
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
        $id = 8987;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->get($id);
        $this->assertEmpty($actual);
    }

    public function testGet_ReturnsDto(): void
    {
        $id = 7343;

        $sql = "SELECT `id`, `job_id`, `cover_letter`, `full_name`, `email`, `location`, `websites`, `attachment`, `token`, `created`
                FROM `applications` WHERE `id` = ?";

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
        $sql = "SELECT `id`, `job_id`, `cover_letter`, `full_name`, `email`, `location`, `websites`, `attachment`, `token`, `created`
                FROM `applications`";

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
        $id = 7605;
        $expected = -1;

        $this->db->method("prepare")
            ->will($this->throwException(new DatabaseException()));

        $actual = $this->repository->delete($id);
        $this->assertEquals($expected, $actual);
    }

    public function testDelete_ReturnsRowCount(): void
    {
        $id = 4075;
        $expected = 8294;

        $sql = "DELETE FROM `applications` WHERE `id` = ?";

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