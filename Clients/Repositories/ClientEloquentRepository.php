<?php

namespace App\Clients\Repositories;

use App\Exceptions\ResourceNotFoundException;
use App\Repositories\EloquentRepository;
use App\Clients\Models\Client;
use App\Clients\Contracts\Models\ClientInterface;
use App\Clients\Contracts\Repositories\ClientRepositoryInterface;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ClientEloquentRepository extends EloquentRepository implements ClientRepositoryInterface
{
    /**
     * ClientEloquentRepository constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * {@inheritdoc}
     */
    public function get(): Collection
    {
        return $this->applyCriteria($this->createQuery())
            ->with('files')
            ->get();
    }

    /**
     * {@inheritdoc}
     */
    public function getByName(string $name): ClientInterface
    {
        $this->clearCriteria();
        $resource = $this->createQuery()
            ->where('name', $name)
            ->first();
        if (is_null($resource)) {
            throw new ResourceNotFoundException($this->model);
        }
        return $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $attributes)
    {
        $resource = $this->createInstance();
        $resource->fill($attributes);
        $resource->save();
        return $resource;
    }

    /**
     * {@inheritdoc}
     */
    public function update(int $id, array $attributes): bool
    {
        $resource = $this->getById($id);
        $resource->fill($attributes);
        $isUpdated = $resource->save();
        return $isUpdated;
    }
}
