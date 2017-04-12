<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoithisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoithisTable Test Case
 */
class HoithisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HoithisTable
     */
    public $Hoithis;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hoithis',
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
        $config = TableRegistry::exists('Hoithis') ? [] : ['className' => 'App\Model\Table\HoithisTable'];
        $this->Hoithis = TableRegistry::get('Hoithis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hoithis);

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
