<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PatientCompanyDetailsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PatientCompanyDetailsController Test Case
 */
class PatientCompanyDetailsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
