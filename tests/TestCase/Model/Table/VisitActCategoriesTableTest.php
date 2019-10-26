<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VisitActCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VisitActCategoriesTable Test Case
 */
class VisitActCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VisitActCategoriesTable
     */
    public $VisitActCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visit_act_categories',
        'app.visit_act_sub_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VisitActCategories') ? [] : ['className' => 'App\Model\Table\VisitActCategoriesTable'];
        $this->VisitActCategories = TableRegistry::get('VisitActCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VisitActCategories);

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
