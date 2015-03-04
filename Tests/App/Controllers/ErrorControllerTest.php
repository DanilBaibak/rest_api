<?php
/**
 * Tests for ErrorController
 * User: Danil Baibak danil.baibak@gmail.com
 * Date: 04/03/15
 * Time: 11:08
 */

namespace Tests\App\Controllers;

use GuzzleHttp\Exception\ClientException;

class ErrorControllerTest extends \PHPUnit_Framework_TestCase
{
    public $client;
    const SITE_URL = 'http://rest_my.work/';

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }

    /**
     * Test for the action 'page not found'
     */
    public function testPageNotFound()
    {
        try {
            $this->client->get(self::SITE_URL . 'wrong_url');
        } catch (ClientException $e) {
            $this->assertEquals(404, $e->getResponse()->getStatusCode());
        }
    }

}
