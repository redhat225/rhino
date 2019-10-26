<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExamEvidences Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Exams
 * @property \Cake\ORM\Association\HasMany $ExamNotes
 *
 * @method \App\Model\Entity\ExamEvidence get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExamEvidence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExamEvidence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExamEvidence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExamEvidence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExamEvidence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExamEvidence findOrCreate($search, callable $callback = null)
 */
class ExamEvidencesTable extends Table
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

        $this->table('exam_evidences');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Exams', [
            'foreignKey' => 'exam_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ExamNotes', [
            'foreignKey' => 'exam_evidence_id'
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
            ->requirePresence('path_evidence', 'create')
            ->notEmpty('path_evidence');

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

        return $rules;
    }
}
