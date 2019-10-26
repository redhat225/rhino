<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requirements Model
 *
 * @property \Cake\ORM\Association\HasMany $RequirementCompositions
 * @property \Cake\ORM\Association\HasMany $RequirementHolderDetails
 * @property \Cake\ORM\Association\HasMany $RequirementIssueLists
 * @property \Cake\ORM\Association\HasMany $RequirementPresentations
 * @property \Cake\ORM\Association\HasMany $RequirementRouteAdministrations
 * @property \Cake\ORM\Association\HasMany $RequirementSignificantInformations
 * @property \Cake\ORM\Association\HasMany $TreatmentRequirements
 *
 * @method \App\Model\Entity\Requirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requirement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Requirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requirement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement findOrCreate($search, callable $callback = null)
 */
class RequirementsTable extends Table
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

        $this->table('requirements');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('RequirementCompositions', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->hasMany('RequirementHolderDetails', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->hasMany('RequirementIssueLists', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->hasMany('RequirementPresentations', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->hasMany('RequirementRouteAdministrations', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->hasMany('RequirementSignificantInformations', [
            'foreignKey' => 'requirement_id'
        ]);
        $this->hasMany('TreatmentRequirements', [
            'foreignKey' => 'requirement_id'
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
            ->requirePresence('requirement_denomination', 'create')
            ->notEmpty('requirement_denomination');

        $validator
            ->requirePresence('requirement_dmp_code', 'create')
            ->notEmpty('requirement_dmp_code');

        $validator
            ->requirePresence('requirement_pharma_form', 'create')
            ->notEmpty('requirement_pharma_form');

        $validator
            ->boolean('requirement_homeopathic')
            ->requirePresence('requirement_homeopathic', 'create')
            ->notEmpty('requirement_homeopathic');

        $validator
            ->requirePresence('requirement_therapeutic_indication', 'create')
            ->notEmpty('requirement_therapeutic_indication');

        $validator
            ->boolean('requirement_security')
            ->requirePresence('requirement_security', 'create')
            ->notEmpty('requirement_security');

        $validator
            ->boolean('requirement_state_selling')
            ->requirePresence('requirement_state_selling', 'create')
            ->notEmpty('requirement_state_selling');

        $validator
            ->allowEmpty('requirement_status');

        $validator
            ->allowEmpty('requirement_authorization_number');

        $validator
            ->date('requirement_date_auth_selling')
            ->allowEmpty('requirement_date_auth_selling');

        return $validator;
    }
}
