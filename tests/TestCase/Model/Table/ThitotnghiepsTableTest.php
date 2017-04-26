<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThitotnghiepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThitotnghiepsTable Test Case
 */
class ThitotnghiepsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThitotnghiepsTable
     */
    public $Thitotnghieps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.thitotnghieps',
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
        $config = TableRegistry::exists('Thitotnghieps') ? [] : ['className' => 'App\Model\Table\ThitotnghiepsTable'];
        $this->Thitotnghieps = TableRegistry::get('Thitotnghieps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Thitotnghieps);

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
