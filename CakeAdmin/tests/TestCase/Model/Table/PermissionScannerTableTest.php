<?php
namespace CakeAdmin\Test\TestCase\Model\Table;

use CakeAdmin\Model\Table\PermissionScannerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeAdmin\Model\Table\PermissionScannerTable Test Case
 */
class PermissionScannerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeAdmin\Model\Table\PermissionScannerTable
     */
    public $PermissionScanner;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_admin.permission_scanner'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PermissionScanner') ? [] : ['className' => 'CakeAdmin\Model\Table\PermissionScannerTable'];
        $this->PermissionScanner = TableRegistry::get('PermissionScanner', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissionScanner);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
