<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Epayment Entity
 *
 * @property int $payment_id
 * @property \Cake\I18n\FrozenDate $edate
 * @property string $user_type
 * @property float $amount
 * @property int $booking_id
 *
 * @property \App\Model\Entity\Booking $booking
 */
class Epayment extends Entity
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
        'edate' => true,
        'user_type' => true,
        'amount' => true,
        'booking_id' => true,
        'booking' => true
    ];
}
