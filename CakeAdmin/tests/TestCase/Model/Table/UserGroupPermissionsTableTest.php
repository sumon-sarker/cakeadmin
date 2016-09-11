<?php
namespace CakeAdmin\Test\TestCase\Model\Table;

use CakeAdmin\Model\Table\UserGroupPermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeAdmin\Model\Table\UserGroupPermissionsTable Test Case
 */
class UserGroupPermissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeAdmin\Model\Table\UserGroupPermissionsTable
     */
    public $UserGroupPermissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_admin.user_group_permissions',
        'plugin.cake_admin.user_groups',
        'plugin.cake_admin.users',
        'plugin.cake_admin.login_tokens',
        'plugin.cake_admin.user_logs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserGroupPermissions') ? [] : ['className' => 'CakeAdmin\Model\Table\UserGroupPermissionsTable'];
        $this->UserGroupPermissions = TableRegistry::get('UserGroupPermissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserGroupPermissions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
