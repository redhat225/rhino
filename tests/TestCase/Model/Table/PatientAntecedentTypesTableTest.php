<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientAntecedentTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientAntecedentTypesTable Test Case
 */
class PatientAntecedentTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientAntecedentTypesTable
     */
    public $PatientAntecedentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_antecedent_types',
        'app.patient_antecedent_under_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientAntecedentTypes') ? [] : ['className' => 'App\Model\Table\PatientAntecedentTypesTable'];
        $this->PatientAntecedentTypes = TableRegistry::get('PatientAntecedentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientAntecedentTypes);

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
