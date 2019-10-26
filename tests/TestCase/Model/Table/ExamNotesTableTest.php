<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamNotesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamNotesTable Test Case
 */
class ExamNotesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamNotesTable
     */
    public $ExamNotes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exam_notes',
        'app.exams',
        'app.visit_intervention_doctors',
        'app.exam_under_types',
        'app.exam_types',
        'app.visit_meetings',
        'app.exam_evidences'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExamNotes') ? [] : ['className' => 'App\Model\Table\ExamNotesTable'];
        $this->ExamNotes = TableRegistry::get('ExamNotes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExamNotes);

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
