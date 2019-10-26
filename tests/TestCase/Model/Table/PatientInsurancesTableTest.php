<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientInsurancesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientInsurancesTable Test Case
 */
class PatientInsurancesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientInsurancesTable
     */
    public $PatientInsurances;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_insurances',
        'app.patient_insurers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientInsurances') ? [] : ['className' => 'App\Model\Table\PatientInsurancesTable'];
        $this->PatientInsurances = TableRegistry::get('PatientInsurances', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientInsurances);

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
