<?php
namespace CakeAdmin\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserGroupPermissions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 *
 * @method \CakeAdmin\Model\Entity\UserGroupPermission get($primaryKey, $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroupPermission newEntity($data = null, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroupPermission[] newEntities(array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroupPermission|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroupPermission patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroupPermission[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\UserGroupPermission findOrCreate($search, callable $callback = null)
 */
class UserGroupPermissionsTable extends Table
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

        $this->table('user_group_permissions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER',
            'className' => 'CakeAdmin.UserGroups'
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
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->requirePresence('action', 'create')
            ->notEmpty('action');

        $validator
            ->boolean('allowed')
            ->requirePresence('allowed', 'create')
            ->notEmpty('allowed');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }
}
