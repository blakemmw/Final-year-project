<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $event_id
 * @property string $event_name
 * @property string $event_tags
 * @property string|resource $event_image
 * @property \Cake\I18n\FrozenDate $event_date
 * @property \Cake\I18n\FrozenTime $event_start_time
 * @property \Cake\I18n\FrozenTime $event_end_time
 * @property int $event_total_tickets
 * @property float $event_ticket_price
 * @property string $event_description
 * @property string|resource $event_file
 * @property string $photo
 * @property string $photo_dir
 * @property string|resource $file
 * @property string $path
 * @property int $user_id
 * @property int $leasing_id
 * @property string $file_name
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\RoomsUser $rooms_user
 * @property \App\Model\Entity\Room[] $rooms
 * @property \App\Model\Entity\Tag[] $tags
 * @property \App\Model\Entity\Ticket[] $tickets
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'event_name' => true,
        'event_tags' => true,
        'event_image' => true,
        'event_date' => true,
        'event_start_time' => true,
        'event_end_time' => true,
        'event_total_tickets' => true,
        'event_ticket_price' => true,
        'event_description' => true,
        'event_file' => true,
        'photo' => true,
        'photo_dir' => true,
        'file' => true,
        'path' => true,
        'user_id' => true,
        'leasing_id' => true,
        'file_name' => true,
        'user' => true,
        'rooms_user' => true,
        'rooms' => true,
        'tags' => true,
        'tickets' => true
    ];
}
