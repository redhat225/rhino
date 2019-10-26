<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PatientActDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PatientActDetailsTable Test Case
 */
class PatientActDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PatientActDetailsTable
     */
    public $PatientActDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.patient_act_details',
        'app.patients',
        'app.people',
        'app.manager_operators',
        'app.institutions',
        'app.institution_types',
        'app.country_townships',
        'app.country_cities',
        'app.countries',
        'app.people_adresses',
        'app.requirement_holders',
        'app.diary_tokens',
        'app.doctors',
        'app.doctor_act_details',
        'app.doctor_acts',
        'app.visit_meetings',
        'app.diaries',
        'app.diary_types',
        'app.examiner_institutions',
        'app.examiner_operators',
        'app.examiner_operator_act_details',
        'app.examiner_operator_acts',
        'app.examiner_role_details',
        'app.institution_adresses',
        'app.institution_doctors',
        'app.doctor_specialities',
        'app.patient_bookings',
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
        'app.visit_invoice_items',
        'app.manager_operator_act_details',
        'app.manager_operator_acts',
        'app.manager_role_details',
        'app.visit_invoices',
        'app.visits',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.visit_specialities',
        'app.visit_types',
        'app.visit_acts',
        'app.visit_act_types',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.visit_invoice_payment_ways',
        'app.visit_invoice_types',
        'app.visit_invoice_details',
        'app.visit_invoice_payments',
        'app.visit_invoice_payment_methods',
        'app.visit_invoice_payment_schedules',
        'app.visit_tasks',
        'app.people_descendants',
        'app.people_attributes',
        'app.people_situations',
        'app.people_contacts',
        'app.patient_companies',
        'app.patient_company_details',
        'app.patient_antecedents',
        'app.patient_antecedent_items',
        'app.patient_books',
        'app.patient_insurances',
        'app.patient_insurers',
        'app.patient_acts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PatientActDetails') ? [] : ['className' => 'App\Model\Table\PatientActDetailsTable'];
        $this->PatientActDetails = TableRegistry::get('PatientActDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PatientActDetails);

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
