<?php

namespace App\Tests\Controller;

use App\Tests\Controller\BaseControllerTest;

class ApiControllerTest extends BaseControllerTest
{
    public function testSuppliers()
    {
        $this->client->request("GET", "/api/suppliers/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testProducts()
    {
        $this->client->request("GET", "/api/products/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testOrders()
    {
        $this->client->request("GET", "/api/orders/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCategories()
    {
        $this->client->request("GET", "/api/categories/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}

?>