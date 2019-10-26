<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * PatientBooks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\PatientBook get($primaryKey, $options = [])
 * @method \App\Model\Entity\PatientBook newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PatientBook[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PatientBook|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PatientBook patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PatientBook[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PatientBook findOrCreate($search, callable $callback = null)
 */
class PatientBooksTable extends Table
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

        $this->table('patient_books');
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
            ->requirePresence('book_path', 'create')
            ->notEmpty('book_path');

        $validator
            ->integer('changed')
            ->requirePresence('changed', 'create')
            ->notEmpty('changed');

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
