<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InstitutionAreasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InstitutionAreasTable Test Case
 */
class InstitutionAreasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InstitutionAreasTable
     */
    public $InstitutionAreas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.institution_areas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InstitutionAreas') ? [] : ['className' => 'App\Model\Table\InstitutionAreasTable'];
        $this->InstitutionAreas = TableRegistry::get('InstitutionAreas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InstitutionAreas);

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
