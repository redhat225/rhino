<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitTypesTable Test Case
 */
class VisitTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitTypesTable
     */
    public $VisitTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_types',
        'app.visit_type_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitTypes') ? [] : ['className' => 'App\Model\Table\VisitTypesTable'];
        $this->VisitTypes = TableRegistry::get('VisitTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitTypes);

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
