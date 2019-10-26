<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuxiliaryActsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuxiliaryActsTable Test Case
 */
class AuxiliaryActsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuxiliaryActsTable
     */
    public $AuxiliaryActs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auxiliary_acts',
        'app.auxiliary_act_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuxiliaryActs') ? [] : ['className' => 'App\Model\Table\AuxiliaryActsTable'];
        $this->AuxiliaryActs = TableRegistry::get('AuxiliaryActs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuxiliaryActs);

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
