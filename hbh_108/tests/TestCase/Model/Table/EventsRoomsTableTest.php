<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsRoomsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsRoomsTable Test Case
 */
class EventsRoomsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsRoomsTable
     */
    public $EventsRooms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.events_rooms',
        'app.events',
        'app.rooms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('EventsRooms') ? [] : ['className' => EventsRoomsTable::class];
        $this->EventsRooms = TableRegistry::getTableLocator()->get('EventsRooms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventsRooms);

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
