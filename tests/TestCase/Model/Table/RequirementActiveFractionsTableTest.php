<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequirementActiveFractionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequirementActiveFractionsTable Test Case
 */
class RequirementActiveFractionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequirementActiveFractionsTable
     */
    public $RequirementActiveFractions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_active_fractions',
        'app.requirement_ingredient_fractions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequirementActiveFractions') ? [] : ['className' => 'App\Model\Table\RequirementActiveFractionsTable'];
        $this->RequirementActiveFractions = TableRegistry::get('RequirementActiveFractions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequirementActiveFractions);

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
