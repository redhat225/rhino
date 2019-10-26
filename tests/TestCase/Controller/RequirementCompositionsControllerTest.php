<?php
namespace App\Test\TestCase\Controller;

use App\Controller\RequirementCompositionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\RequirementCompositionsController Test Case
 */
class RequirementCompositionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.requirement_compositions',
        'app.requirements',
        'app.requirement_holder_details',
        'app.requirement_issue_lists',
        'app.requirement_presentations',
        'app.requirement_route_administrations',
        'app.requirement_significant_informations',
        'app.treatment_requirements',
        'app.treatments',
        'app.visit_meetings',
        'app.treatment_types',
        'app.requirement_ingredient_fractions',
        'app.requirement_linked_active_ingredients'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
