<?php
namespace CakeAdmin\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $UserGroups
 * @property \Cake\ORM\Association\HasMany $LoginTokens
 * @property \Cake\ORM\Association\HasMany $UserLogs
 *
 * @method \CakeAdmin\Model\Entity\User get($primaryKey, $options = [])
 * @method \CakeAdmin\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \CakeAdmin\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAdmin\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER',
            'className' => 'CakeAdmin.UserGroups'
        ]);
        $this->hasMany('LoginTokens', [
            'foreignKey' => 'user_id',
            'className' => 'CakeAdmin.LoginTokens'
        ]);
        $this->hasMany('UserLogs', [
            'foreignKey' => 'user_id',
            'className' => 'CakeAdmin.UserLogs'
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
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->allowEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->allowEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('designation');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('verification_token');

        $validator
            ->integer('email_verified')
            ->allowEmpty('email_verified');

        $validator
            ->integer('registration_step')
            ->allowEmpty('registration_step');

        $validator
            ->integer('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }

    public function getHashPassword($string='default'){
        return (new DefaultPasswordHasher())->hash($string);
    }
}