<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UbicacionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UbicacionsTable Test Case
 */
class UbicacionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UbicacionsTable
     */
    public $Ubicacions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ubicacions',
        'app.users',
        'app.empleados',
        'app.users_empleados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ubicacions') ? [] : ['className' => 'App\Model\Table\UbicacionsTable'];
        $this->Ubicacions = TableRegistry::get('Ubicacions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ubicacions);

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
