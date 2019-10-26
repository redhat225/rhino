<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountryCitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountryCitiesTable Test Case
 */
class CountryCitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CountryCitiesTable
     */
    public $CountryCities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.country_cities',
        'app.countries',
        'app.country_townships'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CountryCities') ? [] : ['className' => 'App\Model\Table\CountryCitiesTable'];
        $this->CountryCities = TableRegistry::get('CountryCities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CountryCities);

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
