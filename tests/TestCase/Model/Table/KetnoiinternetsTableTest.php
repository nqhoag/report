<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KetnoiinternetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KetnoiinternetsTable Test Case
 */
class KetnoiinternetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KetnoiinternetsTable
     */
    public $Ketnoiinternets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ketnoiinternets',
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
        $config = TableRegistry::exists('Ketnoiinternets') ? [] : ['className' => 'App\Model\Table\KetnoiinternetsTable'];
        $this->Ketnoiinternets = TableRegistry::get('Ketnoiinternets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ketnoiinternets);

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
