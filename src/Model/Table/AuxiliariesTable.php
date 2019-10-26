<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Auxiliaries Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\HasMany $AuxiliaryActDetails
 * @property \Cake\ORM\Association\HasMany $AuxiliaryRoleDetails
 * @property \Cake\ORM\Association\HasMany $VisitConstants
 * @property \Cake\ORM\Association\HasMany $VisitInterventionAuxiliaries
 * @property \Cake\ORM\Association\HasMany $VisitTasks
 *
 * @method \App\Model\Entity\Auxiliary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Auxiliary newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Auxiliary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Auxiliary|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Auxiliary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Auxiliary[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Auxiliary findOrCreate($search, callable $callback = null)
 */
class AuxiliariesTable extends Table
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

        $this->table('auxiliaries');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
                $this->belongsTo('Institutions', [
            'foreignKey' => 'Institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AuxiliaryActDetails', [
            'foreignKey' => 'auxiliary_id'
        ]);
        $this->hasMany('AuxiliaryRoleDetails', [
            'foreignKey' => 'auxiliary_id'
        ]);
        $this->hasMany('VisitConstants', [
            'foreignKey' => 'auxiliary_id'
        ]);
        $this->hasMany('VisitInterventionAuxiliaries', [
            'foreignKey' => 'auxiliary_id'
        ]);
        $this->hasMany('VisitTasks', [
            'foreignKey' => 'auxiliary_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('avatar_auxiliary');

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
        $rules->add($rules->existsIn(['people_id'], 'People'));
        $rules->add($rules->existsIn(['Institution_id'], 'Institutions'));

        return $rules;
    }
}
