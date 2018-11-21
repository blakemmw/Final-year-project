<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RoomsUsersTable|\Cake\ORM\Association\BelongsTo $RoomsUsers
 * @property \App\Model\Table\RoomsTable|\Cake\ORM\Association\BelongsToMany $Rooms
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 * @property \App\Model\Table\TicketsTable|\Cake\ORM\Association\BelongsToMany $Tickets
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null, $options = [])
 */
class EventsTable extends Table
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

        $this->setTable('events');
        $this->setDisplayField('event_id');
        $this->setPrimaryKey('event_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('RoomsUsers', [
            'foreignKey' => 'leasing_id'
        ]);
        $this->belongsToMany('Rooms', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'room_id',
            'joinTable' => 'events_rooms'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'events_tags'
        ]);
        $this->belongsToMany('Tickets', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'ticket_id',
            'joinTable' => 'events_tickets'
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
            ->integer('event_id')
            ->allowEmpty('event_id', 'create')
            ->add('event_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('event_name')
            ->maxLength('event_name', 20)
            ->requirePresence('event_name', 'create')
            ->notEmpty('event_name');

        $validator
            ->scalar('event_tags')
            ->maxLength('event_tags', 50)
            ->allowEmpty('event_tags');

        $validator
            ->allowEmpty('event_image');

        $validator
            ->date('event_date')
            ->requirePresence('event_date', 'create')
            ->notEmpty('event_date');

        $validator
            ->time('event_start_time')
            ->requirePresence('event_start_time', 'create')
            ->notEmpty('event_start_time');

        $validator
            ->time('event_end_time')
            ->requirePresence('event_end_time', 'create')
            ->notEmpty('event_end_time');

        $validator
            ->integer('event_total_tickets')
            ->requirePresence('event_total_tickets', 'create')
            ->notEmpty('event_total_tickets');

        $validator
            ->numeric('event_ticket_price')
            ->requirePresence('event_ticket_price', 'create')
            ->notEmpty('event_ticket_price');

        $validator
            ->scalar('event_description')
            ->maxLength('event_description', 500)
            ->allowEmpty('event_description');

        $validator
            ->allowEmpty('event_file');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 500)
            ->allowEmpty('photo');

        $validator
            ->scalar('photo_dir')
            ->maxLength('photo_dir', 255)
            ->allowEmpty('photo_dir');

        $validator
            ->allowEmpty('file');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->allowEmpty('path');

        $validator
            ->scalar('file_name')
            ->maxLength('file_name', 255)
            ->allowEmpty('file_name');

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
        $rules->add($rules->isUnique(['event_id']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['leasing_id'], 'RoomsUsers'));

        return $rules;
    }
}
