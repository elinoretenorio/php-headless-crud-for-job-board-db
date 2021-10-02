<?php

declare(strict_types=1);

namespace JobBoard\Tests\Admin;

use PHPUnit\Framework\TestCase;
use JobBoard\Admin\{ AdminDto, AdminModel };

class AdminModelTest extends TestCase
{
    private array $input;
    private AdminDto $dto;
    private AdminModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 3759,
            "email" => "colinperez@example.net",
            "password" => "change",
        ];
        $this->dto = new AdminDto($this->input);
        $this->model = new AdminModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new AdminModel(null);

        $this->assertInstanceOf(AdminModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 4289;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "wangjames@example.net";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetPassword(): void
    {
        $this->assertEquals($this->dto->password, $this->model->getPassword());
    }

    public function testSetPassword(): void
    {
        $expected = "growth";
        $model = $this->model;
        $model->setPassword($expected);

        $this->assertEquals($expected, $model->getPassword());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}