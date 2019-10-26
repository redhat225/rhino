<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitInvoiceTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitInvoiceTypesTable Test Case
 */
class VisitInvoiceTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitInvoiceTypesTable
     */
    public $VisitInvoiceTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_invoice_types',
        'app.visit_invoices',
        'app.visits',
        'app.institutions',
        'app.institution_types',
        'app.pharmacy_institutions',
        'app.pharmacy_operators',
        'app.people',
        'app.patients',
        'app.diary_tokens',
        'app.doctors',
        'app.doctor_act_details',
        'app.doctor_acts',
        'app.doctor_speciality_details',
        'app.visit_meetings',
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
        'app.diaries',
        'app.diary_types',
        'app.patient_act_details',
        'app.patient_acts',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_company_details',
        'app.patient_companies',
        'app.manager_operators',
        'app.manager_operator_act_details',
        'app.manager_operator_acts',
        'app.visit_meeting_invoices',
        'app.examiner_operators',
        'app.examiner_operator_act_details',
        'app.examiner_operator_acts',
        'app.people_adresses',
        'app.people_descendants',
        'app.people_attributes',
        'app.people_situations',
        'app.people_contacts',
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
        'app.visit_types',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.visit_invoice_payment_methods',
        'app.visit_invoice_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitInvoiceTypes') ? [] : ['className' => 'App\Model\Table\VisitInvoiceTypesTable'];
        $this->VisitInvoiceTypes = TableRegistry::get('VisitInvoiceTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitInvoiceTypes);

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
