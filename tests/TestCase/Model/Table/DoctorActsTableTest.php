<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorActsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorActsTable Test Case
 */
class DoctorActsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorActsTable
     */
    public $DoctorActs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doctor_acts',
        'app.doctor_act_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DoctorActs') ? [] : ['className' => 'App\Model\Table\DoctorActsTable'];
        $this->DoctorActs = TableRegistry::get('DoctorActs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoctorActs);

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
