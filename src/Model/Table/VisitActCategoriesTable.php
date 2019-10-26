<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitActCategories Model
 *
 * @property \Cake\ORM\Association\HasMany $VisitActSubCategories
 *
 * @method \App\Model\Entity\VisitActCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitActCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitActCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitActCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitActCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActCategory findOrCreate($search, callable $callback = null)
 */
class VisitActCategoriesTable extends Table
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

        $this->table('visit_act_categories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('VisitActSubCategories', [
            'foreignKey' => 'visit_act_category_id'
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
            ->requirePresence('code_category', 'create')
            ->notEmpty('code_category');

        $validator
            ->requirePresence('code_main_category', 'create')
            ->notEmpty('code_main_category');

        return $validator;
    }
}
