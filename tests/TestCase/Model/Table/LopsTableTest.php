<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LopsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LopsTable Test Case
 */
class LopsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LopsTable
     */
    public $Lops;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lops',
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
        $config = TableRegistry::exists('Lops') ? [] : ['className' => 'App\Model\Table\LopsTable'];
        $this->Lops = TableRegistry::get('Lops', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lops);

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
