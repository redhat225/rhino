<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ExamNotesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ExamNotesController Test Case
 */
class ExamNotesControllerTest extends IntegrationTestCase
{

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
