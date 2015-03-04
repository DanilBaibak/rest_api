<?php
/**
 * Tests for dbAdapter
 * User: Danil Baibak
 * Date: 03/03/15
 * Time: 11:44
 */

namespace Tests\Core\Db;

use \Core\Db\DbAdapter;

class DbAdapterTest extends \PHPUnit_Framework_TestCase
{
    public $dbAdapter;

    public function __construct()
    {
        defined('CONFIG') || define('CONFIG', "config/");
        $this->dbAdapter = new DbAdapter();
    }

    /**
     * Check that data for 'shippers' and 'groups' exists
     */
    public function testGetArray()
    {
        $this->assertNotEmpty($this->dbAdapter->getArray("SELECT * FROM ng_shippers"));
        $this->assertNotEmpty($this->dbAdapter->getArray("SELECT * FROM ng_groups"));
    }

    /**
     * Check function getLastInsertId
     */
    public function testGetLastInsertId()
    {
        $this->assertEquals(0, $this->dbAdapter->getLastInsertId());
    }

    /**
     * Check function getAffectedRows
     */
    public function testGetAffectedRows()
    {
        $this->assertEquals(0, $this->dbAdapter->getAffectedRows());
    }
}