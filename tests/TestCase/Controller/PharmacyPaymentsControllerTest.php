<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PharmacyPaymentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PharmacyPaymentsController Test Case
 */
class PharmacyPaymentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_payments',
        'app.pharmacy_payment_methods',
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
