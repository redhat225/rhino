<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientCompaniesTable Test Case
 */
class PatientCompaniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientCompaniesTable
     */
    public $PatientCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_companies',
        'app.patient_company_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientCompanies') ? [] : ['className' => 'App\Model\Table\PatientCompaniesTable'];
        $this->PatientCompanies = TableRegistry::get('PatientCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientCompanies);

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
