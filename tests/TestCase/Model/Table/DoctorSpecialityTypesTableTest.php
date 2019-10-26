<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DoctorSpecialityTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DoctorSpecialityTypesTable Test Case
 */
class DoctorSpecialityTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DoctorSpecialityTypesTable
     */
    public $DoctorSpecialityTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.doctor_speciality_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DoctorSpecialityTypes') ? [] : ['className' => 'App\Model\Table\DoctorSpecialityTypesTable'];
        $this->DoctorSpecialityTypes = TableRegistry::get('DoctorSpecialityTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DoctorSpecialityTypes);

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
