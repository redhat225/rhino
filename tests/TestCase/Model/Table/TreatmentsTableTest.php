<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TreatmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TreatmentsTable Test Case
 */
class TreatmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TreatmentsTable
     */
    public $Treatments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.treatments',
        'app.visit_meetings',
        'app.treatment_types',
        'app.treatment_requirements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Treatments') ? [] : ['className' => 'App\Model\Table\TreatmentsTable'];
        $this->Treatments = TableRegistry::get('Treatments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Treatments);

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
