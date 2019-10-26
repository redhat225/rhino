<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamTypesTable Test Case
 */
class ExamTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamTypesTable
     */
    public $ExamTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exam_types',
        'app.exam_under_types',
        'app.visit_meetings',
        'app.exams',
        'app.visit_intervention_doctors',
        'app.exam_evidences',
        'app.exam_notes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExamTypes') ? [] : ['className' => 'App\Model\Table\ExamTypesTable'];
        $this->ExamTypes = TableRegistry::get('ExamTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExamTypes);

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
