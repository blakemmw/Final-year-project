<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rooms Model
 *
 * @property \App\Model\Table\VenuesTable|\Cake\ORM\Association\BelongsTo $Venues
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsToMany $Events
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Room get($primaryKey, $options = [])
 * @method \App\Model\Entity\Room newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Room[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Room|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Room[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Room findOrCreate($search, callable $callback = null, $options = [])
 */
class RoomsTable extends Table
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

        $this->setTable('rooms');
        $this->setDisplayField('room_name');
        $this->setPrimaryKey('room_id');

        $this->belongsTo('Venues', [
            'foreignKey' => 'venue_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Events', [
            'foreignKey' => 'room_id',
            'targetForeignKey' => 'event_id',
            'joinTable' => 'events_rooms'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'room_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'rooms_users'
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
            ->integer('room_id')
            ->allowEmpty('room_id', 'create');

        $validator
            ->integer('room_capacity')
            ->requirePresence('room_capacity', 'create')
            ->notEmpty('room_capacity');

        $validator
            ->scalar('room_type')
            ->maxLength('room_type', 20)
            ->requirePresence('room_type', 'create')
            ->notEmpty('room_type');

        $validator
            ->allowEmpty('room_image');

        $validator
            ->scalar('room_name')
            ->maxLength('room_name', 20)
            ->allowEmpty('room_name');

        $validator
            ->scalar('room_requirements')
            ->maxLength('room_requirements', 500)
            ->allowEmpty('room_requirements');

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
        $rules->add($rules->existsIn(['venue_id'], 'Venues'));

        return $rules;
    }
}
