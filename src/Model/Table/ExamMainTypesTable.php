<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamMainTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $ExamTypes
 *
 * @method \App\Model\Entity\ExamMainType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExamMainType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExamMainType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamMainType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamMainType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExamMainType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamMainType findOrCreate($search, callable $callback = null)
 */
class ExamMainTypesTable extends Table
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

        $this->table('exam_main_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('ExamTypes', [
            'foreignKey' => 'exam_main_type_id'
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
            ->requirePresence('label_main_type', 'create')
            ->notEmpty('label_main_type');

        return $validator;
    }
}
