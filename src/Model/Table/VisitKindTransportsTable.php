<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitKindTransports Model
 *
 * @property \Cake\ORM\Association\HasMany $Visits
 *
 * @method \App\Model\Entity\VisitKindTransport get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitKindTransport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitKindTransport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitKindTransport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitKindTransport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitKindTransport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitKindTransport findOrCreate($search, callable $callback = null)
 */
class VisitKindTransportsTable extends Table
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

        $this->table('visit_kind_transports');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Visits', [
            'foreignKey' => 'visit_kind_transport_id'
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
