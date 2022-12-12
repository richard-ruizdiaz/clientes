<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdelantosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdelantosTable Test Case
 */
class AdelantosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdelantosTable
     */
    public $Adelantos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adelantos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Adelantos') ? [] : ['className' => 'App\Model\Table\AdelantosTable'];
        $this->Adelantos = TableRegistry::get('Adelantos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adelantos);

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
