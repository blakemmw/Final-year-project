<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoomsUsers Model
 *
 * @property \App\Model\Table\RoomsTable|\Cake\ORM\Association\BelongsTo $Rooms
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\RoomsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\RoomsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RoomsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RoomsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoomsUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RoomsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RoomsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RoomsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class RoomsUsersTable extends Table
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

        $this->setTable('rooms_users');
        $this->setDisplayField('leasing_id');
        $this->setPrimaryKey('leasing_id');

        $this->belongsTo('Rooms', [
            'foreignKey' => 'room_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('Events', [
            'foreignKey' => 'leasing_id'
        ]);

        $this->hasMany('Sessions', [
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
            ->integer('leasing_id')
            ->allowEmpty('leasing_id', 'create');

        $validator
            ->boolean('tv')
            ->allowEmpty('tv');

        $validator
            ->boolean('theatre')
            ->allowEmpty('theatre');

        $validator
            ->boolean('class_room')
            ->allowEmpty('class_room');

        $validator
            ->boolean('board_room')
            ->allowEmpty('board_room');

        $validator
            ->boolean('yoga')
            ->allowEmpty('yoga');

        $validator
            ->boolean('standing')
            ->allowEmpty('standing');

        $validator
            ->boolean('projector')
            ->allowEmpty('projector');

        $validator
            ->boolean('white_board')
            ->allowEmpty('white_board');

        $validator
            ->boolean('video_camera')
            ->allowEmpty('video_camera');

        $validator
            ->boolean('micro_phone')
            ->allowEmpty('micro_phone');

        $validator
            ->boolean('music_player')
            ->allowEmpty('music_player');

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
        $rules->add($rules->existsIn(['room_id'], 'Rooms'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
