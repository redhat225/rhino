<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
/**
 * ExamUnderTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ExamTypes
 * @property \Cake\ORM\Association\HasMany $Exams
 *
 * @method \App\Model\Entity\ExamUnderType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExamUnderType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExamUnderType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamUnderType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamUnderType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExamUnderType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamUnderType findOrCreate($search, callable $callback = null)
 */
class ExamUnderTypesTable extends Table
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

        $this->table('exam_under_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ExamTypes', [
            'foreignKey' => 'exam_type_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Exams', [
            'foreignKey' => 'exam_under_type_id'
        ]);
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {

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
            ->requirePresence('label_exam_under_type', 'create')
            ->notEmpty('label_exam_under_type');

        $validator
            ->requirePresence('template_exam', 'create')
            ->notEmpty('template_exam');

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
        $rules->add($rules->existsIn(['exam_type_id'], 'ExamTypes'));

        return $rules;
    }
}
