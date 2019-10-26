<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExaminerRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExaminerRolesTable Test Case
 */
class ExaminerRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ExaminerRolesTable
     */
    public $ExaminerRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.examiner_roles',
        'app.examiner_role_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ExaminerRoles') ? [] : ['className' => 'App\Model\Table\ExaminerRolesTable'];
        $this->ExaminerRoles = TableRegistry::get('ExaminerRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ExaminerRoles);

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
