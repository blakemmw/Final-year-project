<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $session_id
 * @property int $leasing_id
 * @property string $session_name
 * @property \Cake\I18n\FrozenDate $session_date
 * @property \Cake\I18n\FrozenTime $start_time
 * @property string $session_description
 * @property \Cake\I18n\FrozenTime $end_time
 *
 * @property \App\Model\Entity\RoomsUser $rooms_user
 */
class Session extends Entity
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
        'leasing_id' => true,
        'session_name' => true,
        'session_date' => true,
        'start_time' => true,
        'session_description' => true,
        'end_time' => true,
        'rooms_user' => true
    ];
}
