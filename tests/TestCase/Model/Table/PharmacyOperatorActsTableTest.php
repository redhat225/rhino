<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PharmacyOperatorActsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PharmacyOperatorActsTable Test Case
 */
class PharmacyOperatorActsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PharmacyOperatorActsTable
     */
    public $PharmacyOperatorActs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pharmacy_operator_acts',
        'app.pharmacy_operator_act_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PharmacyOperatorActs') ? [] : ['className' => 'App\Model\Table\PharmacyOperatorActsTable'];
        $this->PharmacyOperatorActs = TableRegistry::get('PharmacyOperatorActs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PharmacyOperatorActs);

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
