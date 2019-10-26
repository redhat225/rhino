<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExaminerInstitutionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExaminerInstitutionsTable Test Case
 */
class ExaminerInstitutionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExaminerInstitutionsTable
     */
    public $ExaminerInstitutions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.examiner_institutions',
        'app.institutions',
        'app.institution_types',
        'app.institution_areas',
        'app.institution_adresses',
        'app.manager_operators',
        'app.people',
        'app.patients',
        'app.patient_companies',
        'app.patient_company_details',
        'app.diary_tokens',
        'app.doctors',
        'app.doctor_act_details',
        'app.doctor_acts',
        'app.visit_meetings',
        'app.diaries',
        'app.diary_types',
        'app.patient_act_details',
        'app.patient_acts',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.visits',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.visit_specialities',
        'app.visit_types',
        'app.visit_acts',
        'app.visit_act_types',
        'app.visit_act_details',
        'app.visit_invoices',
        'app.visit_invoice_payment_ways',
        'app.visit_invoice_types',
        'app.visit_invoice_details',
        'app.visit_invoice_payments',
        'app.visit_invoice_payment_methods',
        'app.visit_invoice_payment_schedules',
        'app.visit_order_details',
        'app.patient_insurances',
        'app.patient_insurers',
        'app.pharmacy_operators',
        'app.pharmacy_institutions',
        'app.pharmacy_products',
        'app.pharmacy_product_categories',
        'app.pharmacy_product_prices',
        'app.pharmacy_store_products',
        'app.pharmacy_invoice_details',
        'app.pharmacy_store_product_levels',
        'app.pharmacy_roles',
        'app.pharmacy_invoices',
        'app.pharmacy_customers',
        'app.pharmacy_payments',
        'app.pharmacy_payment_methods',
        'app.pharmacy_operator_act_details',
        'app.pharmacy_operator_acts',
        'app.examiner_operators',
        'app.examiner_operator_act_details',
        'app.examiner_operator_acts',
        'app.people_adresses',
        'app.people_descendants',
        'app.people_attributes',
        'app.people_situations',
        'app.people_contacts',
        'app.manager_operator_act_details',
        'app.manager_operator_acts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExaminerInstitutions') ? [] : ['className' => 'App\Model\Table\ExaminerInstitutionsTable'];
        $this->ExaminerInstitutions = TableRegistry::get('ExaminerInstitutions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExaminerInstitutions);

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
