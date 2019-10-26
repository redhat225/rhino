<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamUnderTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamUnderTypesTable Test Case
 */
class ExamUnderTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamUnderTypesTable
     */
    public $ExamUnderTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.exam_under_types',
        'app.exam_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExamUnderTypes') ? [] : ['className' => 'App\Model\Table\ExamUnderTypesTable'];
        $this->ExamUnderTypes = TableRegistry::get('ExamUnderTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExamUnderTypes);

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
