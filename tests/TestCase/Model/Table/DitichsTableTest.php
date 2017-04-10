<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DitichsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DitichsTable Test Case
 */
class DitichsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DitichsTable
     */
    public $Ditichs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ditichs',
        'app.reports',
        'app.schools',
        'app.caphocs',
        'app.loaitruongs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ditichs') ? [] : ['className' => 'App\Model\Table\DitichsTable'];
        $this->Ditichs = TableRegistry::get('Ditichs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ditichs);

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
