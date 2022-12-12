<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CuotasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CuotasTable Test Case
 */
class CuotasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CuotasTable
     */
    public $Cuotas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cuotas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cuotas') ? [] : ['className' => 'App\Model\Table\CuotasTable'];
        $this->Cuotas = TableRegistry::get('Cuotas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cuotas);

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
