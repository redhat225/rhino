<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuxiliaryRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuxiliaryRolesTable Test Case
 */
class AuxiliaryRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuxiliaryRolesTable
     */
    public $AuxiliaryRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auxiliary_roles',
        'app.auxiliary_role_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuxiliaryRoles') ? [] : ['className' => 'App\Model\Table\AuxiliaryRolesTable'];
        $this->AuxiliaryRoles = TableRegistry::get('AuxiliaryRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuxiliaryRoles);

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
