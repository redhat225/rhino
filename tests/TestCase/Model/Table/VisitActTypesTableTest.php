<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitActTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitActTypesTable Test Case
 */
class VisitActTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitActTypesTable
     */
    public $VisitActTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_act_types',
        'app.visit_acts',
        'app.visit_act_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitActTypes') ? [] : ['className' => 'App\Model\Table\VisitActTypesTable'];
        $this->VisitActTypes = TableRegistry::get('VisitActTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitActTypes);

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
