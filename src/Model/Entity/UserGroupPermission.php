<?php
namespace CakeAdmin\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserGroupPermission Entity
 *
 * @property int $id
 * @property int $user_group_id
 * @property string $controller
 * @property string $action
 * @property bool $allowed
 *
 * @property \CakeAdmin\Model\Entity\UserGroup $user_group
 */
class UserGroupPermission extends Entity
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
        '*' => true,
        'id' => false
    ];
}
