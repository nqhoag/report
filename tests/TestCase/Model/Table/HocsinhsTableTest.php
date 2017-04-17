<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HocsinhsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HocsinhsTable Test Case
 */
class HocsinhsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HocsinhsTable
     */
    public $Hocsinhs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hocsinhs',
        'app.reports',
        'app.schools',
        'app.caphocs',
        'app.loaitruongs',
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
        $config = TableRegistry::exists('Hocsinhs') ? [] : ['className' => 'App\Model\Table\HocsinhsTable'];
        $this->Hocsinhs = TableRegistry::get('Hocsinhs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hocsinhs);

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
