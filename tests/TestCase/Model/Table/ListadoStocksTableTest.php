<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListadoStocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListadoStocksTable Test Case
 */
class ListadoStocksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ListadoStocksTable
     */
    public $ListadoStocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.listado_stocks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ListadoStocks') ? [] : ['className' => 'App\Model\Table\ListadoStocksTable'];
        $this->ListadoStocks = TableRegistry::get('ListadoStocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ListadoStocks);

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
