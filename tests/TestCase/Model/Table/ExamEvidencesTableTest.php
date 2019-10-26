<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamEvidencesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamEvidencesTable Test Case
 */
class ExamEvidencesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamEvidencesTable
     */
    public $ExamEvidences;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exam_evidences',
        'app.exams',
        'app.visit_intervention_doctors',
        'app.exam_under_types',
        'app.exam_types',
        'app.visit_meetings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExamEvidences') ? [] : ['className' => 'App\Model\Table\ExamEvidencesTable'];
        $this->ExamEvidences = TableRegistry::get('ExamEvidences', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExamEvidences);

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
