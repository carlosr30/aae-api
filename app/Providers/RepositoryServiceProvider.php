<?php

namespace App\Providers;

use App\Repositories\Events\EventRepository;
use App\Repositories\Events\EventEloquentRepository;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public $singletons = [
        EventRepository::class => EventEloquentRepository::class,
    ];

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            EventRepository::class,
        ];
    }
}
