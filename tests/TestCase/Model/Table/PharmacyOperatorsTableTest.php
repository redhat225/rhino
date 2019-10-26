<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyOperatorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyOperatorsTable Test Case
 */
class PharmacyOperatorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyOperatorsTable
     */
    public $PharmacyOperators;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_operators',
        'app.people',
        'app.pharmacy_institutions',
        'app.institutions',
        'app.institution_types',
        'app.visits',
        'app.visit_kind_transports',
        'app.visit_levels',
        'app.doctors',
        'app.diary_tokens',
        'app.patients',
        'app.patient_act_details',
        'app.patient_acts',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_company_details',
        'app.patient_companies',
        'app.visit_meetings',
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
        'app.visit_meeting_constants',
        'app.visit_meeting_invoices',
        'app.manager_operators',
        'app.manager_operator_act_details',
        'app.manager_operator_acts',
        'app.visit_meeting_payment_methods',
        'app.diaries',
        'app.diary_types',
        'app.doctor_act_details',
        'app.doctor_acts',
        'app.doctor_speciality_details',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.visit_type_details',
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
        'app.pharmacy_payment_methods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyOperators') ? [] : ['className' => 'App\Model\Table\PharmacyOperatorsTable'];
        $this->PharmacyOperators = TableRegistry::get('PharmacyOperators', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyOperators);

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
