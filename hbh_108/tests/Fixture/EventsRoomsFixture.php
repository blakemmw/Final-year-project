<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsRoomsFixture
 *
 */
class EventsRoomsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'event_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'room_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'events_rooms_rooms_room_id_fk' => ['type' => 'index', 'columns' => ['room_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['event_id', 'room_id'], 'length' => []],
            'events_rooms_events_event_id_fk' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['events', 'event_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'events_rooms_rooms_room_id_fk' => ['type' => 'foreign', 'columns' => ['room_id'], 'references' => ['rooms', 'room_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'event_id' => 1,
                'room_id' => 1
            ],
        ];
        parent::init();
    }
}
