<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VisitActSubCategories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $VisitActCategories
 * @property \Cake\ORM\Association\HasMany $VisitActs
 *
 * @method \App\Model\Entity\VisitActSubCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\VisitActSubCategory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VisitActSubCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VisitActSubCategory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VisitActSubCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActSubCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VisitActSubCategory findOrCreate($search, callable $callback = null)
 */
class VisitActSubCategoriesTable extends Table
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

        $this->table('visit_act_sub_categories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('VisitActCategories', [
            'foreignKey' => 'visit_act_category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('VisitActs', [
            'foreignKey' => 'visit_act_sub_category_id'
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
            ->requirePresence('label_sub_category', 'create')
            ->notEmpty('label_sub_category');

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
        $rules->add($rules->existsIn(['visit_act_category_id'], 'VisitActCategories'));

        return $rules;
    }
}
