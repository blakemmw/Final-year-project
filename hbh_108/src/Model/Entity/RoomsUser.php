<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RoomsUser Entity
 *
 * @property int $leasing_id
 * @property int $room_id
 * @property int $user_id
 * @property bool $tv
 * @property bool $theatre
 * @property bool $class_room
 * @property bool $board_room
 * @property bool $yoga
 * @property bool $standing
 * @property bool $projector
 * @property bool $white_board
 * @property bool $video_camera
 * @property bool $micro_phone
 * @property bool $music_player
 *
 * @property \App\Model\Entity\Room $room
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Session[] $sessions
 */
class RoomsUser extends Entity
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
        'room_id' => true,
        'user_id' => true,
        'tv' => true,
        'theatre' => true,
        'class_room' => true,
        'board_room' => true,
        'yoga' => true,
        'standing' => true,
        'projector' => true,
        'white_board' => true,
        'video_camera' => true,
        'micro_phone' => true,
        'music_player' => true,
        'room' => true,
        'user' => true,
        'sessions' => true
    ];
}
