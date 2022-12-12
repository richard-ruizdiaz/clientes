<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CreditosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CreditosTable Test Case
 */
class CreditosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CreditosTable
     */
    public $Creditos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.creditos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Creditos') ? [] : ['className' => 'App\Model\Table\CreditosTable'];
        $this->Creditos = TableRegistry::get('Creditos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Creditos);

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
