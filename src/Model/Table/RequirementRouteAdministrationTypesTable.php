<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequirementRouteAdministrationTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $RequirementRouteAdministrations
 *
 * @method \App\Model\Entity\RequirementRouteAdministrationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministrationType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministrationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministrationType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministrationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministrationType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequirementRouteAdministrationType findOrCreate($search, callable $callback = null)
 */
class RequirementRouteAdministrationTypesTable extends Table
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

        $this->table('requirement_route_administration_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('RequirementRouteAdministrations', [
            'foreignKey' => 'requirement_route_administration_type_id'
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
            ->requirePresence('type_label', 'create')
            ->notEmpty('type_label');

        return $validator;
    }
}
