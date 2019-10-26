<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementRouteAdministrations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $RequirementRouteAdministrationTypes
 * @property \Cake\ORM\Association\BelongsTo $Requirements
 *
 * @method \App\Model\Entity\RequirementRouteAdministration get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministration newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministration[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministration|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministration patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministration[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministration findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementRouteAdministrationsTable extends Table
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

        $this->table('requirement_route_administrations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RequirementRouteAdministrationTypes', [
            'foreignKey' => 'requirement_route_administration_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['requirement_route_administration_type_id'], 'RequirementRouteAdministrationTypes'));
        $rules->add($rules->existsIn(['requirement_id'], 'Requirements'));

        return $rules;
    }
}
