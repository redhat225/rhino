<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use ArrayObject;

/**
 * PatientWorks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\PatientWork get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientWork newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientWork[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientWork|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientWork patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientWork[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientWork findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientWorksTable extends Table
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

        $this->table('patient_works');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
    }


       public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        switch($data['state-operation'])
        {
            case 'registering-patient':

            break;
        }
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
            ->allowEmpty('work_label');

        $validator
            ->allowEmpty('work_company');

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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));

        return $rules;
    }
}
