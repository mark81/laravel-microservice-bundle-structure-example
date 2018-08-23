<?php

namespace App\Clients\Transformers;

use League\Fractal\TransformerAbstract;
use App\Clients\Contracts\Models\ClientInterface;

class ClientTransformer extends TransformerAbstract
{
    public function transform(ClientInterface $client)
    {
        return [
            'id' => $client->getId(),
            'type_id' => $client->getType(),
            'name' => $client->getName(),
            'code' => $client->getCode(),
            'description' => $client->getDescription(),
            'telephone' => $client->getTelephone(),
            'email' => $client->getEmail(),
            'street' => $client->getStreet(),
            'county' => $client->getCounty(),
            'city' => $client->getCity(),
            'postcode' => $client->getPostcode(),
            'country' => $client->getCountry()
        ];
    }
}
