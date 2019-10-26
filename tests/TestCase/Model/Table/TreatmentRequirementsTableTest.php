<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentRequirementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentRequirementsTable Test Case
 */
class TreatmentRequirementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentRequirementsTable
     */
    public $TreatmentRequirements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatment_requirements',
        'app.treatments',
        'app.visit_intervention_doctors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TreatmentRequirements') ? [] : ['className' => 'App\Model\Table\TreatmentRequirementsTable'];
        $this->TreatmentRequirements = TableRegistry::get('TreatmentRequirements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TreatmentRequirements);

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

    /**
     * Test afterSave method
     *
     * @return void
     */
    public function testAfterSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
