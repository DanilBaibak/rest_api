<?php
/**
 * Tests for AuxiliaryDataController
 * User: Danil Baibak danil.baibak@gmail.com
 * Date: 04/03/15
 * Time: 11:08
 */

namespace Tests\App\Controllers;

use Core\Tests\HttpTestTrait as HttpTestTrait;

class AuxiliaryDataControllerTest extends \PHPUnit_Framework_TestCase
{
    use HttpTestTrait;

    /**
     * Setup data for testing
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * Test call for get all groups
     */
    public function testGetGroups()
    {
        $response = $this->client->get(SITE_URL . 'groups');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->json());
    }

    /**
     * Test for get all shippers
     */
    public function testGetShippers()
    {
        $response = $this->client->get(SITE_URL . 'shippers');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->json());
    }

}
