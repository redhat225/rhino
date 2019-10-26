<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyPaymentMethodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyPaymentMethodsTable Test Case
 */
class PharmacyPaymentMethodsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyPaymentMethodsTable
     */
    public $PharmacyPaymentMethods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_payment_methods',
        'app.pharmacy_payments',
        'app.pharmacy_invoices',
        'app.pharmacy_operators',
        'app.people',
        'app.pharmacy_institutions',
        'app.institutions',
        'app.institution_types',
        'app.visits',
        'app.pharmacy_products',
        'app.pharmacy_roles',
        'app.pharmacy_customers',
        'app.pharmacy_invoice_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyPaymentMethods') ? [] : ['className' => 'App\Model\Table\PharmacyPaymentMethodsTable'];
        $this->PharmacyPaymentMethods = TableRegistry::get('PharmacyPaymentMethods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyPaymentMethods);

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
