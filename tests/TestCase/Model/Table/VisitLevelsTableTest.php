<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitLevelsTable Test Case
 */
class VisitLevelsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitLevelsTable
     */
    public $VisitLevels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_levels',
        'app.visits',
        'app.institutions',
        'app.institution_types',
        'app.pharmacy_institutions',
        'app.pharmacy_operators',
        'app.people',
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
        'app.doctors',
        'app.diary_tokens',
        'app.patients',
        'app.patient_antecedents',
        'app.patient_antecedent_types',
        'app.patient_books',
        'app.patient_company_details',
        'app.patient_companies',
        'app.visit_meetings',
        'app.diaries',
        'app.diary_types',
        'app.doctor_speciality_details',
        'app.visit_act_details',
        'app.visit_order_details',
        'app.visit_type_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitLevels') ? [] : ['className' => 'App\Model\Table\VisitLevelsTable'];
        $this->VisitLevels = TableRegistry::get('VisitLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitLevels);

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
