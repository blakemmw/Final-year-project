<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rpayment Entity
 *
 * @property int $payment_id
 * @property string $user_type
 * @property float $payment_amount
 * @property \Cake\I18n\FrozenDate $payment_date
 * @property int $leasing_id
 *
 * @property \App\Model\Entity\RoomsUser $rooms_user
 */
class Rpayment extends Entity
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
        'user_type' => true,
        'payment_amount' => true,
        'payment_date' => true,
        'leasing_id' => true,
        'rooms_user' => true
    ];
}
