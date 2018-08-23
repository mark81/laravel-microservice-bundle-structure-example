<?php

namespace Functional;

use App\Clients\Models\Client;
use App\Clients\Services\ClientType;
use Functional\Concerns\InteractsWithSwagger;

class ClientApiTest extends TestCase
{
    use InteractsWithSwagger;

    /**
     * @test
     */
    public function list_all_clients()
    {
        factory(Client::class)->create();
        $this->assertGetSchemaMatch('/api/v1/clients');
    }

    /**
     * @test
     */
    public function get_a_client()
    {
        $client = factory(Client::class)->create();
        $this->assertGetSchemaMatch('/api/v1/clients/' . $client->getId());
    }

    /**
     * @test
     */
    public function create_client()
    {
        $payload = [
            'type_id' => 1,
            'name' => 'Test',
            'code' => 'test',
            'description' => 'This is a company',
            'telephone' => '12345',
            'email' => 'test@example.com',
            'street' => '10 Street',
            'county' => 'London',
            'city' => 'London',
            'postcode' => 'SS11 AA33',
            'country' => 'GBR'
        ];

        $this->assertPostSchemaMatch('/api/v1/clients', $payload);
        $response = json_decode($this->response->getContent(), true);
        $data = $response['data'];
        $this->assertEquals($data['type_id'], 1);
        $this->assertEquals($data['name'], 'Test');
        $this->assertEquals($data['code'], 'test');
        $this->assertEquals($data['description'], 'This is a company');
        $this->assertEquals($data['telephone'], '12345');
        $this->assertEquals($data['email'], 'test@example.com');
        $this->assertEquals($data['street'], '10 Street');
        $this->assertEquals($data['county'], 'London');
        $this->assertEquals($data['city'], 'London');
        $this->assertEquals($data['postcode'], 'SS11 AA33');
        $this->assertEquals($data['country'], 'GBR');
    }

    /**
     * @test
     */
    public function update_client()
    {
        $client = factory(Client::class)->create();
        $payload = [
            'name' => 'Test',
            'code' => 'test',
            'description' => 'This is a company',
            'telephone' => '12345',
            'email' => 'test@example.com',
            'street' => '10 Street',
            'county' => 'London',
            'city' => 'London',
            'postcode' => 'SS11 AA33',
            'country' => 'GBR'
        ];

        $this->assertPutSchemaMatch("/api/v1/clients/" . $client->getId(), $payload);
        $response = json_decode($this->response->getContent(), true);
        $data = $response['data'];
        $this->assertEquals($data['name'], 'Test');
        $this->assertEquals($data['code'], 'test');
        $this->assertEquals($data['description'], 'This is a company');
        $this->assertEquals($data['telephone'], '12345');
        $this->assertEquals($data['email'], 'test@example.com');
        $this->assertEquals($data['street'], '10 Street');
        $this->assertEquals($data['county'], 'London');
        $this->assertEquals($data['city'], 'London');
        $this->assertEquals($data['postcode'], 'SS11 AA33');
        $this->assertEquals($data['country'], 'GBR');
    }
}
