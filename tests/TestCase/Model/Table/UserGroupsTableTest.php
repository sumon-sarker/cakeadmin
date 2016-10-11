<?php
namespace CakeAdmin\Test\TestCase\Model\Table;

use CakeAdmin\Model\Table\UserGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * CakeAdmin\Model\Table\UserGroupsTable Test Case
 */
class UserGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \CakeAdmin\Model\Table\UserGroupsTable
     */
    public $UserGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.cake_admin.user_groups',
        'plugin.cake_admin.user_group_permissions',
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
        $config = TableRegistry::exists('UserGroups') ? [] : ['className' => 'CakeAdmin\Model\Table\UserGroupsTable'];
        $this->UserGroups = TableRegistry::get('UserGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserGroups);

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
