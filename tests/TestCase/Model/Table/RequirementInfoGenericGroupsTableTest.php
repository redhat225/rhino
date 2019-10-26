<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementInfoGenericGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementInfoGenericGroupsTable Test Case
 */
class RequirementInfoGenericGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementInfoGenericGroupsTable
     */
    public $RequirementInfoGenericGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_info_generic_groups',
        'app.requirement_info_generics'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementInfoGenericGroups') ? [] : ['className' => 'App\Model\Table\RequirementInfoGenericGroupsTable'];
        $this->RequirementInfoGenericGroups = TableRegistry::get('RequirementInfoGenericGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementInfoGenericGroups);

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
