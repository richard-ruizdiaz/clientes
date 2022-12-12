<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropuestasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropuestasTable Test Case
 */
class PropuestasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PropuestasTable
     */
    public $Propuestas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.propuestas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Propuestas') ? [] : ['className' => PropuestasTable::class];
        $this->Propuestas = TableRegistry::getTableLocator()->get('Propuestas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Propuestas);

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
