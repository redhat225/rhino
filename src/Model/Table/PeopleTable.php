<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
/**
 * People Model
 *
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeopleTable extends Table
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

        $this->table('people');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Situations', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('Patients', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);        

        $this->hasOne('Doctors', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);        
        
        $this->hasOne('Auxiliaries', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);        
        
        $this->hasOne('ManagerOperators', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('PharmacyOperators', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('ExaminerOperators', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('PeopleDescendants', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('PeopleAttributes', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

                $this->hasOne('PeopleSituations', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('PeopleAdresses', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('PeopleContacts', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('PeopleCredentials', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
    }


    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        switch($data['state-operation'])
        {
            case 'registering-patient':
            //trim whitespaces
            foreach ($data as $key => $value) {

                if(is_string($data[$key]))
                    $data[$key]= trim($value);
            }

            $data['lastname'] = strtoupper($data['lastname']);
            $data['firstname'] = ucwords($data['firstname']);
            //generate book_path
            $book_path = md5(uniqid(true)).'.pdf';
            switch($data['civilite-signin'])
            {
                case 'Mr':
                    $data['sexe'] = 'M';
                break;

                default:
                    $data['sexe'] = 'F';
                break;
            }

            $data['path_pic'] = md5(uniqid(true));

                    $data['patient'] = [
                           'state-operation' => 'registering-patient',
                            'username' => $data['username'],
                            'email' => $data['email'],
                            'patient_work' => [
                                'state-operation' => 'registering-patient',
                                'work_label' => ucwords($data['emploi']),
                                'work_company' => strtoupper($data['emploi-provider'])
                            ],
                            'patient_book' => [
                                'state-operation' => 'registering-patient',
                                'book_path' => $book_path,
                                'changed' => 1
                            ]
                    ];

                    $data['people_credential'] =[
                        'signature_path' => $data['image_data_signature'],
                        'raw_signature' => $data['raw_data_signature'] 
                    ];

                    $data['people_situation'] = [
                        'state-operation' => 'registering-patient',
                        'status' => $data['status'],
                        'children' => $data['children']
                    ];

                    $data['people_attribute'] = [
                        'state-operation' => 'registering-patient',
                        'height'=> $data['taille'],
                        'skin' => $data['peau']
                    ];

                    if($data['nom_descendant']!=="")
                    {
                        $data['people_descendant'] = [
                            'state-operation' => 'registering-patient',
                            'firstname' => ucwords($data['prenom_descendant']),
                            'lastname' => strtoupper($data['nom_descendant']),
                            'sexe'=> $data['sexe-descendant']
                        ];
                    }

                    $data['people_adress'] = [
                        'state-operation' => 'registering-patient',
                        'city_quarter' => ucwords($data['quartier']),
                        'country_township_id' => $data['adress-city-township']
                    ];

                    if($data['contact2']==='')
                        $data['contact2'] = null;

                    $data['people_contact'] =[
                        'state-operation' => 'registering-patient',
                        'contact1' => $data['contact1'],
                        'contact2' => $data['contact2'],
                        'slug' => 'patient'
                    ];

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
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->date('dateborn')
            ->requirePresence('dateborn', 'create')
            ->notEmpty('dateborn');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->requirePresence('bornplace', 'create')
            ->notEmpty('bornplace');

        $validator
            ->requirePresence('sexe', 'create')
            ->notEmpty('sexe');

        $validator
            ->allowEmpty('ethnie');

        $validator
            ->requirePresence('nationality', 'create')
            ->notEmpty('nationality');

        $validator
            ->allowEmpty('blood');

        $validator
            ->allowEmpty('rhesus');

        $validator
            ->requirePresence('path_pic','create')
            ->notEmpty('path_pic');

        $validator
            ->requirePresence('patient_identity','create')
            ->add('patient_identity','uploadIdentity',[
                'rule'=> ['uploadedFile',['types'=>['image/png','image/jpg','image/jpeg'],'maxSize'=>8000000,'optional'=>true]],
                'message'=>'Veuillez spécifier un fichier compatible (png,jpeg,jpg) avec une taille maximum de 8MB'
              ]);

        $validator
            ->allowEmpty('lastname_young','created');

        return $validator;
    }


    public function beforeSave($event, $entity, $options)
    {
        if($entity->isNew())
        {
                    
                    // update the avatar if setted
                    if(!(empty($entity->patient_identity['tmp_name'])))
                    {
                        $extension= strtolower(pathinfo($entity->patient_identity['name'], PATHINFO_EXTENSION));
                        $data['path_pic'] = md5(uniqid(true)).'.'.$extension;

                        if(!(move_uploaded_file($entity->patient_identity['tmp_name'], WWW_ROOT.'img/patient/patient_identity/'.$entity->path_pic)))
                        return false;
                    }

        }
        else
        {

        }
    }






// Custom Query function
    public function findGlobalPatient(Query $query, array $options)
    {
        return $query->contain(['Patients','PeopleContacts'])->where(["CONCAT(People.firstname,' ',People.lastname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->orWhere(["CONCAT(People.lastname,' ',People.firstname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])->map(function($row){
                        $row->role = 'patient';
                $date_born = new \DateTime($row->dateborn);
                $actual = new \DateTime('NOW');
                $row->formatted_dateborn = $date_born->format('Y');
                $row->actual = $actual->format('Y');
                        return $row;
        });
    }


    public function findGlobalDoctor(Query $query, array $options)
    {

        return $query->contain(['PeopleContacts','Doctors.InstitutionDoctors'=>function($q) use ($options){
            return $q->where(['institution_id'=>$options['institution_id']]);
        }])->where(["CONCAT(People.firstname,' ',People.lastname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->orWhere(["CONCAT(People.lastname,' ',People.firstname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->map(function($row){
                $row->role = 'medecin';
                $date_born = new \DateTime($row->dateborn);
                $actual = new \DateTime('NOW');
                $row->formatted_dateborn = $date_born->format('Y');
                $row->actual = $actual->format('Y');
            return $row;

        });
    }
    public function findGlobalManager(Query $query, array $options)
    {
        return $query->contain(['PeopleContacts','ManagerOperators.Institutions'=>function($q)  use ($options){
            return $q->where(['institution_id'=>$options['institution_id']]);
        }])->where(["CONCAT(People.firstname,' ',People.lastname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->orWhere(["CONCAT(People.lastname,' ',People.firstname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->map(function($row){
            $row->role = 'manager';
                $date_born = new \DateTime($row->dateborn);
                $actual = new \DateTime('NOW');
                $row->formatted_dateborn = $date_born->format('Y');
                $row->actual = $actual->format('Y');
            return $row;

        });
    }

    public function findGlobalPharmacy(Query $query, array $options)
    {
        return $query->contain(['PeopleContacts','PharmacyOperators.PharmacyInstitutions.Institutions'=>function($q)  use ($options){
            return $q->where(['institution_id'=>$options['institution_id']]);
        }])->where(["CONCAT(People.firstname,' ',People.lastname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->orWhere(["CONCAT(People.lastname,' ',People.firstname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->map(function($row){
            $row->role = 'pharmacie';
                $date_born = new \DateTime($row->dateborn);
                $actual = new \DateTime('NOW');
                $row->formatted_dateborn = $date_born->format('Y');
                $row->actual = $actual->format('Y');
            return $row;

        });
    }


    public function findGlobalAuxiliary(Query $query, array $options)
    {
        return $query->contain(['PeopleContacts','Auxiliaries.Institutions'=>function($q)  use ($options){
            return $q->where(['institution_id'=>$options['institution_id']]);
        }])->where(["CONCAT(People.firstname,' ',People.lastname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->orWhere(["CONCAT(People.lastname,' ',People.firstname,' ',People.lastname_young) like "=>'%'.$options['tags'].'%'])
        ->map(function($row){
            $row->role='auxilliaire';
                $date_born = new \DateTime($row->dateborn);
                $actual = new \DateTime('NOW');
                $row->formatted_dateborn = $date_born->format('Y');
                $row->actual = $actual->format('Y');
            return $row;
        });
    }

}
