<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BookingsFixture
 *
 */
class BookingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'booking_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'event_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'booking_date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'booking_cost' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => ''],
        'payment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'number_of_tickets' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'books_events_event_id_fk' => ['type' => 'index', 'columns' => ['event_id'], 'length' => []],
            'books_payments_payment_id_fk' => ['type' => 'index', 'columns' => ['payment_id'], 'length' => []],
            'books_users_user_id_fk' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['booking_id'], 'length' => []],
            'book_booking_id_uindex' => ['type' => 'unique', 'columns' => ['booking_id'], 'length' => []],
            'books_events_event_id_fk' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['events', 'event_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'books_users_user_id_fk' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'user_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'booking_id' => 1,
                'user_id' => 1,
                'event_id' => 1,
                'booking_date' => '2018-10-09',
                'booking_cost' => 1,
                'payment_id' => 1,
                'number_of_tickets' => 1
            ],
        ];
        parent::init();
    }
}
