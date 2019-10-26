<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementLinkedActiveIngredientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementLinkedActiveIngredientsTable Test Case
 */
class RequirementLinkedActiveIngredientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementLinkedActiveIngredientsTable
     */
    public $RequirementLinkedActiveIngredients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_linked_active_ingredients',
        'app.requirement_compositions',
        'app.requirements',
        'app.requirement_holder_details',
        'app.requirement_holders',
        'app.country_townships',
        'app.country_cities',
        'app.countries',
        'app.institutions',
        'app.institution_types',
        'app.diary_tokens',
        'app.patients',
        'app.people',
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
        'app.visits',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.manager_operators',
        'app.manager_operator_act_details',
        'app.manager_operator_acts',
        'app.manager_role_details',
        'app.visit_invoices',
        'app.visit_invoice_payment_ways',
        'app.visit_invoice_types',
        'app.visit_invoice_details',
        'app.visit_invoice_payments',
        'app.visit_invoice_payment_methods',
        'app.visit_invoice_payment_schedules',
        'app.visit_tasks',
        'app.visit_specialities',
        'app.visit_types',
        'app.visit_acts',
        'app.visit_act_types',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.patient_insurances',
        'app.patient_insurers',
        'app.doctors',
        'app.doctor_act_details',
        'app.doctor_acts',
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
        'app.visit_intervention_doctors',
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
        'app.people_adresses',
        'app.requirement_issue_lists',
        'app.requirement_presentations',
        'app.requirement_route_administrations',
        'app.requirement_significant_informations',
        'app.treatment_requirements',
        'app.treatments',
        'app.treatment_types',
        'app.requirement_ingredient_fractions',
        'app.requirement_active_fractions',
        'app.requirement_active_ingredients',
        'app.requirement_interactions',
        'app.interaction_family1s',
        'app.interaction_family2s'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementLinkedActiveIngredients') ? [] : ['className' => 'App\Model\Table\RequirementLinkedActiveIngredientsTable'];
        $this->RequirementLinkedActiveIngredients = TableRegistry::get('RequirementLinkedActiveIngredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementLinkedActiveIngredients);

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
