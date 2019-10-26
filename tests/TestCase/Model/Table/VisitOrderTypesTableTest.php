<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitOrderTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitOrderTypesTable Test Case
 */
class VisitOrderTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitOrderTypesTable
     */
    public $VisitOrderTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_order_types',
        'app.visit_order_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitOrderTypes') ? [] : ['className' => 'App\Model\Table\VisitOrderTypesTable'];
        $this->VisitOrderTypes = TableRegistry::get('VisitOrderTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitOrderTypes);

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
