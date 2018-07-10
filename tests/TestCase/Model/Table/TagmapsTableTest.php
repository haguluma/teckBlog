<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagmapsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagmapsTable Test Case
 */
class TagmapsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TagmapsTable
     */
    public $Tagmaps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tagmaps',
        'app.bookmarks',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tagmaps') ? [] : ['className' => TagmapsTable::class];
        $this->Tagmaps = TableRegistry::get('Tagmaps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tagmaps);

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
