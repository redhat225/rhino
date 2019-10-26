<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InstitutionTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Institutions
 *
 * @method \App\Model\Entity\InstitutionType get($primaryKey, $options = [])
 * @method \App\Model\Entity\InstitutionType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\InstitutionType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InstitutionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\InstitutionType findOrCreate($search, callable $callback = null)
 */
class InstitutionTypesTable extends Table
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

        $this->table('institution_types');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Institutions', [
            'foreignKey' => 'institution_type_id'
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
            ->requirePresence('label_institution_type', 'create')
            ->notEmpty('label_institution_type');

        return $validator;
    }
}
