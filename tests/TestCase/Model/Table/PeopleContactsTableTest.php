<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeopleContactsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeopleContactsTable Test Case
 */
class PeopleContactsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeopleContactsTable
     */
    public $PeopleContacts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.people_contacts',
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
        $config = TableRegistry::exists('PeopleContacts') ? [] : ['className' => 'App\Model\Table\PeopleContactsTable'];
        $this->PeopleContacts = TableRegistry::get('PeopleContacts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PeopleContacts);

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
