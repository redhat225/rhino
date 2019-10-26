<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitTypeDetails
 *
 * @method \App\Model\Entity\VisitType get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitType findOrCreate($search, callable $callback = null)
 */
class VisitTypesTable extends Table
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

        $this->table('visit_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Visits', [
            'foreignKey' => 'visit_type_id'
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
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        return $validator;
    }
}
