<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EventsTagsFixture
 *
 */
class EventsTagsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'tag_id' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'event_id' => ['type' => 'integer', 'length' => 255, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'event_tags_events_event_id_fk' => ['type' => 'index', 'columns' => ['event_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['tag_id', 'event_id'], 'length' => []],
            'event_tags_events_event_id_fk' => ['type' => 'foreign', 'columns' => ['event_id'], 'references' => ['events', 'event_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'event_tags_tags_tag_id_fk' => ['type' => 'foreign', 'columns' => ['tag_id'], 'references' => ['tags', 'tag_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'tag_id' => 1,
                'event_id' => 1
            ],
        ];
        parent::init();
    }
}
