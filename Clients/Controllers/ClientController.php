<?php

namespace App\Clients\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Clients\Requests\ClientRequest;
use App\Http\Controllers\ApiController;
use App\Clients\Transformers\ClientTransformer;
use App\Clients\Contracts\Repositories\ClientRepositoryInterface;
use App\Repositories\SortingFactory;
use App\Clients\Services\ClientService;

class ClientController extends ApiController
{
    private $service;
    /**
     * ClientController constructor
     *
     * @param ClientTransformer $clientTransformer
     * @param ClientRepositoryInterface $clientRepository
     * @param ClientRequest $request
     * @param ClientService $service
     */
    public function __construct(
        ClientTransformer $clientTransformer,
        ClientRepositoryInterface $clientRepository,
        ClientRequest $request,
        ClientService $service
    ) {
        parent::__construct($clientTransformer, $clientRepository, $request);
        $this->service = $service;
    }

    /**
     * Display a listing of resources.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $page = $this->request->get('page', 0);
        $perPage = $this->request->get('limit', 10);

        if ($this->request->has('sorting')) {
            $factory = new SortingFactory();
            $sorting = $factory->getSortingStrategy($this->repository);
            foreach ($this->request->get('sorting') as $key => $value) {
                $sorting->addDirection($key, $value);
            }
            $this->repository = $sorting->sort();
        }
        
        $resources = $this->repository->getPaginated($page, $perPage);
    
        return $this->response($resources);
    }

    /**
     * Create new client
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        $attributes = $this->request->all();
        $resource = $this->service->createClient($attributes);

        return $this->response($resource, Response::HTTP_CREATED);
    }

    /**
     * Update the specified client.
     *
     * @param int|string $id
     * @return JsonResponse
     */
    public function update($id): JsonResponse
    {
        $attributes = $this->request->all();
        $updated = $this->service->updateClient($id, $attributes);
        $resource = $this->repository->getById($id);
        $status = $updated ? Response::HTTP_OK : Response::HTTP_NOT_MODIFIED;
        return $this->response($resource, $status);
    }
}
