<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", JobBoard\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// Admin

$container->add("AdminRepository", JobBoard\Admin\AdminRepository::class)
    ->addArgument("Database");
$container->add("AdminService", JobBoard\Admin\AdminService::class)
    ->addArgument("AdminRepository");
$container->add(JobBoard\Admin\AdminController::class)
    ->addArgument("AdminService");

// Applications

$container->add("ApplicationsRepository", JobBoard\Applications\ApplicationsRepository::class)
    ->addArgument("Database");
$container->add("ApplicationsService", JobBoard\Applications\ApplicationsService::class)
    ->addArgument("ApplicationsRepository");
$container->add(JobBoard\Applications\ApplicationsController::class)
    ->addArgument("ApplicationsService");

// Banlist

$container->add("BanlistRepository", JobBoard\Banlist\BanlistRepository::class)
    ->addArgument("Database");
$container->add("BanlistService", JobBoard\Banlist\BanlistService::class)
    ->addArgument("BanlistRepository");
$container->add(JobBoard\Banlist\BanlistController::class)
    ->addArgument("BanlistService");

// Blocks

$container->add("BlocksRepository", JobBoard\Blocks\BlocksRepository::class)
    ->addArgument("Database");
$container->add("BlocksService", JobBoard\Blocks\BlocksService::class)
    ->addArgument("BlocksRepository");
$container->add(JobBoard\Blocks\BlocksController::class)
    ->addArgument("BlocksService");

// Categories

$container->add("CategoriesRepository", JobBoard\Categories\CategoriesRepository::class)
    ->addArgument("Database");
$container->add("CategoriesService", JobBoard\Categories\CategoriesService::class)
    ->addArgument("CategoriesRepository");
$container->add(JobBoard\Categories\CategoriesController::class)
    ->addArgument("CategoriesService");

// Cities

$container->add("CitiesRepository", JobBoard\Cities\CitiesRepository::class)
    ->addArgument("Database");
$container->add("CitiesService", JobBoard\Cities\CitiesService::class)
    ->addArgument("CitiesRepository");
$container->add(JobBoard\Cities\CitiesController::class)
    ->addArgument("CitiesService");

// Jobs

$container->add("JobsRepository", JobBoard\Jobs\JobsRepository::class)
    ->addArgument("Database");
$container->add("JobsService", JobBoard\Jobs\JobsService::class)
    ->addArgument("JobsRepository");
$container->add(JobBoard\Jobs\JobsController::class)
    ->addArgument("JobsService");

// Pages

$container->add("PagesRepository", JobBoard\Pages\PagesRepository::class)
    ->addArgument("Database");
$container->add("PagesService", JobBoard\Pages\PagesService::class)
    ->addArgument("PagesRepository");
$container->add(JobBoard\Pages\PagesController::class)
    ->addArgument("PagesService");

// Subscriptions

$container->add("SubscriptionsRepository", JobBoard\Subscriptions\SubscriptionsRepository::class)
    ->addArgument("Database");
$container->add("SubscriptionsService", JobBoard\Subscriptions\SubscriptionsService::class)
    ->addArgument("SubscriptionsRepository");
$container->add(JobBoard\Subscriptions\SubscriptionsController::class)
    ->addArgument("SubscriptionsService");

