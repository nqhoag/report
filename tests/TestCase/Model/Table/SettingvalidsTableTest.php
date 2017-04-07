<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SettingvalidsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SettingvalidsTable Test Case
 */
class SettingvalidsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SettingvalidsTable
     */
    public $Settingvalids;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.settingvalids',
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
        $config = TableRegistry::exists('Settingvalids') ? [] : ['className' => 'App\Model\Table\SettingvalidsTable'];
        $this->Settingvalids = TableRegistry::get('Settingvalids', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Settingvalids);

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

    /**
     * Test saveSetting method
     *
     * @return void
     */
    public function testSaveSetting()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
