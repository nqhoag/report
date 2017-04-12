<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CanbonhanviensTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CanbonhanviensTable Test Case
 */
class CanbonhanviensTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CanbonhanviensTable
     */
    public $Canbonhanviens;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.canbonhanviens',
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
        $config = TableRegistry::exists('Canbonhanviens') ? [] : ['className' => 'App\Model\Table\CanbonhanviensTable'];
        $this->Canbonhanviens = TableRegistry::get('Canbonhanviens', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Canbonhanviens);

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
