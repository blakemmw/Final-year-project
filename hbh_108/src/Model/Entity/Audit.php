<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Audit Entity
 *
 * @property int $audit_id
 * @property string $event_name
 * @property int $event_id
 * @property \Cake\I18n\FrozenDate $event_date
 * @property int $event_tickets_sold
 * @property int $user_id
 * @property int $booking_id
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Booking $booking
 */
class Audit extends Entity
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
        'event_id' => true,
        'event_date' => true,
        'event_tickets_sold' => true,
        'user_id' => true,
        'booking_id' => true,
        'event' => true,
        'user' => true,
        'booking' => true
    ];
}
