<?php

namespace App\Providers;

use App\Interfaces\AnswerBehaviourRepositoryInterface;
use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\AnswerRestrictionRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\QuestionnaireRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Repositories\AnswerBehaviourRepository;
use App\Repositories\AnswerRepository;
use App\Repositories\AnswerRestrictionRepository;
use App\Repositories\ProductRepository;
use App\Repositories\QuestionnaireRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(QuestionnaireRepositoryInterface::class,QuestionnaireRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class,QuestionRepository::class);
        $this->app->bind(AnswerRepositoryInterface::class,AnswerRepository::class);
        $this->app->bind(AnswerBehaviourRepositoryInterface::class,AnswerBehaviourRepository::class);
        $this->app->bind(AnswerRestrictionRepositoryInterface::class,AnswerRestrictionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
