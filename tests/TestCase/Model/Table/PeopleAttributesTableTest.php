<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeopleAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeopleAttributesTable Test Case
 */
class PeopleAttributesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PeopleAttributesTable
     */
    public $PeopleAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.people_attributes',
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
        $config = TableRegistry::exists('PeopleAttributes') ? [] : ['className' => 'App\Model\Table\PeopleAttributesTable'];
        $this->PeopleAttributes = TableRegistry::get('PeopleAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PeopleAttributes);

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
