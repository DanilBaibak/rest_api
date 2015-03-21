<?php
/**
 * Tests for ErrorController
 * User: Danil Baibak danil.baibak@gmail.com
 * Date: 04/03/15
 * Time: 11:08
 */

namespace Tests\App\Controllers;

use GuzzleHttp\Exception\ClientException;

class ProductControllerTest extends \PHPUnit_Framework_TestCase
{
    public $client;
    const SITE_URL = 'http://rest_my.work/';

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Test for call getProducts
     */
    public function testGetProducts()
    {
        $response = $this->client->get(self::SITE_URL . 'products');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->json());
    }

    /**
     * Test for get current product by id
     */
    public function testGetProduct()
    {
        $products = $this->client->get(self::SITE_URL . 'products')->json();
        if (!empty($products)) {
            $response = $this->client->get(self::SITE_URL . 'product/' . $products[0]['id']);

            $this->assertEquals(200, $response->getStatusCode());
            $this->assertNotEmpty($response->json());
        }
    }

    /**
     * Test for checking unique product name
     */
    public function testCheckUniqueProduct()
    {
        $response = $this->client->get(self::SITE_URL . 'product/check_unique_value?field=name&value=test_name');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertTrue($response->json()['status']);
    }

    /**
     * Check response for wrong url
     */
    public function testCheckUniqueProductFail()
    {
        try {
            $this->client->get(self::SITE_URL . 'product/check_unique_value');
        } catch (ClientException $e) {
            $this->assertEquals(400, $e->getResponse()->getStatusCode());
        }
    }
}
