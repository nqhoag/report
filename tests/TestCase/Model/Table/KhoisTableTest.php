<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KhoisTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KhoisTable Test Case
 */
class KhoisTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KhoisTable
     */
    public $Khois;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.khois',
        'app.caphocs',
        'app.schools',
        'app.loaitruongs',
        'app.reports'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Khois') ? [] : ['className' => 'App\Model\Table\KhoisTable'];
        $this->Khois = TableRegistry::get('Khois', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Khois);

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
