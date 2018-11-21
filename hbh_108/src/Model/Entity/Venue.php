<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venue Entity
 *
 * @property int $venue_id
 * @property string $venue_street
 * @property string $venue_suburb
 * @property string $venue_postcode
 * @property string|resource $venue_image
 * @property int $venue_room_count
 */
class Venue extends Entity
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
        'venue_street' => true,
        'venue_suburb' => true,
        'venue_postcode' => true,
        'venue_image' => true,
        'venue_room_count' => true
    ];
}
