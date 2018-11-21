<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\RoomsTable|\Cake\ORM\Association\BelongsToMany $Rooms
 * @property |\Cake\ORM\Association\BelongsToMany $Tags
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->belongsToMany('Rooms', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'room_id',
            'joinTable' => 'rooms_users'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'tags_users'
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
            ->integer('user_id')
            ->allowEmpty('user_id', 'create')
            ->add('user_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('username')
            ->maxLength('username', 500)
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 500)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->scalar('user_first_name')
            ->maxLength('user_first_name', 50)
            ->allowEmpty('user_first_name');

        $validator
            ->scalar('user_last_name')
            ->maxLength('user_last_name', 50)
            ->allowEmpty('user_last_name');

        $validator
            ->scalar('user_street')
            ->maxLength('user_street', 50)
            ->allowEmpty('user_street');

        $validator
            ->scalar('user_suburb')
            ->maxLength('user_suburb', 20)
            ->allowEmpty('user_suburb');

        $validator
            ->scalar('user_postcode')
            ->maxLength('user_postcode', 10)
            ->allowEmpty('user_postcode');

        $validator
            ->integer('user_phone')
            ->allowEmpty('user_phone');

        $validator
            ->scalar('user_tags')
            ->maxLength('user_tags', 200)
            ->allowEmpty('user_tags');

        $validator
            ->allowEmpty('user_image');

        $validator
            ->scalar('user_type')
            ->maxLength('user_type', 5)
            ->allowEmpty('user_type');

        $validator
            ->scalar('user_description')
            ->maxLength('user_description', 500)
            ->allowEmpty('user_description');

        $validator
            ->scalar('user_abn')
            ->maxLength('user_abn', 20)
            ->allowEmpty('user_abn');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('user_business_name')
            ->maxLength('user_business_name', 50)
            ->allowEmpty('user_business_name');

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
        $rules->add($rules->isUnique(['user_id']));

        return $rules;
    }
}
