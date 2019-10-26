<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementInfoGenericsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementInfoGenericsTable Test Case
 */
class RequirementInfoGenericsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementInfoGenericsTable
     */
    public $RequirementInfoGenerics;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_info_generics',
        'app.requirement_info_generic_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementInfoGenerics') ? [] : ['className' => 'App\Model\Table\RequirementInfoGenericsTable'];
        $this->RequirementInfoGenerics = TableRegistry::get('RequirementInfoGenerics', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementInfoGenerics);

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
