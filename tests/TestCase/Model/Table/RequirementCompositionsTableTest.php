<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementCompositionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementCompositionsTable Test Case
 */
class RequirementCompositionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementCompositionsTable
     */
    public $RequirementCompositions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_compositions',
        'app.requirements',
        'app.requirement_holder_details',
        'app.requirement_issue_lists',
        'app.requirement_presentations',
        'app.requirement_route_administrations',
        'app.requirement_significant_informations',
        'app.treatment_requirements',
        'app.treatments',
        'app.visit_meetings',
        'app.treatment_types',
        'app.requirement_ingredient_fractions',
        'app.requirement_linked_active_ingredients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementCompositions') ? [] : ['className' => 'App\Model\Table\RequirementCompositionsTable'];
        $this->RequirementCompositions = TableRegistry::get('RequirementCompositions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementCompositions);

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
