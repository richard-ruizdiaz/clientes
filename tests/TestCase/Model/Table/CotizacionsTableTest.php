<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CotizacionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CotizacionsTable Test Case
 */
class CotizacionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CotizacionsTable
     */
    public $Cotizacions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cotizacions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cotizacions') ? [] : ['className' => 'App\Model\Table\CotizacionsTable'];
        $this->Cotizacions = TableRegistry::get('Cotizacions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cotizacions);

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
