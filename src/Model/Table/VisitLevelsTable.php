<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitLevels Model
 *
 * @property \Cake\ORM\Association\HasMany $Visits
 *
 * @method \App\Model\Entity\VisitLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitLevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitLevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitLevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitLevel findOrCreate($search, callable $callback = null)
 */
class VisitLevelsTable extends Table
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

        $this->table('visit_levels');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Visits', [
            'foreignKey' => 'visit_level_id'
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
