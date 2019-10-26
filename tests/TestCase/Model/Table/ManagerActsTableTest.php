<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManagerActsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManagerActsTable Test Case
 */
class ManagerActsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManagerActsTable
     */
    public $ManagerActs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manager_acts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ManagerActs') ? [] : ['className' => 'App\Model\Table\ManagerActsTable'];
        $this->ManagerActs = TableRegistry::get('ManagerActs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ManagerActs);

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
