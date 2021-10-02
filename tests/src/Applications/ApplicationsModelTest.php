<?php

declare(strict_types=1);

namespace JobBoard\Tests\Applications;

use PHPUnit\Framework\TestCase;
use JobBoard\Applications\{ ApplicationsDto, ApplicationsModel };

class ApplicationsModelTest extends TestCase
{
    private array $input;
    private ApplicationsDto $dto;
    private ApplicationsModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 6063,
            "job_id" => 5572,
            "cover_letter" => "Rate board camera investment six suddenly large. Involve along impact author program reveal toward.",
            "full_name" => "professional",
            "email" => "gwilkerson@example.org",
            "location" => "film",
            "websites" => "Interview cultural early hotel. Table media structure our painting your. Past very article. May feeling health ability member.",
            "attachment" => "Of significant result many change their. Cultural special environmental be each financial toward.",
            "token" => "left",
            "created" => "2021-10-14 16:54:53",
        ];
        $this->dto = new ApplicationsDto($this->input);
        $this->model = new ApplicationsModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new ApplicationsModel(null);

        $this->assertInstanceOf(ApplicationsModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 9093;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetJobId(): void
    {
        $this->assertEquals($this->dto->jobId, $this->model->getJobId());
    }

    public function testSetJobId(): void
    {
        $expected = 7523;
        $model = $this->model;
        $model->setJobId($expected);

        $this->assertEquals($expected, $model->getJobId());
    }

    public function testGetCoverLetter(): void
    {
        $this->assertEquals($this->dto->coverLetter, $this->model->getCoverLetter());
    }

    public function testSetCoverLetter(): void
    {
        $expected = "Claim however our other across.";
        $model = $this->model;
        $model->setCoverLetter($expected);

        $this->assertEquals($expected, $model->getCoverLetter());
    }

    public function testGetFullName(): void
    {
        $this->assertEquals($this->dto->fullName, $this->model->getFullName());
    }

    public function testSetFullName(): void
    {
        $expected = "nation";
        $model = $this->model;
        $model->setFullName($expected);

        $this->assertEquals($expected, $model->getFullName());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals($this->dto->email, $this->model->getEmail());
    }

    public function testSetEmail(): void
    {
        $expected = "abbottlynn@example.com";
        $model = $this->model;
        $model->setEmail($expected);

        $this->assertEquals($expected, $model->getEmail());
    }

    public function testGetLocation(): void
    {
        $this->assertEquals($this->dto->location, $this->model->getLocation());
    }

    public function testSetLocation(): void
    {
        $expected = "open";
        $model = $this->model;
        $model->setLocation($expected);

        $this->assertEquals($expected, $model->getLocation());
    }

    public function testGetWebsites(): void
    {
        $this->assertEquals($this->dto->websites, $this->model->getWebsites());
    }

    public function testSetWebsites(): void
    {
        $expected = "Agent answer TV although meet. Whatever great call black at employee happy manage. Or vote attorney bad gas voice buy. Story entire technology together produce his.";
        $model = $this->model;
        $model->setWebsites($expected);

        $this->assertEquals($expected, $model->getWebsites());
    }

    public function testGetAttachment(): void
    {
        $this->assertEquals($this->dto->attachment, $this->model->getAttachment());
    }

    public function testSetAttachment(): void
    {
        $expected = "Officer theory follow relationship worry coach meet challenge.";
        $model = $this->model;
        $model->setAttachment($expected);

        $this->assertEquals($expected, $model->getAttachment());
    }

    public function testGetToken(): void
    {
        $this->assertEquals($this->dto->token, $this->model->getToken());
    }

    public function testSetToken(): void
    {
        $expected = "once";
        $model = $this->model;
        $model->setToken($expected);

        $this->assertEquals($expected, $model->getToken());
    }

    public function testGetCreated(): void
    {
        $this->assertEquals($this->dto->created, $this->model->getCreated());
    }

    public function testSetCreated(): void
    {
        $expected = "2021-10-01 03:35:56";
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