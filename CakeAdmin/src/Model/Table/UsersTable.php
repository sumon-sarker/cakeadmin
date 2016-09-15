<?php
namespace CakeAdmin\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;

class UsersTable extends Table{

    public function initialize(array $config){
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
    }

    public function validationDefault(Validator $validator){
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name','create')
            ->notBlank('first_name','This field can not be blank!')
            ->notEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','This username already exists']);

        $validator
            ->email('email')
            ->notEmpty('email')
            ->requirePresence('email','create')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message'=>'This email already exists']);

        $validator
            ->requirePresence('password','create')
            ->lengthBetween('password',[6,16],'Password must be between 6 and 16')
            ->alphaNumeric('password','Password must be alphaNumeric')
            ->notEmpty('password');

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
        $validator
            ->integer('user_group_id')
            ->notEmpty('user_group_id')
            ->requirePresence('user_group_id','create');
        /*Dummy Fields*/
        $validator
            #->requirePresence('new_password','update')
            ->lengthBetween('new_password',[6,16],'Password must be between 6 and 16','create')
            ->sameAs('new_password', 'confirm_new_password','Password does not match!')
            ->notEmpty('new_password');
        $validator
            #->requirePresence('confirm_new_password','update')
            ->lengthBetween('confirm_new_password',[6,16],'Password must be between 6 and 16','create')
            ->sameAs('confirm_new_password', 'new_password','Password does not match!')
            ->notEmpty('confirm_new_password');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
    **/
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));

        return $rules;
    }

    public function beforeSave(Event $event){
        if (isset($event->data['entity']->password)) {
            $DPH = new DefaultPasswordHasher();
            if ($DPH->needsRehash($event->data['entity']->password)) {
                $event->data['entity']->password = $DPH->hash($event->data['entity']->password);
            }
        }
    }
}
