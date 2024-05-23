<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class SubscriptionControllerTest extends TestCase
{
    public function testGetSubscription()
    {
        $client = static::createClient();
        $client->request('GET', '/subscription/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // More assertions...
    }

    public function testCreateSubscription()
    {
        $client = static::createClient();
        $client->request('POST', '/subscription', [], [], [], json_encode([
            'contact' => 1,
            'product' => 1,
            'beginDate' => '2023-01-01',
            'endDate' => '2023-12-31',
        ]));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // More assertions...
    }

    public function testUpdateSubscription()
    {
        $client = static::createClient();
        $client->request('PUT', '/subscription/1', [], [], [], json_encode([
            'beginDate' => '2023-01-01',
            'endDate' => '2023-12-31',
        ]));

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        // More assertions...
    }

    public function testDeleteSubscription()
    {
        $client = static::createClient();
        $client->request('DELETE', '/subscription/1');

        $this->assertEquals(204, $client->getResponse()->getStatusCode());
        // More assertions...
    }
}


