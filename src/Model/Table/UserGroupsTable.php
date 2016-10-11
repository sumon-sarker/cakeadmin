<?php
namespace CakeAdmin\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserGroups Model
 *
 * @property \Cake\ORM\Association\HasMany $UserGroupPermissions
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \CakeAdmin\Model\Entity\UserGroup get($primaryKey, $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroup newEntity($data = null, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroup[] newEntities(array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroup findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserGroupsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('user_groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('UserGroupPermissions', [
            'foreignKey' => 'user_group_id',
            'className' => 'CakeAdmin.UserGroupPermissions'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_group_id',
            'className' => 'CakeAdmin.Users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name','create')
            ->notEmpty('name');

        $validator
            ->integer('allow_registration')
            ->requirePresence('allow_registration', 'create')
            ->notEmpty('allow_registration');
        $validator
            ->integer('email_verification')
            ->requirePresence('email_verification', 'create')
            ->notEmpty('email_verification');

        return $validator;
    }
}
