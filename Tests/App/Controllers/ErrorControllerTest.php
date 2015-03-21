<?php
/**
 * Tests for ErrorController
 * User: Danil Baibak danil.baibak@gmail.com
 * Date: 04/03/15
 * Time: 11:08
 */

namespace Tests\App\Controllers;

use GuzzleHttp\Exception\ClientException;
use Core\Tests\HttpTestTrait as HttpTestTrait;

class ErrorControllerTest extends \PHPUnit_Framework_TestCase
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
     * Test for the action 'page not found'
     */
    public function testPageNotFound()
    {
        try {
            $this->client->get(SITE_URL . 'wrong_url');
        } catch (ClientException $e) {
            $this->assertEquals(404, $e->getResponse()->getStatusCode());
        }
    }
}
