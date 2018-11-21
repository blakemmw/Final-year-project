<?php
namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_street
 * @property string $user_suburb
 * @property string $user_postcode
 * @property int $user_phone
 * @property string $user_tags
 * @property string|resource $user_image
 * @property string $user_type
 * @property string $user_description
 * @property string $user_abn
 * @property string $email
 * @property string $user_business_name
 *
 * @property \App\Model\Entity\Room[] $rooms
 */
class User extends Entity
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

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
    protected $_accessible = [
        'username' => true,
        'password' => true,
        'user_first_name' => true,
        'user_last_name' => true,
        'user_street' => true,
        'user_suburb' => true,
        'user_postcode' => true,
        'user_phone' => true,
        'user_tags' => true,
        'user_image' => true,
        'user_type' => true,
        'user_description' => true,
        'user_abn' => true,
        'email' => true,
        'user_business_name' => true,
        'rooms' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
