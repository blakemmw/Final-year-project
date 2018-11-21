<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rpayments Model
 *
 * @property \App\Model\Table\RoomsUsersTable|\Cake\ORM\Association\BelongsTo $RoomsUsers
 *
 * @method \App\Model\Entity\Rpayment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Rpayment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Rpayment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Rpayment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rpayment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Rpayment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Rpayment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Rpayment findOrCreate($search, callable $callback = null, $options = [])
 */
class RpaymentsTable extends Table
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

        $this->setTable('rpayments');
        $this->setDisplayField('payment_id');
        $this->setPrimaryKey('payment_id');

        $this->belongsTo('RoomsUsers', [
            'foreignKey' => 'leasing_id'
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
            ->integer('payment_id')
            ->allowEmpty('payment_id', 'create')
            ->add('payment_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('user_type')
            ->maxLength('user_type', 5)
            ->requirePresence('user_type', 'create')
            ->notEmpty('user_type');

        $validator
            ->numeric('payment_amount')
            ->allowEmpty('payment_amount');

        $validator
            ->date('payment_date')
            ->requirePresence('payment_date', 'create')
            ->notEmpty('payment_date');

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
        $rules->add($rules->isUnique(['payment_id']));
        $rules->add($rules->existsIn(['leasing_id'], 'RoomsUsers'));

        return $rules;
    }
}
