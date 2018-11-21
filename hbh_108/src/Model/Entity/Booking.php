<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $booking_id
 * @property int $user_id
 * @property int $event_id
 * @property \Cake\I18n\FrozenDate $booking_date
 * @property float $booking_cost
 * @property int $payment_id
 * @property int $number_of_tickets
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Payment $payment
 */
class Booking extends Entity
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
        'user_id' => true,
        'event_id' => true,
        'booking_date' => true,
        'booking_cost' => true,
        'payment_id' => true,
        'number_of_tickets' => true,
        'user' => true,
        'event' => true,
        'payment' => true
    ];
}
