<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoaitruongsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoaitruongsTable Test Case
 */
class LoaitruongsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoaitruongsTable
     */
    public $Loaitruongs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loaitruongs',
        'app.schools',
        'app.caphocs',
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
        $config = TableRegistry::exists('Loaitruongs') ? [] : ['className' => 'App\Model\Table\LoaitruongsTable'];
        $this->Loaitruongs = TableRegistry::get('Loaitruongs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loaitruongs);

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
