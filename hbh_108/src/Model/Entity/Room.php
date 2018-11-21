<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Room Entity
 *
 * @property int $room_id
 * @property int $room_capacity
 * @property string $room_type
 * @property string|resource $room_image
 * @property string $room_name
 * @property int $venue_id
 * @property string $room_requirements
 *
 * @property \App\Model\Entity\Venue $venue
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\User[] $users
 */
class Room extends Entity
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
        'room_capacity' => true,
        'room_type' => true,
        'room_image' => true,
        'room_name' => true,
        'venue_id' => true,
        'room_requirements' => true,
        'venue' => true,
        'events' => true,
        'users' => true
    ];
}
