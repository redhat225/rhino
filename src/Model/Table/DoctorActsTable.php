<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DoctorActs Model
 *
 * @property \Cake\ORM\Association\HasMany $DoctorActDetails
 *
 * @method \App\Model\Entity\DoctorAct get($primaryKey, $options = [])
 * @method \App\Model\Entity\DoctorAct newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DoctorAct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DoctorAct|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DoctorAct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorAct[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DoctorAct findOrCreate($search, callable $callback = null)
 */
class DoctorActsTable extends Table
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

        $this->table('doctor_acts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('DoctorActDetails', [
            'foreignKey' => 'doctor_act_id'
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
            ->requirePresence('label_doctor_act', 'create')
            ->notEmpty('label_doctor_act');

        return $validator;
    }
}
