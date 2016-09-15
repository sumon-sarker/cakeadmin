<?php
namespace CakeAdmin\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Settings Model
 *
 * @method \CakeAdmin\Model\Entity\Setting get($primaryKey, $options = [])
 * @method \CakeAdmin\Model\Entity\Setting newEntity($data = null, array $options = [])
 * @method \CakeAdmin\Model\Entity\Setting[] newEntities(array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\Setting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakeAdmin\Model\Entity\Setting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\Setting[] patchEntities($entities, array $data, array $options = [])
 * @method \CakeAdmin\Model\Entity\Setting findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SettingsTable extends Table
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

        $this->table('settings');
        $this->displayField('settings_title');
        $this->primaryKey('settings_title');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('site_title', 'create')
            ->notEmpty('site_title');

        $validator
            ->requirePresence('site_email', 'create')
            ->notEmpty('site_email');

        $validator
            ->requirePresence('email_verification_template', 'create')
            ->notEmpty('email_verification_template');

        $validator
            ->requirePresence('footer_text', 'create')
            ->notEmpty('footer_text');

        return $validator;
    }
}
