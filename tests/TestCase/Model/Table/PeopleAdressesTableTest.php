<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeopleAdressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeopleAdressesTable Test Case
 */
class PeopleAdressesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeopleAdressesTable
     */
    public $PeopleAdresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.people_adresses',
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
        $config = TableRegistry::exists('PeopleAdresses') ? [] : ['className' => 'App\Model\Table\PeopleAdressesTable'];
        $this->PeopleAdresses = TableRegistry::get('PeopleAdresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PeopleAdresses);

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
