<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaphocsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaphocsTable Test Case
 */
class CaphocsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CaphocsTable
     */
    public $Caphocs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.caphocs',
        'app.schools',
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
        $config = TableRegistry::exists('Caphocs') ? [] : ['className' => 'App\Model\Table\CaphocsTable'];
        $this->Caphocs = TableRegistry::get('Caphocs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Caphocs);

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
}
