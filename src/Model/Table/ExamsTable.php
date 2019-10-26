<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
/**
 * Exams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitMeetings
 * @property \Cake\ORM\Association\BelongsTo $ExamUnderTypes
 * @property \Cake\ORM\Association\HasMany $ExamEvidences
 * @property \Cake\ORM\Association\HasMany $ExamNotes
 *
 * @method \App\Model\Entity\Exam get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exam findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExamsTable extends Table
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

        $this->table('exams');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->BelongsTo('VisitInterventionDoctors', [
            'foreignKey' => 'visit_intervention_doctor_id'
        ]);

        $this->BelongsTo('ExamUnderTypes', [
            'foreignKey' => 'exam_under_type_id'
        ]);

        $this->hasMany('ExamEvidences', [
            'foreignKey' => 'exam_id'
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
            ->allowEmpty('obs_exam');

        $validator
            ->allowEmpty('result_exam');

        $validator
            ->integer('codexam')
            ->requirePresence('codexam', 'create')
            ->notEmpty('codexam');

        return $validator;
    }


 public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
 {
    if(isset($data['save']))
    {
        //getting the patient_id
        $VisitMeetings = TableRegistry::get('VisitMeetings');
        $visit_meeting = $VisitMeetings->get($data['visit_meeting_id']);

                    $issue = false;
                    while (!($issue)) 
                    {
                        $codexam = mt_rand(10000,99999);
                        $Exams = TableRegistry::get('Exams');
                        $is_exists=$Exams->find()->contain(['VisitMeetings'])
                                    ->where(['Exams.codexam'=>$codexam,'VisitMeetings.patient_id'=>$visit_meeting->patient_id]);

                        if($is_exists->isEmpty())
                            $issue=true;
                        else
                            $issue=false;      
                    }

                    $data['codexam'] = $codexam;
                    $data['patient_id'] = $visit_meeting->patient_id;
    }
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
        $rules->add($rules->existsIn(['visit_intervention_doctor_id '], 'VisitInterventionDoctors'));
        $rules->add($rules->existsIn(['exam_under_type_id'], 'ExamUnderTypes'));

        return $rules;
    }



    public function afterSave($event, $entity, $options)
    {
        if($entity->save)
        {
            //update patient book
            $PatientBooks = TableRegistry::get('PatientBooks');
            $book = $PatientBooks->get($entity->patient_id);
            $book->changed = 1;
            if(!$PatientBooks->save($book))
                return false;
        }
    }
}
