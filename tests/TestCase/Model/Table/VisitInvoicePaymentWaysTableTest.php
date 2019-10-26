<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitInvoicePaymentWaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitInvoicePaymentWaysTable Test Case
 */
class VisitInvoicePaymentWaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitInvoicePaymentWaysTable
     */
    public $VisitInvoicePaymentWays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_invoice_payment_ways',
        'app.visit_invoices',
        'app.visits',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.patients',
        'app.people',
        'app.manager_operators',
        'app.institutions',
        'app.institution_types',
        'app.institution_areas',
        'app.examiner_institutions',
        'app.institution_adresses',
        'app.pharmacy_institutions',
        'app.pharmacy_operators',
        'app.pharmacy_roles',
        'app.pharmacy_invoices',
        'app.pharmacy_customers',
        'app.pharmacy_invoice_details',
        'app.pharmacy_payments',
        'app.pharmacy_payment_methods',
        'app.pharmacy_operator_act_details',
        'app.pharmacy_operator_acts',
        'app.pharmacy_products',
        'app.pharmacy_product_categories',
        'app.pharmacy_product_prices',
        'app.pharmacy_store_products',
        'app.pharmacy_store_product_levels',
        'app.manager_operator_act_details',
        'app.manager_operator_acts',
        'app.doctors',
        'app.diary_tokens',
        'app.diaries',
        'app.diary_types',
        'app.doctor_act_details',
        'app.doctor_acts',
        'app.doctor_speciality_details',
        'app.visit_meetings',
        'app.visit_meeting_types',
        'app.exams',
        'app.exam_types',
        'app.exam_main_types',
        'app.exam_under_types',
        'app.exam_evidences',
        'app.exam_notes',
        'app.treatments',
        'app.treatment_types',
        'app.treatment_requirements',
        'app.treatment_requirement_types',
        'app.visit_meeting_constants',
        'app.examiner_operators',
        'app.examiner_operator_act_details',
        'app.examiner_operator_acts',
        'app.people_adresses',
        'app.people_descendants',
        'app.people_attributes',
        'app.people_situations',
        'app.people_contacts',
        'app.patient_act_details',
        'app.patient_acts',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_company_details',
        'app.patient_companies',
        'app.patient_insurances',
        'app.patient_insurers',
        'app.visit_specialities',
        'app.visit_types',
        'app.visit_acts',
        'app.visit_act_types',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.visit_invoice_types',
        'app.visit_invoice_details',
        'app.visit_invoice_payments',
        'app.visit_invoice_payment_methods',
        'app.visit_invoice_payment_schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitInvoicePaymentWays') ? [] : ['className' => 'App\Model\Table\VisitInvoicePaymentWaysTable'];
        $this->VisitInvoicePaymentWays = TableRegistry::get('VisitInvoicePaymentWays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitInvoicePaymentWays);

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
