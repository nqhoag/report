<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CosovatchatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CosovatchatsTable Test Case
 */
class CosovatchatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CosovatchatsTable
     */
    public $Cosovatchats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cosovatchats',
        'app.reports',
        'app.schools',
        'app.caphocs',
        'app.loaitruongs',
        'app.khois',
        'app.kieuphongs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cosovatchats') ? [] : ['className' => 'App\Model\Table\CosovatchatsTable'];
        $this->Cosovatchats = TableRegistry::get('Cosovatchats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cosovatchats);

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
