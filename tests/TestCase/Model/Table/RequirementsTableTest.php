<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementsTable Test Case
 */
class RequirementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementsTable
     */
    public $Requirements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirements',
        'app.requirement_compositions',
        'app.requirement_holder_details',
        'app.requirement_issue_lists',
        'app.requirement_presentations',
        'app.requirement_route_administrations',
        'app.requirement_significant_informations',
        'app.treatment_requirements',
        'app.treatments',
        'app.visit_meetings',
        'app.treatment_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Requirements') ? [] : ['className' => 'App\Model\Table\RequirementsTable'];
        $this->Requirements = TableRegistry::get('Requirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Requirements);

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
