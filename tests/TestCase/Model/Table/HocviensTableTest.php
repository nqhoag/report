<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HocviensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HocviensTable Test Case
 */
class HocviensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HocviensTable
     */
    public $Hocviens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hocviens',
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
        $config = TableRegistry::exists('Hocviens') ? [] : ['className' => 'App\Model\Table\HocviensTable'];
        $this->Hocviens = TableRegistry::get('Hocviens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Hocviens);

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
