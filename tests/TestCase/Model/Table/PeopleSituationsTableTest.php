<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeopleSituationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeopleSituationsTable Test Case
 */
class PeopleSituationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeopleSituationsTable
     */
    public $PeopleSituations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.people_situations',
        'app.people'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PeopleSituations') ? [] : ['className' => 'App\Model\Table\PeopleSituationsTable'];
        $this->PeopleSituations = TableRegistry::get('PeopleSituations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PeopleSituations);

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
