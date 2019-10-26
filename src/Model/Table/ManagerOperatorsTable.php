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
 * ManagerOperators Model
 *
 * @property \Cake\ORM\Association\BelongsTo $People
 * @property \Cake\ORM\Association\BelongsTo $Institutions
 * @property \Cake\ORM\Association\HasMany $ManagerOperatorActDetails
 * @property \Cake\ORM\Association\HasMany $ManagerRoleDetails
 * @property \Cake\ORM\Association\HasMany $VisitInvoices
 * @property \Cake\ORM\Association\HasMany $VisitTasks
 *
 * @method \App\Model\Entity\ManagerOperator get($primaryKey, $options = [])
 * @method \App\Model\Entity\ManagerOperator newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ManagerOperator[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperator|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ManagerOperator patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperator[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ManagerOperator findOrCreate($search, callable $callback = null)
 */
class ManagerOperatorsTable extends Table
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

        $this->table('manager_operators');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'people_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Institutions', [
            'foreignKey' => 'institution_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Visits', [
            'foreignKey' => 'manager_operator_id'
        ]);
        $this->hasMany('ManagerOperatorActDetails', [
            'foreignKey' => 'manager_operator_id'
        ]);
        $this->hasMany('ManagerRoleDetails', [
            'foreignKey' => 'manager_operator_id'
        ]);
        $this->hasMany('VisitInvoices', [
            'foreignKey' => 'manager_operator_id'
        ]);
        $this->hasMany('VisitTasks', [
            'foreignKey' => 'manager_operator_id'
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
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        //Field For update Password validation
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator->allowEmpty('avatar_manager');

        $validator
            ->allowEmpty('uploaded_avatar_manager')
            ->add('uploaded_avatar_manager','uploadAvatar',[
                'rule'=> ['uploadedFile',['types'=>['image/png','image/jpg','image/jpeg'],'maxSize'=>8000000,'optional'=>true]],
                'message'=>'Veuillez spécifier un fichier compatible (png,jpeg,jpg) avec une taille maximum de 8MB'
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
        $rules->add($rules->existsIn(['institution_id'], 'Institutions'));

        return $rules;
    }

    public function beforeSave($event, $entity, $options)
    {
        if($entity->isNew())
        {

        }
        else
        {
            if(isset($entity->updateProfile))
            {
                $hasher = new DefaultPasswordHasher();
                //update the password if setting
                if($entity->conf_new_password!=="")
                {
                    if($hasher->check($entity->old_password,$entity->password))
                        {
                                $entity->conf_new_password = $hasher->hash($entity->conf_new_password);
                                $entity->password = $entity->conf_new_password;                           
                        }
                    else
                        return false;  
                }
                                            // update the avatar if setted
                            if(!(empty($entity->uploaded_avatar_manager['tmp_name'])))
                            {
                                $extension= strtolower(pathinfo($entity->uploaded_avatar_manager['name'], PATHINFO_EXTENSION));

                                  $opendir=opendir(WWW_ROOT."img/manager/".$entity->slug."/manager_avatar/");
                                  if(file_exists(WWW_ROOT."img/manager/".$entity->slug."/manager_avatar/".$entity->avatar_manager))
                                     unlink(WWW_ROOT."img/manager/".$entity->slug."/manager_avatar/".$entity->avatar_manager);
                                  closedir($opendir);                  
    
                                //flush avatar_patient
                                $entity->avatar_manager=uniqid().".".$extension;

                                if(!(move_uploaded_file($entity->uploaded_avatar_manager['tmp_name'], WWW_ROOT.'img/manager/'.$entity->slug.'/manager_avatar/'.$entity->avatar_manager)))
                                return false;
                            }
              
            }

        }
    }

    public function findAuthManager(Query $query, array $options)
    {
        return $query->contain(['People.PeopleCredentials','People.PeopleSituations','People.PeopleAdresses.CountryTownships.CountryCities.Countries','People.PeopleContacts','Institutions.InstitutionAdresses']);
    }
}
