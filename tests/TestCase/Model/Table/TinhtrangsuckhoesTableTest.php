<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TinhtrangsuckhoesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TinhtrangsuckhoesTable Test Case
 */
class TinhtrangsuckhoesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TinhtrangsuckhoesTable
     */
    public $Tinhtrangsuckhoes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tinhtrangsuckhoes',
        'app.schools',
        'app.caphocs',
        'app.loaitruongs',
        'app.reports',
        'app.khois'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tinhtrangsuckhoes') ? [] : ['className' => 'App\Model\Table\TinhtrangsuckhoesTable'];
        $this->Tinhtrangsuckhoes = TableRegistry::get('Tinhtrangsuckhoes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tinhtrangsuckhoes);

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
