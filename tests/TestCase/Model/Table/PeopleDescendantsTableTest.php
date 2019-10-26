<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeopleDescendantsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeopleDescendantsTable Test Case
 */
class PeopleDescendantsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeopleDescendantsTable
     */
    public $PeopleDescendants;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.people_descendants',
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
        $config = TableRegistry::exists('PeopleDescendants') ? [] : ['className' => 'App\Model\Table\PeopleDescendantsTable'];
        $this->PeopleDescendants = TableRegistry::get('PeopleDescendants', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PeopleDescendants);

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
