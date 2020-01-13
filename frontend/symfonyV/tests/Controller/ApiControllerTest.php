<?php

namespace App\Tests\Controller;

use App\Tests\Controller\BaseControllerTest;

class ApiControllerTest extends BaseControllerTest
{
    public function testlanding()
    {
        $this->client->request("GET", "/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testSuppliers()
    {
        $this->client->get("/api/suppliers/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testProducts()
    {
        $this->client->get("/api/products/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testOrders()
    {
        $this->client->get("/api/order_details/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testCategories()
    {
        $this->client->get("/api/categories/");
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }
}

?>