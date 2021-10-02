<?php

declare(strict_types=1);

namespace JobBoard\Tests\Cities;

use PHPUnit\Framework\TestCase;
use JobBoard\Cities\{ CitiesDto, CitiesModel };

class CitiesModelTest extends TestCase
{
    private array $input;
    private CitiesDto $dto;
    private CitiesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 4311,
            "name" => "investment",
            "description" => "learn",
            "url" => "bank",
            "sort" => 6712,
        ];
        $this->dto = new CitiesDto($this->input);
        $this->model = new CitiesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CitiesModel(null);

        $this->assertInstanceOf(CitiesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 6516;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->dto->name, $this->model->getName());
    }

    public function testSetName(): void
    {
        $expected = "middle";
        $model = $this->model;
        $model->setName($expected);

        $this->assertEquals($expected, $model->getName());
    }

    public function testGetDescription(): void
    {
        $this->assertEquals($this->dto->description, $this->model->getDescription());
    }

    public function testSetDescription(): void
    {
        $expected = "part";
        $model = $this->model;
        $model->setDescription($expected);

        $this->assertEquals($expected, $model->getDescription());
    }

    public function testGetUrl(): void
    {
        $this->assertEquals($this->dto->url, $this->model->getUrl());
    }

    public function testSetUrl(): void
    {
        $expected = "once";
        $model = $this->model;
        $model->setUrl($expected);

        $this->assertEquals($expected, $model->getUrl());
    }

    public function testGetSort(): void
    {
        $this->assertEquals($this->dto->sort, $this->model->getSort());
    }

    public function testSetSort(): void
    {
        $expected = 5260;
        $model = $this->model;
        $model->setSort($expected);

        $this->assertEquals($expected, $model->getSort());
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