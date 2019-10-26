<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientBooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientBooksTable Test Case
 */
class PatientBooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientBooksTable
     */
    public $PatientBooks;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientBooks') ? [] : ['className' => 'App\Model\Table\PatientBooksTable'];
        $this->PatientBooks = TableRegistry::get('PatientBooks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientBooks);

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
