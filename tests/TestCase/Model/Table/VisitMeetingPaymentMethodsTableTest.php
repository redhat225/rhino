<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitMeetingPaymentMethodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitMeetingPaymentMethodsTable Test Case
 */
class VisitMeetingPaymentMethodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitMeetingPaymentMethodsTable
     */
    public $VisitMeetingPaymentMethods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_meeting_payment_methods',
        'app.visit_meeting_invoices',
        'app.manager_operators',
        'app.people',
        'app.visit_meetings',
        'app.visits',
        'app.institutions',
        'app.institution_types',
        'app.pharmacy_institutions',
        'app.pharmacy_operators',
        'app.pharmacy_roles',
        'app.pharmacy_invoices',
        'app.pharmacy_customers',
        'app.pharmacy_invoice_details',
        'app.pharmacy_payments',
        'app.pharmacy_payment_methods',
        'app.pharmacy_products',
        'app.pharmacy_product_categories',
        'app.pharmacy_product_prices',
        'app.pharmacy_store_products',
        'app.pharmacy_store_product_levels',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.doctors',
        'app.diary_tokens',
        'app.patients',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_company_details',
        'app.patient_companies',
        'app.diaries',
        'app.diary_types',
        'app.doctor_speciality_details',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.visit_type_details',
        'app.visit_meeting_specialities',
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
        'app.visit_meeting_constants'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitMeetingPaymentMethods') ? [] : ['className' => 'App\Model\Table\VisitMeetingPaymentMethodsTable'];
        $this->VisitMeetingPaymentMethods = TableRegistry::get('VisitMeetingPaymentMethods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitMeetingPaymentMethods);

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
