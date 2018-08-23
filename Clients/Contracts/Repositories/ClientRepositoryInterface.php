<?php

namespace App\Clients\Contracts\Repositories;

use App\Contracts\RepositoryInterface;
use App\Clients\Contracts\Models\ClientInterface;

interface ClientRepositoryInterface extends RepositoryInterface
{
    /**
     * Get client by name
     *
     * @param string $name
     *
     * @return ClientInterface
     */
    public function getByName(string $name): ClientInterface;
}
