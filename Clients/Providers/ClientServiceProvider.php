<?php

namespace App\Clients\Providers;

use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use App\Clients\Repositories\ClientEloquentRepository;
use App\Clients\Contracts\Repositories\ClientRepositoryInterface;

use Illuminate\Database\Eloquent\Relations\Relation;

class ClientsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->bindImplementations();
    }

    private function bindImplementations()
    {
        $this->app->singleton(ClientRepositoryInterface::class, function (Container $app) {
            return $app->make(ClientEloquentRepository::class);
        });
    }
}
