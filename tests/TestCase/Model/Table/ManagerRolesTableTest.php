<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManagerRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManagerRolesTable Test Case
 */
class ManagerRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManagerRolesTable
     */
    public $ManagerRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manager_roles',
        'app.manager_role_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ManagerRoles') ? [] : ['className' => 'App\Model\Table\ManagerRolesTable'];
        $this->ManagerRoles = TableRegistry::get('ManagerRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ManagerRoles);

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
