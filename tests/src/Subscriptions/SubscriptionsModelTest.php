<?php

declare(strict_types=1);

namespace JobBoard\Tests\Subscriptions;

use PHPUnit\Framework\TestCase;
use JobBoard\Subscriptions\{ SubscriptionsDto, SubscriptionsModel };

class SubscriptionsModelTest extends TestCase
{
    private array $input;
    private SubscriptionsDto $dto;
    private SubscriptionsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 8185,
            "email" => "hlynch@example.com",
            "category_id" => 4087,
            "city_id" => 4176,
            "token" => "skill",
            "last_sent" => "2021-10-09 17:05:45",
            "is_confirmed" => 5163,
            "created" => "2021-09-25 22:43:14",
        ];
        $this->dto = new SubscriptionsDto($this->input);
        $this->model = new SubscriptionsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new SubscriptionsModel(null);

        $this->assertInstanceOf(SubscriptionsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 1993;
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
        $expected = "katherineholland@example.net";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetCategoryId(): void
    {
        $this->assertEquals($this->dto->categoryId, $this->model->getCategoryId());
    }

    public function testSetCategoryId(): void
    {
        $expected = 3999;
        $model = $this->model;
        $model->setCategoryId($expected);

        $this->assertEquals($expected, $model->getCategoryId());
    }

    public function testGetCityId(): void
    {
        $this->assertEquals($this->dto->cityId, $this->model->getCityId());
    }

    public function testSetCityId(): void
    {
        $expected = 4072;
        $model = $this->model;
        $model->setCityId($expected);

        $this->assertEquals($expected, $model->getCityId());
    }

    public function testGetToken(): void
    {
        $this->assertEquals($this->dto->token, $this->model->getToken());
    }

    public function testSetToken(): void
    {
        $expected = "end";
        $model = $this->model;
        $model->setToken($expected);

        $this->assertEquals($expected, $model->getToken());
    }

    public function testGetLastSent(): void
    {
        $this->assertEquals($this->dto->lastSent, $this->model->getLastSent());
    }

    public function testSetLastSent(): void
    {
        $expected = "2021-09-19 20:56:08";
        $model = $this->model;
        $model->setLastSent($expected);

        $this->assertEquals($expected, $model->getLastSent());
    }

    public function testGetIsConfirmed(): void
    {
        $this->assertEquals($this->dto->isConfirmed, $this->model->getIsConfirmed());
    }

    public function testSetIsConfirmed(): void
    {
        $expected = 7296;
        $model = $this->model;
        $model->setIsConfirmed($expected);

        $this->assertEquals($expected, $model->getIsConfirmed());
    }

    public function testGetCreated(): void
    {
        $this->assertEquals($this->dto->created, $this->model->getCreated());
    }

    public function testSetCreated(): void
    {
        $expected = "2021-09-28 15:00:56";
        $model = $this->model;
        $model->setCreated($expected);

        $this->assertEquals($expected, $model->getCreated());
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