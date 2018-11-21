<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Venues Model
 *
 * @method \App\Model\Entity\Venue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Venue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Venue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Venue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Venue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venue findOrCreate($search, callable $callback = null, $options = [])
 */
class VenuesTable extends Table
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

        $this->setTable('venues');
        $this->setDisplayField('venue_id');
        $this->setPrimaryKey('venue_id');
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
            ->integer('venue_id')
            ->allowEmpty('venue_id', 'create')
            ->add('venue_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('venue_street')
            ->maxLength('venue_street', 50)
            ->requirePresence('venue_street', 'create')
            ->notEmpty('venue_street');

        $validator
            ->scalar('venue_suburb')
            ->maxLength('venue_suburb', 20)
            ->requirePresence('venue_suburb', 'create')
            ->notEmpty('venue_suburb');

        $validator
            ->scalar('venue_postcode')
            ->maxLength('venue_postcode', 20)
            ->requirePresence('venue_postcode', 'create')
            ->notEmpty('venue_postcode');

        $validator
            ->allowEmpty('venue_image');

        $validator
            ->integer('venue_room_count')
            ->allowEmpty('venue_room_count');

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
        $rules->add($rules->isUnique(['venue_id']));

        return $rules;
    }
}
