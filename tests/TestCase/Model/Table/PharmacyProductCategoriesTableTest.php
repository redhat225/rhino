<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyProductCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyProductCategoriesTable Test Case
 */
class PharmacyProductCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyProductCategoriesTable
     */
    public $PharmacyProductCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_product_categories',
        'app.pharmacy_products',
        'app.pharmacy_institutions',
        'app.institutions',
        'app.institution_types',
        'app.visits',
        'app.pharmacy_operators',
        'app.people',
        'app.pharmacy_roles',
        'app.pharmacy_invoices',
        'app.pharmacy_customers',
        'app.pharmacy_invoice_details',
        'app.pharmacy_payments',
        'app.pharmacy_payment_methods',
        'app.pharmacy_product_prices',
        'app.pharmacy_store_products'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyProductCategories') ? [] : ['className' => 'App\Model\Table\PharmacyProductCategoriesTable'];
        $this->PharmacyProductCategories = TableRegistry::get('PharmacyProductCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyProductCategories);

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
