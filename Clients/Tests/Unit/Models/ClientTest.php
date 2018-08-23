<?php

namespace Unit\Clients\Models;

use Unit\UnitTestCase;
use App\Clients\Models\Client;
use App\Clients\Contracts\Models\ClientInterface;

class ClientContactTest extends UnitTestCase
{

    /**
     * @test
     */
    public function implementsClientContactInterface()
    {
        $client = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    /**
     * @test
     */
    public function retrievesAttributes()
    {
        $client = (new Client())->forceFill([
            'id' => 1,
            'name' => 'Client Name',
            'telephone' => '07123 123 456',
            'email' => 'john_doe@email.com',
        ]);

        $this->assertEquals(1, $client->getId());
        $this->assertEquals('Client Name', $client->getName());
        $this->assertEquals('07123 123 456', $client->getTelephone());
        $this->assertEquals('john_doe@email.com', $client->getEmail());
    }

    /**
     * @test
     */
    public function canSetAttributes()
    {
        $client = new Client();

        $client->setName('Client Name');
        $client->setTelephone('07123 123 456');
        $client->setEmail('john_doe@email.com');

        $this->assertEquals('Client Name', $client->name);
        $this->assertEquals('07123 123 456', $client->telephone);
        $this->assertEquals('john_doe@email.com', $client->email);
    }
}
