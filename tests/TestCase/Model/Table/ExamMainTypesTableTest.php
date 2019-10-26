<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamMainTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamMainTypesTable Test Case
 */
class ExamMainTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamMainTypesTable
     */
    public $ExamMainTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exam_main_types',
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
        $config = TableRegistry::exists('ExamMainTypes') ? [] : ['className' => 'App\Model\Table\ExamMainTypesTable'];
        $this->ExamMainTypes = TableRegistry::get('ExamMainTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExamMainTypes);

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
