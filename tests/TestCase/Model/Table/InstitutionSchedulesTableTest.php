<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstitutionSchedulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstitutionSchedulesTable Test Case
 */
class InstitutionSchedulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstitutionSchedulesTable
     */
    public $InstitutionSchedules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.institution_schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstitutionSchedules') ? [] : ['className' => 'App\Model\Table\InstitutionSchedulesTable'];
        $this->InstitutionSchedules = TableRegistry::get('InstitutionSchedules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstitutionSchedules);

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
