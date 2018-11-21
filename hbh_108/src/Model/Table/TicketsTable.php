<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tickets Model
 *
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsToMany $Events
 *
 * @method \App\Model\Entity\Ticket get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ticket newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ticket[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ticket|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ticket patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ticket findOrCreate($search, callable $callback = null, $options = [])
 */
class TicketsTable extends Table
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

        $this->setTable('tickets');
        $this->setDisplayField('ticket_id');
        $this->setPrimaryKey('ticket_id');

        $this->belongsToMany('Events', [
            'foreignKey' => 'ticket_id',
            'targetForeignKey' => 'event_id',
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
            ->integer('ticket_id')
            ->allowEmpty('ticket_id', 'create');

        $validator
            ->scalar('ticket_type')
            ->maxLength('ticket_type', 50)
            ->requirePresence('ticket_type', 'create')
            ->notEmpty('ticket_type');

        $validator
            ->numeric('ticket_price')
            ->requirePresence('ticket_price', 'create')
            ->notEmpty('ticket_price');

        $validator
            ->scalar('ticket_description')
            ->maxLength('ticket_description', 500)
            ->allowEmpty('ticket_description');

        return $validator;
    }
}
