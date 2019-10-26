<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PatientBooksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PatientBooksController Test Case
 */
class PatientBooksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_books',
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
        'app.patient_company_details'
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
