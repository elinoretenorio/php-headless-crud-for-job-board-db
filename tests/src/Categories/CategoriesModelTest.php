<?php

declare(strict_types=1);

namespace JobBoard\Tests\Categories;

use PHPUnit\Framework\TestCase;
use JobBoard\Categories\{ CategoriesDto, CategoriesModel };

class CategoriesModelTest extends TestCase
{
    private array $input;
    private CategoriesDto $dto;
    private CategoriesModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 2840,
            "name" => "attention",
            "description" => "scene",
            "url" => "citizen",
            "sort" => 363,
        ];
        $this->dto = new CategoriesDto($this->input);
        $this->model = new CategoriesModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CategoriesModel(null);

        $this->assertInstanceOf(CategoriesModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9265;
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
        $expected = "skill";
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
        $expected = "hit";
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
        $expected = "wrong";
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
        $expected = 6822;
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