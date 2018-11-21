<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TagsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TagsUsersTable Test Case
 */
class TagsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TagsUsersTable
     */
    public $TagsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tags_users',
        'app.tags',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TagsUsers') ? [] : ['className' => TagsUsersTable::class];
        $this->TagsUsers = TableRegistry::getTableLocator()->get('TagsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TagsUsers);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
