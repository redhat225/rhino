<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitInvoiceDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitInvoiceDetailsTable Test Case
 */
class VisitInvoiceDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitInvoiceDetailsTable
     */
    public $VisitInvoiceDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_invoice_details',
        'app.visit_invoices',
        'app.visits',
        'app.patients',
        'app.people',
        'app.situations',
        'app.people_descendants',
        'app.attributes',
        'app.people_adresses',
        'app.country_townships',
        'app.country_cities',
        'app.countries',
        'app.institutions',
        'app.institution_types',
        'app.doctors',
        'app.institution_doctors',
        'app.visit_specialities',
        'app.doctor_specialities',
        'app.diary_tokens',
        'app.diaries',
        'app.diary_types',
        'app.doctor_act_details',
        'app.doctor_acts',
        'app.visit_intervention_doctors',
        'app.exams',
        'app.exam_under_types',
        'app.exam_types',
        'app.exam_main_types',
        'app.exam_evidences',
        'app.exam_notes',
        'app.patient_bookings',
        'app.treatments',
        'app.treatment_requirements',
        'app.requirements',
        'app.requirement_compositions',
        'app.requirement_ingredient_fractions',
        'app.requirement_active_fractions',
        'app.requirement_active_ingredients',
        'app.requirement_interactions',
        'app.interaction_family1s',
        'app.interaction_family2s',
        'app.requirement_linked_active_ingredients',
        'app.requirement_holder_details',
        'app.requirement_holders',
        'app.requirement_issue_lists',
        'app.requirement_presentations',
        'app.requirement_route_administrations',
        'app.requirement_route_administration_types',
        'app.requirement_significant_informations',
        'app.treatment_requirement_alerts',
        'app.treatment_requirement_renewals',
        'app.treatment_requirement_specifications',
        'app.visit_act_doctor_details',
        'app.visit_acts',
        'app.visit_act_types',
        'app.visit_act_auxiliary_details',
        'app.visit_intervention_auxiliaries',
        'app.auxiliaries',
        'app.auxiliary_act_details',
        'app.auxiliary_acts',
        'app.auxiliary_role_details',
        'app.auxiliary_roles',
        'app.visit_constants',
        'app.visit_tasks',
        'app.manager_operators',
        'app.manager_operator_act_details',
        'app.manager_operator_acts',
        'app.manager_role_details',
        'app.visit_notes',
        'app.examiner_institutions',
        'app.examiner_operators',
        'app.examiner_operator_act_details',
        'app.examiner_operator_acts',
        'app.examiner_role_details',
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
        'app.visit_invoice_items',
        'app.visit_invoice_item_categories',
        'app.people_contacts',
        'app.credentials',
        'app.patient_companies',
        'app.patient_company_details',
        'app.patient_act_details',
        'app.patient_acts',
        'app.patient_antecedents',
        'app.patient_antecedent_items',
        'app.patient_antecedent_under_types',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_schedules',
        'app.visit_meetings',
        'app.patient_insurances',
        'app.patient_insurers',
        'app.visit_states',
        'app.visit_state_types',
        'app.visit_levels',
        'app.visit_kind_transports',
        'app.visit_state_order_details',
        'app.visit_invoice_payment_ways',
        'app.visit_invoice_types',
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
        $config = TableRegistry::exists('VisitInvoiceDetails') ? [] : ['className' => 'App\Model\Table\VisitInvoiceDetailsTable'];
        $this->VisitInvoiceDetails = TableRegistry::get('VisitInvoiceDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitInvoiceDetails);

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
