<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use ArrayObject;
/**
 * DiaryTokens Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\BelongsTo $Doctors
 * @property \Cake\ORM\Association\HasMany $Diaries
 *
 * @method \App\Model\Entity\DiaryToken get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiaryToken newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DiaryToken[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiaryToken|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiaryToken patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryToken[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryToken findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DiaryTokensTable extends Table
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

        $this->table('diary_tokens');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Doctors', [
            'foreignKey' => 'doctor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Diaries', [
            'foreignKey' => 'diary_token_id'
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
            ->requirePresence('diary_token', 'create')
            ->notEmpty('diary_token');

        $validator
            ->integer('delay')
            ->requirePresence('delay', 'create')
            ->notEmpty('delay');

        $validator
            ->integer('validity')
            ->requirePresence('validity', 'create')
            ->notEmpty('validity')
            ->add('validity','comparison',[
                  'rule' => function($value,$context){
                    if($value===0)
                        return false;
                    else
                    {
                        if($value>10)
                            return false;
                        else
                            return true;
                    }
                  },
                  'message' => 'validity won t be upper than 10 days'
                ]);

        $validator
            ->requirePresence('tracking_code', 'create')
            ->notEmpty('tracking_code');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        //trimwhitespace
        foreach($data as $key=>$value)
        {
            if(is_string($value))
            {
                $data[$key] = trim($value);
            }
        }
        //flush the diaries table
        $data['diaries']= Array();
        $diary = ['diary_type_id'=>1];
        array_push($data['diaries'],$diary);


        //Flush Additional Data
        $data['doctor_id'] = $data['doctor_id_setting_privilege'];
        $data['delay'] = $data['validity'];
        //composing tracking code
        $DiaryTokens = TableRegistry::get("DiaryTokens");
        $DiaryTokens_count = $DiaryTokens->find()
                            ->where(['DiaryTokens.doctor_id'=>$data['doctor_id']])->count();
        $tracking_code = "T-".($DiaryTokens_count+1);
        $data['tracking_code'] = $tracking_code;
        //generate a hashing token
        $hasher = new DefaultPasswordHasher();
        $data['diary_token'] = $hasher->hash(uniqid(true));
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
        $rules->add($rules->existsIn(['doctor_id'], 'Doctors'));
         $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }

    public function findActiveToken (Query $query, array $options)
    {
       return $query->where(['DiaryTokens.doctor_id'=>$options['doctor_id'],'DiaryTokens.patient_id'=>$options['patient_id'],'DiaryTokens.abort'=>0])
                                              ->map(function($row){
                                                $now_date = new \DateTime('NOW');
                                                $created_date = new \DateTime($row->created.' + '.$row->delay.'days');
                                                $diff = $created_date->diff($now_date);
                                                $row->result = $diff->format('%R');
                                                return $row;
                                              });
    }

        public function findActiveDoctorToken (Query $query, array $options)
    {
        return $query->where(['DiaryTokens.doctor_id'=>$options['doctor_id'],'DiaryTokens.abort'=>0])->contain(['Patients.People.PeopleContacts'])
                                              ->map(function($row){
                                                $now_date = new \DateTime('NOW');
                                                $created_date = new \DateTime($row->created.' + '.$row->delay.'days');
                                                $diff = $created_date->diff($now_date);
                                                $row->result = $diff->format('%R');
                                                return $row;
                                              });
    }
}
