<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementActiveIngredientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementActiveIngredientsTable Test Case
 */
class RequirementActiveIngredientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementActiveIngredientsTable
     */
    public $RequirementActiveIngredients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_active_ingredients',
        'app.requirement_ingredient_fractions',
        'app.requirement_interactions',
        'app.requirement_linked_active_ingredients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementActiveIngredients') ? [] : ['className' => 'App\Model\Table\RequirementActiveIngredientsTable'];
        $this->RequirementActiveIngredients = TableRegistry::get('RequirementActiveIngredients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementActiveIngredients);

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
