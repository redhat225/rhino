<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentTypesTable Test Case
 */
class TreatmentTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentTypesTable
     */
    public $TreatmentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatment_types',
        'app.treatments',
        'app.visit_meetings',
        'app.treatment_requirements',
        'app.treatment_requirement_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TreatmentTypes') ? [] : ['className' => 'App\Model\Table\TreatmentTypesTable'];
        $this->TreatmentTypes = TableRegistry::get('TreatmentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TreatmentTypes);

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
