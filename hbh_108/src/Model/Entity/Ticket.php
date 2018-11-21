<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ticket Entity
 *
 * @property int $ticket_id
 * @property string $ticket_type
 * @property float $ticket_price
 * @property string $ticket_description
 *
 * @property \App\Model\Entity\Event[] $events
 */
class Ticket extends Entity
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
        'ticket_type' => true,
        'ticket_price' => true,
        'ticket_description' => true,
        'events' => true
    ];
}
