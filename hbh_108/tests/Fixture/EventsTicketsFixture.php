<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsTicketsFixture
 *
 */
class EventsTicketsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'event_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ticket_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'events_tickets_events_event_id_fk' => ['type' => 'index', 'columns' => ['event_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ticket_id'], 'length' => []],
            'events_tickets_events_event_id_fk' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['events', 'event_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'events_tickets_tickets_ticket_id_fk' => ['type' => 'foreign', 'columns' => ['ticket_id'], 'references' => ['tickets', 'ticket_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'ticket_id' => 1
            ],
        ];
        parent::init();
    }
}
