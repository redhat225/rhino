<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamNotes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Exams
 * @property \Cake\ORM\Association\BelongsTo $ExamEvidences
 *
 * @method \App\Model\Entity\ExamNote get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExamNote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExamNote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamNote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamNote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExamNote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamNote findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamNotesTable extends Table
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

        $this->table('exam_notes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Exams', [
            'foreignKey' => 'exam_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ExamEvidences', [
            'foreignKey' => 'exam_evidence_id',
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

        $validator
            ->requirePresence('content_note', 'create')
            ->notEmpty('content_note');

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
        $rules->add($rules->existsIn(['exam_id'], 'Exams'));
        $rules->add($rules->existsIn(['exam_evidence_id'], 'ExamEvidences'));

        return $rules;
    }
}
