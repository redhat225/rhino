<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientCompanyDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientCompanyDetailsTable Test Case
 */
class PatientCompanyDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientCompanyDetailsTable
     */
    public $PatientCompanyDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_company_details',
        'app.patients',
        'app.people',
        'app.diary_tokens',
        'app.doctors',
        'app.doctor_speciality_details',
        'app.visit_meetings',
        'app.visits',
        'app.diaries',
        'app.diary_types',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_companies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientCompanyDetails') ? [] : ['className' => 'App\Model\Table\PatientCompanyDetailsTable'];
        $this->PatientCompanyDetails = TableRegistry::get('PatientCompanyDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientCompanyDetails);

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
