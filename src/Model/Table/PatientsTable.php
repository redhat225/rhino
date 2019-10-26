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
 * Patients Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\HasMany $DiaryTokens
 * @property \Cake\ORM\Association\HasMany $PatientActDetails
 * @property \Cake\ORM\Association\HasMany $PatientAntecedents
 * @property \Cake\ORM\Association\HasMany $PatientBooks
 * @property \Cake\ORM\Association\HasMany $PatientCompanyDetails
 * @property \Cake\ORM\Association\HasMany $VisitMeetings
 * @property \Cake\ORM\Association\HasMany $Visits
 *
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PatientsTable extends Table
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

        $this->table('patients');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('DiaryTokens', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('PatientActDetails', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('PatientAntecedents', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasOne('PatientBooks', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasOne('PatientWorks', [
            'foreignKey' => 'patient_id'
        ]);


        $this->hasMany('PatientSchedules', [
            'foreignKey' => 'patient_id'
        ]);

        $this->hasMany('VisitMeetings', [
            'foreignKey' => 'patient_id'
        ]);
        $this->hasMany('Visits', [
            'foreignKey' => 'patient_id'
        ]);

        $this->hasMany('PatientInsurances', [
            'foreignKey' => 'patient_id'
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username','length',[
                'rule'=>['lengthBetween',8,25],
                'message' => 'la taille du login doit être comprise entre 8 et 25 caractères'
                ]);


        $validator
            ->allowEmpty('new_password')
            ->add('new_password','length',[
                'rule'=>['lengthBetween',8,25],
                'message' => 'la taille du login doit être comprise entre 8 et 25 caractères'
                ])
            ->add('new_password','comparison',[
                'rule'=>['compareWith','conf_new_password'],
                'message' => 'les mots de passes ne sont pas identiques'
                ]);

       $validator
            ->allowEmpty('conf_new_password')
            ->add('conf_new_password','length',[
                'rule'=>['lengthBetween',8,25],
                'message' => 'la taille du login doit être comprise entre 8 et 25 caractères'
                ])
            ->add('conf_new_password','comparison',[
                'rule'=>['compareWith','new_password'],
                'message' => 'les mots de passes ne sont pas identiques'
                ]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');


        $validator
            ->allowEmpty('avatar_patient');

        $validator
            ->allowEmpty('avatar_file')
            ->add('avatar_file','uploadAvatar',[
                'rule'=> ['uploadedFile',['types'=>['image/png','image/jpg','image/jpeg'],'maxSize'=>3000000,'optional'=>true]],
                'message'=>'Veuillez spécifier un fichier compatible (png,jpeg,jpg) avec une taille maximum de 3MB'
              ]);
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['people_id'], 'People'));

        return $rules;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        switch ($data['state-operation']) 
        {
            case 'registering-patient':
                    $standard_password = 00000000;
                    $hasher = new DefaultPasswordHasher();
                    $data['password'] = $hasher->hash($standard_password);
                    ///generating code patient 
                    $Patients = TableRegistry::get('Patients');
                    $patients_count = $Patients->find()
                                               ->where(['id<>0'])
                                               ->count();

                    $nowDate = new \DateTime('NOW');
                    $data['code'] = 'P-000'.($patients_count+1).'-'.$nowDate->format('mY');
            break;
        }
    }

    public function beforeSave($event,$entity, $options)
    {
        if($entity->isNew())
        {

        }
        else
        {
            // $hasher = new DefaultPasswordHasher();
            // if($hasher->check($entity->old_password,$entity->password))
            //     {
            //         //update the password if setting
            //         if($entity->conf_new_password!=="")
            //         {
            //             $entity->conf_new_password = $hasher->hash($entity->conf_new_password);
            //             $entity->password = $entity->conf_new_password;
            //         }
                    
            //         // update the avatar if setted
            //         if(!(empty($entity->avatar_file['tmp_name'])))
            //         {
            //             $extension= strtolower(pathinfo($entity->avatar_file['name'], PATHINFO_EXTENSION));
            //             //flush avatar_patient
            //             $entity->avatar_patient=uniqid().".".$extension;

            //             if($entity->getOriginal('avatar_patient')!=="")
            //             {
            //               $opendir=opendir(WWW_ROOT."img/patient/patient_avatar/");
            //               if(file_exists(WWW_ROOT."img/patient/patient_avatar/".$entity->getOriginal('avatar_patient')))
            //                  unlink(WWW_ROOT."img/patient/patient_avatar/".$entity->getOriginal('avatar_patient'));
            //               closedir($opendir);                  
            //             }

            //             if(!(move_uploaded_file($entity->avatar_file['tmp_name'], WWW_ROOT.'img/patient/patient_avatar/'.$entity->avatar_patient)))
            //             return false;
            //         }

                   
            //     }
            // else
            //     return false;
        }

    }

        public function afterSave($event,$entity, $options)
    {

    }


    /*Finders and Customs Methods*/
    public function findAuthPatient(Query $query, array $options)
    {
        $query->contain('People')
              ->select(['username','id','people_id','code','password','People.firstname','People.lastname','email','avatar_patient']);
        return $query;
    }
}
